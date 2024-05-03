<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
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

class BulkUploadController extends ApiController
{
    public $email;
    public $password;
    public $user;
    public $csvFile;
    public $zipFile;
    public $admin_zip_path_name = 'upload/admin_uploads/product_zip/';
    public $seller_zip_path_name;
    public $error_message = '';
    public $error_code = 0;

    public function loginAttempt(Request $request)
    {

        try {
        $data =  $request->validate([
            'password' => 'required|min:6',
            'email' => 'required|email|min:2',
        ]);
    } catch (\Exception $e) {
        Log::info(print_r($e->getMessage(), true));
        //send response with message validation failed and status code 403
        $this->error_message = 'Validation failed';
        $this->error_code = 403;
        return;
    }

        Log::info($data);
        //if data is validated then attempt login
        if (Auth::guard('seller')->attempt($data)) {
            $this->user = auth()->guard('seller')->user();
            $this->seller_zip_path_name = 'upload/seller_uploads/product_zip/' . $this->user->id . '/';
            //request()->session()->regenerate();
            //return redirect()->intended('/seller');
            //Log::info('inside if condition seller', ['email' => $request->email, 'password' => $request->password]);
            //send response with message login successful and status code 200
            return true;
        } else {
            return false;
        }
    }
    public function bulkupload(Request $request)
    {
        if(!$this->loginAttempt($request)){
            //Log::info('Login attempt failed', ['email' => $request->email, 'password' => $request->password]);
            //send response with message login failed and status code 401
            $this->error_message = 'Login failed, Please check your credentials';
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
        }else{
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
        }else{
            //send response with message please upload a zip file and status code 403
            $this->error_message = 'Please upload a zip file';
            $this->error_code = 403;
            return $this->errorResponse($this->error_message, $this->error_code);
        }

        $this->email = $request->email;
        $this->password = $request->password;
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

        Excel::import(new SellerCsvUploader($this->user, $this->seller_zip_path_name), $path);
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
        return $this->successResponse($data,'Bulk upload successful');
    }
}
