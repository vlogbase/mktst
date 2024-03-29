<?php

namespace App\Imports;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;

class SellerCsvUploader implements ToCollection
{
    public $user;
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        session(['products_count' => 0]);
        $count = 0;
        $products = 0;
        foreach ($collection as $row) {
            
            if ($count != 0 && $row[0]) {
                
                $productRow = $this->checkTheSeperated($row);
                $item = $this->productInsert($productRow);
                
                if ($item) {
                    
                    if ($row[11] && $row[12]) {
                        $mainCategoryModel = $this->categorySave($row[11], null);
                        $subCategoryModel = $this->categorySave($row[12], $mainCategoryModel->id);

                        if($mainCategoryModel && $subCategoryModel){
                            $arr = [$mainCategoryModel->id, $subCategoryModel->id];
                            $item->categories()->sync($arr);
                        }else if($mainCategoryModel){
                            $item->categories()->sync($mainCategoryModel->id);
                        }
 
                    }else if ($row[11]) {
                        $mainCategoryModel = $this->categorySave($row[11], null);
                        if($mainCategoryModel){
                            $item->categories()->sync($mainCategoryModel->id);
                        }
                    }

                    $products++;
                }
            }
            $count++;
        }
        session(['products_count' => $products]);
        return $products;
    }

    public function checkTheSeperated($row)
    {
        if($row[1] == null && $row[2] == null){
            $data = str_getcsv($row[0]);
            return $data;
        }else {
            return $row;
        }
    }

    public function productInsert($row)
    { 
        if (!Product::where('sku', $row[0])->exists() && $row[0] && $row[1]) {
            $item = Product::create([
                'sku' =>  $row[0],
                'name' =>  $row[1],
                'slug' => Str::slug($row[1] . '-' . $row[7]),
                'unit_price' => $row[3],
                'unit_per_price' => $row[4],
                'discount' => 0,
                'stock' => $row[5] ? $row[5] : 1000,
                'reorder' => 10,
                'taxrate' => intval($row[2]) == 2 ? 20 : 0,
                'per_unit' => 1,
                'status' => 0,
                'brand_id' => $this->brandGetOrCreate($row[6]),
            ]);

            ProductDetail::create([
                'product_id' => $item->id,
                'description' => $row[9],
                'meta_title' => $row[1],
                'meta_description' => $row[1],
                'pack' => $row[7],
                'unit_weight' => $row[8],
            ]);

            $this->imageSave($row[10], $item->id);
            return $item;
        }

        return;
    }

    public function brandGetOrCreate($brand_name)
    {
        if ($brand_name) {
            $brand = Brand::firstOrCreate([
                'name' => $brand_name,
                'seller_id' => $this->user->id,
            ]);

            return $brand->id;
        }

        $brand = Brand::firstOrCreate([
            'name' => 'Other',
        ]);

        return $brand->id;
    }

    public function imageSave($name, $id)
    {
        if($name){
            $files = public_path('upload/product/' . $name);

            if (!empty($files)) {
                $fileInfo = pathinfo($files);
                $fileExtension = $fileInfo['extension'];
                $fileName = $fileInfo['filename'];
    
    
    
                if ($fileExtension == 'pdf') {
                    $path = 'upload/product/imageholderproduct.jpg';
                } else {
                    $path = 'upload/product/' . $fileName . '.' . $fileExtension;
                }
            } else {
                $path = 'upload/product/imageholderproduct.jpg';
            }
        }else{
            $path = 'upload/product/imageholderproduct.jpg';
        }

        ProductImage::create([
            'path' => $path,
            'product_id' => $id,
        ]);
    }

    public function categorySave($name,$topId): Category
    {
        if($topId){
            $category = Category::where('name', $name)->where('category_id',$topId)->first();
        }else{
            $category = Category::where('name', $name)->where('category_id',null)->first();
        }

        return $category ?? null;
        
    }
}
