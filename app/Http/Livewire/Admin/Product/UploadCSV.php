<?php

namespace App\Http\Livewire\Admin\Product;

use App\Imports\CsvUploader;
use App\Imports\SellerCsvUploader;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class UploadCSV extends Component
{
    use WithFileUploads;
    public $csvFile;
    public $deleteOldData = false;
    public $user;

    public function mount(){
       if(auth()->guard('admin')->check()){
           $this->user = auth()->guard('admin')->user();
       }

       if(auth()->guard('seller')->check()){
           $this->user = auth()->guard('seller')->user();
       }
    }

    public function upload()
    {
        $this->validate([
            'csvFile' => 'required|file|mimes:csv', // Dosya validasyon kuralları
        ]);

        // Dosyayı geçici bir yola kaydet
        $path = $this->csvFile->getRealPath();

        if ($this->deleteOldData && auth()->guard('admin')->check()) {
            $this->removeData();
        }

        
        if(auth()->guard('admin')->check()){
            Excel::import(new CsvUploader(), $path);
            $this->emit('succesAlert', 'Upload Your Data!');
        }

        if(auth()->guard('seller')->check()){
            Excel::import(new SellerCsvUploader($this->user), $path);
            $this->emit('succesAlert', 'Upload Your Data!');
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
