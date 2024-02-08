<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class CreateProductCsvData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export-all:product-csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $csvFileName = 'result_data.csv';

        // Dosyayı yazma modunda aç
        $fp = fopen($csvFileName, 'w');

        // İsteğe bağlı: CSV dosyasının başlığını ekle
        fputcsv($fp, ['SKU', 'Name', 'Tax', 'Unit Price', 'Unit Per Price', 'Brand Name', 'Pack Size', 'Category', 'Sub Category']);

                $products = Product::all();
                foreach ($products as $product) {
                    $category = $product->categories->where('category_id', null)->first();
                    if(!is_null($category)){
                        $sub_category = $product->categories->where('category_id', $category->id)->first();
                    }else{
                        $sub_category = null;
                    }
                    

                    fputcsv($fp, [
                        $product->sku,
                        $product->name,
                        $product->taxrate,
                        floatval($product->unit_price),
                        floatval($product->unit_per_price),
                        $product->brand->name,
                        $product->productdetail->pack,
                        $category ? $category->name : '',
                        $sub_category ? $sub_category->name : '',
                    ]);
        }
        // Dosyayı kapat
        fclose($fp);

        return;
    }

}
