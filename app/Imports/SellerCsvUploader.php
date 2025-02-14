<?php

namespace App\Imports;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;

class SellerCsvUploader implements ToCollection
{
    public $user;
    public $seller_zip_path_name;
    public $csv_synonym;
    public function __construct($user, $seller_zip_path_name = null)
    {
        $this->user = $user;
        $this->seller_zip_path_name = $seller_zip_path_name;
        $this->csv_synonym = new CsvSynonym();
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
            if ($count == 0) {
                // Log::info("Header Row");
                //identify column values based on header column name
                $_SESSION['bulkupl_csv_error'] = "Non Matching Columns found in CSV file. Please check all column names are correct. Unmatched Columns: ";
                $unmatched_columns_found = false;
                foreach ($row as $key => $value) {
                    if (!$this->csv_synonym->detectDBFieldByColumnName($value)) {
                        //enter error in new session variable 'csv_error'
                        $unmatched_columns_found = true;
                        $_SESSION['bulkupl_csv_error'] .= '"' . $value . '" ';
                    }
                    $db_fields[$key] = $this->csv_synonym->detectDBFieldByColumnName($value);
                }
                // Log::info("-------------------");
                // Log::info(print_r($db_fields, true));
                // Log::info("-------------------");
            }
            //if unmatched columns found, return
            if ($unmatched_columns_found) {
                return;
            }

            if ($count != 0) {
                $item = $this->productInsert($db_fields, $row);

                // if ($item) {

                //     if ($row[11] && $row[12]) {
                //         $mainCategoryModel = $this->categorySave($row[11], null);
                //         $subCategoryModel = $this->categorySave($row[12], $mainCategoryModel->id);
                //         $arr = [$mainCategoryModel->id, $subCategoryModel->id];
                //         //$item->categories()->sync($arr);
                //     } else if ($row[11]) {
                //         $mainCategoryModel = $this->categorySave($row[11], null);
                //         //$item->categories()->sync($mainCategoryModel->id);
                //     }

                    
                // }
                $products++;
            }

            $count++;
        }
        session(['products_count' => $products]);
        return $products;
    }


    public function detectCategoryId($category_name)
    {
        $category_name = strtolower(trim($category_name));
        $category_id = '';
        #1. find category id based on category name from categories where parent_id is not null
        $category_id = Category::where('name', $category_name)->whereNotNull('category_id')->first();
        if ($category_id) {
            return $category_id->id;
        } else {
            //check through childCategorySynonymCheck function
            $category_id_found = $this->csv_synonym->childCategorySynonymCheck($category_name);
            if ($category_id_found != '') {
                //check if $category_id_found is a child category
                $category_id = Category::where('name', $category_id_found)->whereNotNull('category_id')->first();
                if ($category_id) {
                    return $category_id->id;
                }
            }
        }
        return '';
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

    public function generateCode()
    {
        return strtoupper(Str::random(10));
    }

    public function productInsert($db_fields, $row)
    {
        $item_array = array_combine($db_fields, $row->toArray());

        #1. check if incoming array has all required fields
        if (!isset($item_array['name']) || !isset($item_array['unit_price']) || !isset($item_array['brand_id'])) {
            //enter error in new session variable 'csv_error'
            $_SESSION['bulkupl_csv_error'] = "Error in CSV file. Please check all required fields are filled.";
            return;
        }

        #2. set default values for remaining fields
        if (!isset($item_array['sku'])) {
            $item_array['sku'] = '';
        }
        if (!isset($item_array['taxrate'])) {
            $item_array['taxrate'] = '';
        }
        if (!isset($item_array['per_unit'])) {
            $item_array['per_unit'] = '';
        }
        if (!isset($item_array['unit_per_price'])) {
            $item_array['unit_per_price'] = null;
        }
        if (!isset($item_array['discount'])) {
            $item_array['discount'] = '';
        }
        if (!isset($item_array['stock'])) {
            $item_array['stock'] = '';
        }
        if (!isset($item_array['reorder'])) {
            $item_array['reorder'] = '';
        }
        if (!isset($item_array['primary_image'])) {
            $item_array['primary_image'] = '';
        }
        if (!isset($item_array['multi_image'])) {
            $item_array['multi_image'] = '';
        }
        if (!isset($item_array['pack'])) {
            $item_array['pack'] = '';
        }
        if (!isset($item_array['unit_weight'])) {
            $item_array['unit_weight'] = '';
        }
        if (!isset($item_array['description'])) {
            $item_array['description'] = '';
        }
        if (!isset($item_array['meta_title'])) {
            $item_array['meta_title'] = '';
        }
        if (!isset($item_array['meta_description'])) {
            $item_array['meta_description'] = '';
        }
        if (!isset($item_array['category_2'])) {
            $item_array['category_2'] = '';
        }


        $sku = $item_array['sku'];
        $name = $item_array['name'];
        $taxrate = $item_array['taxrate'];
        $unit_price = $item_array['unit_price'];
        $per_unit = $item_array['per_unit'] ? $item_array['per_unit'] : 1;
        $unit_per_price = $item_array['unit_per_price'];
        $discount = $item_array['discount'];
        $stock = $item_array['stock'];
        $reorder = $item_array['reorder'];
        $brand_name = $item_array['brand_id'];
        $primary_image = $item_array['primary_image'];
        $multi_image = $item_array['multi_image'];
        $pack = $item_array['pack'];
        $unit_weight = $item_array['unit_weight'] ? $item_array['unit_weight'] : 0.00;
        $description = $item_array['description'];
        $meta_title = $item_array['meta_title'];
        $meta_description = $item_array['meta_description'];
        //$category_1 = $item_array['category_1'];
        $category_2 = $item_array['category_2'];

        //check if all required fields are filled
        unset($_SESSION['bulkupl_csv_error']);
        if (!$name || $name == '' || !$unit_price || $unit_price == '' || !$brand_name || $brand_name=='') {
            //send error message in session
            $_SESSION['bulkupl_csv_error'] = "Error in CSV file. Please check all required fields are filled.";
            return;
        }

        // Log::info("-------------------");
        // Log::info(print_r($item_array, true));
        // Log::info("-------------------");
        // Log::info("productInsert Started");
        // Log::info("Row 0 = ". $row[0]);

        // $query = Product::where('sku', $row[0]);
        // $sql = Str::replaceArray('?', $query->getBindings(), $query->toSql());
        // Log::info($sql);
        // foreach($item_array as $key => $value){
        //     Log::info($key . " => " . $value);
        // }
        // Log::info("sku: " . $sku);
        
        if (!$sku || !Product::where('sku', "$sku")->exists()) {
            // Log::info("Inserting Product");
            // Log::info("sku: " . $sku);
            // Log::info("name: " . $name);
            // Log::info("taxrate: " . $taxrate);
            // Log::info("unit_price: " . $unit_price);
            // Log::info("per_unit: " . $per_unit);
            // Log::info("unit_per_price: " . $unit_per_price);
            // Log::info("discount: " . $discount);
            // Log::info("stock: " . $stock);
            // Log::info("reorder: " . $reorder);
            // Log::info("brand_id: " . $brand_name);
            // Log::info("primary_image: " . $primary_image);
            // Log::info("multi_image: " . $multi_image);
            // Log::info("pack: " . $pack);
            // Log::info("unit_weight: " . $unit_weight);
            // Log::info("description: " . $description);
            // Log::info("meta_title: " . $meta_title);
            // Log::info("meta_description: " . $meta_description);
            //Log::info("category_1: " . $category_1);
            // Log::info("category_2: " . $category_2);
            //Generating SKU for product while uploading
            $insert_sku = $this->generateCode();
            // Log::info("Generated SKU: " . $insert_sku);
            //Generating SKU for product while uploading
            //Insert Product


            $item = Product::create([
                'sku' =>  $insert_sku,
                'name' =>  $name,
                'slug' => Str::slug($name),
                'unit_price' => $unit_price,
                'per_unit' => $per_unit,
                'unit_per_price' => $unit_per_price,
                'discount' => intval($discount) > 0 ? $discount : 0,
                'stock' => $stock ? $stock : 1000,
                'reorder' => intval($reorder) ? $reorder : 0,
                'taxrate' => intval($taxrate) > 0 ? intval($taxrate) : 20,
                'status' => 1,
                'brand_id' => $this->brandGetOrCreate($brand_name),
                'primary_image' => $primary_image,
                'multi_image' => $multi_image,
            ]);

            ProductDetail::create([
                'product_id' => $item->id,
                'description' => $description,
                'meta_title' => $meta_title,
                'meta_description' => $meta_description,
                'pack' => $pack,
                'unit_weight' => $unit_weight,
            ]);

            //Insert Category
            $category_id = $this->detectCategoryId($category_2);
            if ($category_id != '') {
                $item->categories()->sync($category_id);
            }

            //check if primary image is not empty
            if ($primary_image) {
                //remove previous image
                $product_images = ProductImage::where('product_id', $item->id)->get();
                foreach ($product_images as $product_image) {
                    $product_image->delete();
                }
                //check if primary image is present in 'upload/admin_uploads/product_zip/' folder
                $files = glob(public_path($this->seller_zip_path_name . $primary_image));
                if (!empty($files)) {
                    $fileInfo = pathinfo($files[0]);
                    $fileExtension = $fileInfo['extension'];
                    //if extension is jpg,png,jpeg,webp
                    if ($fileExtension == 'jpg' || $fileExtension == 'png' || $fileExtension == 'jpeg' || $fileExtension == 'webp') {
                        $fileName = $fileInfo['filename'];
                        //change file name to unique name
                        $fileName = $fileName . '_' . microtime(true);
                        //copy file to 'upload/product/' folder
                        copy($files[0], public_path('upload/product/' . $fileName . '.' . $fileExtension));
                        $path = 'upload/product/' . $fileName . '.' . $fileExtension;
                        ProductImage::create([
                            'path' => $path,
                            'product_id' => $item->id,
                        ]);
                    }
                }
            }
            if ($multi_image) {
                //explode multi image
                $multi_image = explode(',', $multi_image);
                foreach ($multi_image as $image) {
                    //check if image is present in 'upload/admin_uploads/product_zip/' folder
                    $files = glob(public_path($this->seller_zip_path_name . $image));
                    if (!empty($files)) {
                        $fileInfo = pathinfo($files[0]);
                        $fileExtension = $fileInfo['extension'];
                        //if extension is jpg,png,jpeg,webp
                        if ($fileExtension == 'jpg' || $fileExtension == 'png' || $fileExtension == 'jpeg' || $fileExtension == 'webp') {
                            $fileName = $fileInfo['filename'];
                            //change file name to unique name
                            $fileName = $fileName . '_' . microtime(true);
                            //copy file to 'upload/product/' folder
                            copy($files[0], public_path('upload/product/' . $fileName . '.' . $fileExtension));
                            $path = 'upload/product/' . $fileName . '.' . $fileExtension;
                            ProductImage::create([
                                'path' => $path,
                                'product_id' => $item->id,
                            ]);
                        }
                    }
                }
            }
            //remove images from 'upload/admin_uploads/product_zip/' folder
            // $files = glob(public_path($this->seller_zip_path_name . '*'));
            // foreach ($files as $file) {
            //     if (is_file($file)) {
            //         unlink($file);
            //     }
            // }


            //$this->imageSave($row[10], $item->id);
            return $item;
        }else{
            //check if sku already exists for product uploaded by seller
            $sellerDetail = $this->user->sellerDetail;
            
            $brands = $sellerDetail->brands->pluck('id');
            //get product by sku and brand id
            $item = Product::where('sku', "$sku")->whereIn('brand_id',  $brands)->first();

            if($item->exists()){
                
                $item->update([
                    //'name' =>  $name,
                    //'slug' => Str::slug($name),
                    'unit_price' => $unit_price,
                    //'per_unit' => $per_unit,
                    //'unit_per_price' => $unit_per_price,
                    'discount' => intval($discount) > 0 ? $discount : 0,
                    //'stock' => $stock ? $stock : 1000,
                    //'reorder' => intval($reorder) ? $reorder : 0,
                    //'taxrate' => intval($taxrate) > 0 ? intval($taxrate) : 20,
                    //'status' => 1,
                    //'brand_id' => $this->brandGetOrCreate($brand_name),
                    'primary_image' => $primary_image,
                    'multi_image' => $multi_image,
                ]);


                $product_detail = ProductDetail::where('product_id', $item->id)->first();
                $product_detail->update([
                    'description' => $description,
                    'meta_title' => $meta_title,
                    'meta_description' => $meta_description,
                    'pack' => $pack,
                    'unit_weight' => $unit_weight,
                ]);

                //Insert Category
                $category_id = $this->detectCategoryId($category_2);
                if ($category_id != '') {
                    $item->categories()->sync($category_id);
                }

                //check if primary image is not empty
                //Log::info("Primary Image: " . $primary_image);
                if ($primary_image) {
                    //Log::info("Primary Image IN: " . $primary_image);
                    //remove previous image
                    $product_images = ProductImage::where('product_id', $item->id)->get();
                    //log sql
                    $query = ProductImage::where('product_id', $item->id);
                    $sql = Str::replaceArray('?', $query->getBindings(), $query->toSql());
                    //Log::info($sql);

                    foreach ($product_images as $product_image) {
                        $product_image->delete();
                        //Log::info("Deleting Image" . $product_image->path);
                    }
                    //check if primary image is present in 'upload/admin_uploads/product_zip/' folder
                    //Log::info("Primary Image: " .$this->seller_zip_path_name . $primary_image);
                    $files = glob(public_path($this->seller_zip_path_name . $primary_image));
                    //Log::info("files: " . print_r($files, true));
                    if (!empty($files)) {
                        //Log::info("files if case: " . $primary_image);
                        $fileInfo = pathinfo($files[0]);
                        $fileExtension = $fileInfo['extension'];
                        //if extension is jpg,png,jpeg,webp
                        if ($fileExtension == 'jpg' || $fileExtension == 'png' || $fileExtension == 'jpeg' || $fileExtension == 'webp') {
                            $fileName = $fileInfo['filename'];
                            //change file name to unique name
                            $fileName = $fileName . '_' . microtime(true);
                            //copy file to 'upload/product/' folder
                            copy($files[0], public_path('upload/product/' . $fileName . '.' . $fileExtension));
                            $path = 'upload/product/' . $fileName . '.' . $fileExtension;
                            ProductImage::create([
                                'path' => $path,
                                'product_id' => $item->id,
                            ]);
                            //generate sql query of ProductImage::create(['path' => $path,'product_id' => $item->id,]);
                            $query = ProductImage::where('path', $path)->where('product_id', $item->id);
                            $sql = Str::replaceArray('?', $query->getBindings(), $query->toSql());
                            //Log::info($sql);



                        }
                    }
                }
                if ($multi_image) {
                    //explode multi image
                    $multi_image = explode(',', $multi_image);
                    foreach ($multi_image as $image) {
                        //check if image is present in 'upload/admin_uploads/product_zip/' folder
                        $files = glob(public_path($this->seller_zip_path_name . $image));
                        if (!empty($files)) {
                            $fileInfo = pathinfo($files[0]);
                            $fileExtension = $fileInfo['extension'];
                            //if extension is jpg,png,jpeg,webp
                            if ($fileExtension == 'jpg' || $fileExtension == 'png' || $fileExtension == 'jpeg' || $fileExtension == 'webp') {
                                $fileName = $fileInfo['filename'];
                                //change file name to unique name
                                $fileName = $fileName . '_' . microtime(true);
                                //copy file to 'upload/product/' folder
                                copy($files[0], public_path('upload/product/' . $fileName . '.' . $fileExtension));
                                $path = 'upload/product/' . $fileName . '.' . $fileExtension;
                                ProductImage::create([
                                    'path' => $path,
                                    'product_id' => $item->id,
                                ]);
                            }
                        }
                    }
                }
                
            }

           

        }

        //remove images from 'upload/admin_uploads/product_zip/' folder
        // $files = glob(public_path($this->seller_zip_path_name . '*'));
        // foreach ($files as $file) {
        //     if (is_file($file)) {
        //         unlink($file);
        //     }
        // }
        return;
    }

    public function brandGetOrCreate($brand_name)
    {
        $sellerDetail = $this->user->sellerDetail;
        $sellerDetailId = $sellerDetail->id;

        if ($brand_name) {
            $brand = Brand::firstOrCreate([
                'name' => $brand_name,
                'seller_detail_id' => $sellerDetailId,
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
