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

class ProductImport implements ToCollection
{
    public $category;

    public function __construct($category)
    {
        $this->category = $category;
    }

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $count = 0;
        $currentSubCategory = null;
        foreach ($collection as $row) {
            if ($row[0] && $count != 0) {

                if ($row[1]) {
                    //This is product row
                    $item = $this->productInsert($row);
                    if ($item) {
                        if($currentSubCategory){
                            $arr = [$this->category->id, $currentSubCategory->id];
                            $item->categories()->sync($arr);
                        }else{
                            $item->categories()->sync($this->category->id);
                        }
                    }
                }else{
                    //This is category row
                    $currentSubCategory = Category::firstOrCreate(
                        ['name' => $row[0]],
                        [
                            'slug' => Str::slug($row[0]),
                            'category_id' => $this->category->id,
                        ]
                    );

                }
            }
            $count++;
        }
    }

    public function productInsert($row)
    {
        if (Product::where('sku', $row[0])->exists()) {
            echo 'Product already exists: in '.$this->category->name.' => '. $row[0] . PHP_EOL;
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
    
                $this->imageSave($row[0], $item->id);
    
                return $item;
            }else{
                echo 'Product is not correct form: ' . $row[0] . PHP_EOL;
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
