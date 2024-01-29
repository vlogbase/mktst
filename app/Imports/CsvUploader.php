<?php

namespace App\Imports;

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;

class CsvUploader implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $count = 0;
        $products = 0;
        foreach ($collection as $row) {
            if ($count != 0 && $row[0]) {
                $item = $this->productInsert($row);

                if ($item) {
                    $products++;
                }
            }
            $count++;
        }
        return $products;
    }

    public function productInsert($row)
    {
        if (!Product::where('sku', $row[0])->exists() && $row[0]) {
                $item = Product::create([
                    'sku' =>  $row[0],
                    'name' =>  $row[1],
                    'slug' => Str::slug($row[1].'-'.$row[7]),
                    'unit_price' => $row[3],
                    'unit_per_price' => $row[4],
                    'discount' => 0,
                    'stock' => $row[5] ? $row[5] : 1000,
                    'reorder' => 10,
                    'taxrate' => intval($row[2]) == 2 ? 20 : 0,
                    'per_unit' => 1,
                    'status' => 1,
                    'brand_id' => $this->brandGetOrCreate($row[6]),
                ]);
    
                ProductDetail::create([
                    'product_id' => $item->id,
                    'description' => $row[9],
                    'meta_title' => $row[1],
                    'meta_description' => $row[1],
                    'pack' => $row[7],
                ]);
    
                $this->imageSave($row[0], $item->id);
                return $item;
        }

        return;
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
