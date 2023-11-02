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

class DataImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        // 0 -> sku & category name
        // 1 -> product name & category level

        $mainCategory = null;
        $subCategory = null;

        $mainCategoryModel = null;
        $subCategoryModel = null;

        $count = 0;
        foreach ($collection as $row) {
            if ($row[0] && $count != 0) {
                if ($row[1] == 'main-category') {
                    $mainCategory = trim($row[0]);
                    $subCategory = null;
                    $subCategoryModel = null;
                    $files = glob(public_path('upload/categoryImage/' . $mainCategory . '.*'));
    
                    if (!empty($files)) {
                        $fileInfo = pathinfo($files[0]);
                        $fileExtension = $fileInfo['extension'];
                        $fileName = $fileInfo['filename'];
    
                        $path = 'upload/categoryImage/' . $fileName . '.' . $fileExtension;
                    }else{
                        echo 'Category image not found: ' . $mainCategory . PHP_EOL;
                        $path = 'upload/product/imageholderproduct.jpg';
                    }
            

                    $mainCategoryModel = $this->categorySave($mainCategory,$path,null);
                   
                } else if ($row[1] == 'sub-category') {
                    $subCategory = $row[0];
                    $files = glob(public_path('upload/categoryImage/' . $subCategory . '.*'));
    
                    if (!empty($files)) {
                        $fileInfo = pathinfo($files[0]);
                        $fileExtension = $fileInfo['extension'];
                        $fileName = $fileInfo['filename'];
                        $path = 'upload/categoryImage/' . $subCategory . '.' . $fileExtension;
                    }else{
                        echo 'Category image not found: ' .$mainCategory. ' - ' .$subCategory . PHP_EOL;
                        $path = 'upload/product/imageholderproduct.jpg';
                    }

                    $mainCategoryId = $mainCategoryModel ? $mainCategoryModel->id : null;
                    $subCategoryModel = $this->categorySave($subCategory,$path,$mainCategoryId);
                } else {
                    if ($row[1] != '') {
                        $item = $this->productInsert($row,$mainCategoryModel);
                        if ($item) {
                            $arr = [$mainCategoryModel ? $mainCategoryModel->id : null, $subCategoryModel ? $subCategoryModel->id : null];
                            $item->categories()->sync($arr);  
                        }
                    }
                }
            }
            $count++;
        }
    }

    public function categorySave($name,$path,$topId): Category
    {
        return Category::create(
            [
                'name' => $name,
                'slug' => Str::slug($name.'-'.rand(100,999)),
                'category_id' => $topId ?? null,
                'image' => $path,
             ]
        );
    }

    public function productInsert($row,$category)
    {
        if (Product::where('sku', $row[0])->exists()) {
            echo 'Product already exists: in '.$category->name.' => '. $row[0] . PHP_EOL;
            return;
        } else {

            if($row[2]){
                $item = Product::create([
                    'sku' =>  $row[0],
                    'name' =>  $row[1],
                    'slug' => Str::slug($row[1].'-'.$row[7]),
                    'unit_price' => $row[3],
                    'unit_per_price' => $row[5],
                    'discount' => 0,
                    'stock' => 1000,
                    'reorder' => 10,
                    'taxrate' => intval($row[2]) == 2 ? 20 : 0,
                    'per_unit' => 1,
                    'status' => 1,
                    'brand_id' => $this->brandGetOrCreate($row[6]),
                ]);
    
                ProductDetail::create([
                    'product_id' => $item->id,
                    'meta_title' => $row[1],
                    'meta_description' => $row[1],
                    'pack' => $row[7],
                ]);

                if($row[7] == ""){
                    echo $item->sku . ' => No pack information' . PHP_EOL;
                }
    
                $this->imageSave($row[0], $item->id);
    
                return $item;
            }else{
                echo 'Product is not correct form: ' .$category->name.' => '. $row[1] . PHP_EOL;
                return;
            }
            
        }
    }

    public function brandGetOrCreate($brand_name)
    {
        if ($brand_name) {
            $brand = Brand::firstOrCreate([
                'name' => $brand_name,
            ]);

            return $brand->id;
        }

        $brand = Brand::firstOrCreate([
            'name' => 'Other',
        ]);

        return $brand->id;
    }

    public function imageSave($sku, $id)
    {
        $partialFileName = $sku;
        $files = glob(public_path('upload/product/' . $partialFileName . '.*'));

        if (!empty($files)) {
            $fileInfo = pathinfo($files[0]);
            $fileExtension = $fileInfo['extension'];

            if ($fileExtension == 'pdf') {
                $path = 'upload/product/imageholderproduct.jpg';
            } else {
                $path = 'upload/product/' . $sku . '.' . $fileExtension;
            }
        } else {
            $path = 'upload/product/imageholderproduct.jpg';
        }

        ProductImage::create([
            'path' => $path,
            'product_id' => $id,
        ]);
    }
}
