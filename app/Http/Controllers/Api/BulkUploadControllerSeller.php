<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\Seller;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\Address;
use App\Models\UserDetail;
use App\Models\UserOffice;
use App\Notifications\ForgetPasswordNotification;
use App\Notifications\VerifyNotification;
use App\Notifications\WelcomeNotification;
use App\Rules\VatValidation;
use App\Traits\AddressHelper;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SellerCsvUploader;

class BulkUploadControllerSeller extends ApiController
{
    public $api_key;
    public $sellerId;
    public $seller;
    public $csvFile;
    public $zipFile;
    public $admin_zip_path_name = 'upload/admin_uploads/product_zip/';
    public $seller_zip_path_name;
    public $error_message = '';
    public $error_code = 0;

    public function attemptByKey(Request $request)
    {
        //check if the api key is valid
        //get bearer token from the request
        $token = $request->bearerToken();
        Log::info('Token: ' . $token);
        $this->api_key = $token;
        Log::info('Api key: ' . $this->api_key);

        $this->seller = Seller::where('api_key', $this->api_key)->first();
        //check if valid_till is greater than current date and is_autoextended = 0
        if ($this->seller->valid_till < Carbon::now() && $this->seller->is_autoextended == 0) {
            //send response with message api key expired and status code 403
            $this->error_message = 'Invalid Api key';
            $this->error_code = 403;
            return;
        }elseif($this->seller->valid_till > Carbon::now() || $this->seller->is_autoextended == 1){
            //extend the api key for 30 days
            if($this->seller->is_autoextended == 1){
                $this->seller->update([
                    'valid_till' => Carbon::now()->addDays(30)
                ]);   
            }
            $this->seller_zip_path_name = 'upload/seller_uploads/product_zip/' . $this->seller->id . '/';
            return true;
        }else{
            //send response with message api key expired and status code 403
            $this->error_message = 'Invalid Api key';
            $this->error_code = 403;
            return;
        }
    }
    public function bulkupload(Request $request)
    {
        if (!$this->attemptByKey($request)) {
            //Log::info('Login attempt failed', ['email' => $request->email, 'password' => $request->password]);
            //send response with message login failed and status code 401
            $this->error_message = 'Authentication Failed, Please check your API Key.';
            $this->error_code = 401;
            return $this->errorResponse($this->error_message, $this->error_code);
        }

        //Log::info('Login attempt successful', ['email' => $request->email, 'password' => $request->password]);
        //if the csv file is uploaded
        if ($request->hasFile('csvFile')) {
            $this->validate($request, [
                'csvFile' => 'required|file|mimes:csv,txt',
            ]);

            //Find the mime type of the file
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $request->file('csvFile')->getRealPath());
            finfo_close($finfo);

            if ($mime != 'text/plain' && $mime != 'text/csv') {
                //send response with message please upload a valid csv file and status code 403
                $this->error_message = 'Please upload a valid csv file';
                $this->error_code = 403;
                return $this->errorResponse($this->error_message, $this->error_code);
            }
        } else {
            //send response with message please upload a csv file and status code 403
            $this->error_message = 'Please upload a csv file';
            $this->error_code = 403;
            return $this->errorResponse($this->error_message, $this->error_code);
        }

        //if the zip file is uploaded
        if ($request->hasFile('zipFile')) {
            $this->validate($request, [
                'zipFile' => 'required|file|mimes:zip',
            ]);

            //Find the mime type of the file
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $request->file('zipFile')->getRealPath());
            finfo_close($finfo);

            if ($mime != 'application/zip') {
                //send response with message please upload a valid zip file and status code 403
                $this->error_message = 'Please upload a valid zip file';
                $this->error_code = 403;
                return $this->errorResponse($this->error_message, $this->error_code);
            }
        } else {
            //send response with message please upload a zip file and status code 403
            $this->error_message = 'Please upload a zip file';
            $this->error_code = 403;
            return $this->errorResponse($this->error_message, $this->error_code);
        }

        $this->api_key = $request->api_key;
        $this->csvFile = $request->file('csvFile');
        $this->zipFile = $request->file('zipFile');

        $path = $this->csvFile->getRealPath();
        $pathZip = $this->zipFile->getRealPath();

        //import zip file for seller
        if ($this->zipFile) {
            $zip = new \ZipArchive();
            $res = $zip->open($pathZip);
            if ($res === TRUE) {
                //extract it to the path uploads/product_zip/
                //create the folder if it does not exist
                //$seller_zip_path_name = 'upload/seller_uploads/product_zip/' . $this->user->id . '/';
                if (!file_exists($this->seller_zip_path_name)) {
                    mkdir($this->seller_zip_path_name, 0777, true);
                }
                $zip->extractTo($this->seller_zip_path_name);
                $zip->close();
            } else {
                $this->error_message = 'Error: ' . $res;
                $this->error_code = 403;
                return $this->errorResponse($this->error_message, $this->error_code);
            }
        }

        Excel::import(new SellerCsvUploader($this->seller, $this->seller_zip_path_name), $path);
        if (isset($_SESSION['bulkupl_csv_error'])) {
            $this->error_message = $_SESSION['bulkupl_csv_error'];
            $this->error_code = 403;
            Log::error('Error: ' . $_SESSION['bulkupl_csv_error']);
            unset($_SESSION['bulkupl_csv_error']);
            return $this->errorResponse($this->error_message, $this->error_code);
        } else {
            $productsCount = session('products_count', 0);
            Log::info('Uploaded ' . $productsCount . ' Products');
            //send response with message uploaded products count and status code 200
            $data = ['message' => 'Uploaded ' . $productsCount . ' Products'];
            return $this->successResponse($data, 'Uploaded ' . $productsCount . ' Products');
        }


        //code to check csv and zip file and move ahead with bulk upload




        //Log::info('Move ahead with bulk upload');
        //send response with message login successful and status code 200
        $data = ['message' => 'Bulk upload successful'];
        return $this->successResponse($data, 'Bulk upload successful');
    }
}
