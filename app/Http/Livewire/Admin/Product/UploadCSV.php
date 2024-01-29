<?php

namespace App\Http\Livewire\Admin\Product;

use App\Imports\CsvUploader;
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

    public function upload()
    {
        $this->validate([
            'csvFile' => 'required|file|mimes:csv,txt|max:5048', // Dosya validasyon kuralları
        ]);

        // Dosyayı geçici bir yola kaydet
        $path = $this->csvFile->getRealPath();

        $this->removeData();
        Excel::import(new CsvUploader(), $path);

        // Başarılı yükleme mesajı göster
        session()->flash('message', 'Uploaded your items.');
    }
    

    public function render()
    {
        return view('livewire.admin.product.upload-c-s-v');
    }


    public function removeData(){
        $products = Product::all();
        foreach($products as $product){
            $product->delete();
        }

        $childCategories = Category::where('category_id', '!=', null)->get();
        foreach($childCategories as $childCategory){
            $childCategory->delete();
        }

        $categories = Category::where('category_id', null)->get();
        foreach($categories as $category){
            $category->delete();
        }

        $oldBrands = Brand::all();
        foreach($oldBrands as $oldBrand){
            $oldBrand->delete();
        }
    }
}
