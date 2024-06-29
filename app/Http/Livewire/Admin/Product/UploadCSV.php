<?php

namespace App\Http\Livewire\Admin\Product;

use App\Imports\CsvUploader;
use App\Imports\SellerCsvUploader;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;

class UploadCSV extends Component
{
    use WithFileUploads;
    public $csvFile;
    public $zipFile;
    public $deleteOldData = false;
    public $user;
    public $admin_zip_path_name = 'upload/admin_uploads/product_zip/';
    public $seller_zip_path_name;
    public $routeName;
    

    public function mount()
    {
        $this->routeName = Route::currentRouteName();
        Log::info($this->routeName);
        if (auth()->guard('admin')->check()) {
            $this->user = auth()->guard('admin')->user();
        }

        if (auth()->guard('seller')->check()) {
            $this->user = auth()->guard('seller')->user();
            $this->seller_zip_path_name = 'upload/seller_uploads/product_zip/' . $this->user->id . '/';
        }
    }

    public function upload()
    {

        //if the csv file is uploaded
        if ($this->csvFile) {
            $this->validate([
                'csvFile' => 'required|file|mimes:csv,txt',
            ]);

            //Find the mime type of the file
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $this->csvFile->getRealPath());
            finfo_close($finfo);

            if ($mime != 'text/plain' && $mime != 'text/csv') {
                $this->emit('errorAlert', 'Error: Please upload a valid csv file');
                return;
            }
        }else{
            $this->emit('errorAlert', 'Error: Please upload a csv file');
            return;
        }
        

        //if the zip file is uploaded
        if ($this->zipFile) {
            $this->validate([
                'zipFile' => 'required|file|mimes:zip',
            ]);

            //Find the mime type of the file
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $this->zipFile->getRealPath());
            finfo_close($finfo);

            if ($mime != 'application/zip') {
                $this->emit('errorAlert', 'Error: Please upload a valid zip file');
                return;
            }
        }else{
            $this->emit('errorAlert', 'Error: Please upload a zip file');
            return;
        }


        $path = $this->csvFile->getRealPath();
        $pathZip = $this->zipFile->getRealPath();

        if ($this->deleteOldData && auth()->guard('admin')->check()) {
            $this->removeData();
        }


        if (auth()->guard('admin')->check() && $this->routeName == 'admin.products.bulk_upload'
        ) {
            
            //import zip file
            if ($this->zipFile) {
                $zip = new \ZipArchive();
                $res = $zip->open($pathZip);
                if ($res === TRUE) {
                    //extract it to the path uploads/product_zip/
                    //create the folder if it does not exist
                    //$admin_zip_path_name = 'upload/admin_uploads/product_zip/';
                    if (!file_exists($this->admin_zip_path_name)) {
                        mkdir($this->admin_zip_path_name, 0777, true);
                    }
                    $zip->extractTo($this->admin_zip_path_name);
                    $zip->close();
                } else {
                    Log::error('Error: ' . $res);
                }
            }

            Excel::import(new CsvUploader($this->admin_zip_path_name), $path);
            if(isset($_SESSION['bulkupl_csv_error'])){
                $this->emit('errorAlert', 'Error: ' . $_SESSION['bulkupl_csv_error']);
                unset($_SESSION['bulkupl_csv_error']);
            }else{
                $productsCount = session('products_count', 0);
                $this->emit('succesAlert', 'Uploaded ' . $productsCount . ' Products');
            }
        }

        if (auth()->guard('seller')->check() && $this->routeName == 'seller.products.bulk_upload'
        ) {
            

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
                    Log::error('Error: ' . $res);
                }
            }

            Excel::import(new SellerCsvUploader($this->user, $this->seller_zip_path_name), $path);

            if (isset($_SESSION['bulkupl_csv_error'])) {
                $this->emit('errorAlert', 'Error: ' . $_SESSION['bulkupl_csv_error']);
                unset($_SESSION['bulkupl_csv_error']);
            } else {
                $productsCount = session('products_count', 0);
                $this->emit('succesAlert', 'Uploaded ' . $productsCount . ' Products');
            }
            
        }
    }


    public function render()
    {
        return view('livewire.admin.product.upload-c-s-v');
    }


    public function removeData()
    {
        $products = Product::all();
        foreach ($products as $product) {
            $product->delete();
        }

        $childCategories = Category::where('category_id', '!=', null)->get();
        foreach ($childCategories as $childCategory) {
            $childCategory->delete();
        }

        $categories = Category::where('category_id', null)->get();
        foreach ($categories as $category) {
            $category->delete();
        }

        $oldBrands = Brand::all();
        foreach ($oldBrands as $oldBrand) {
            $oldBrand->delete();
        }
    }
}
