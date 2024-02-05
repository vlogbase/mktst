<?php

namespace App\Console\Commands;

use App\Exports\CreateCSVOld;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Excel;

class CreateCSVData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:product-csv';

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
        $main_categories = \App\Models\Category::where('category_id', null)->get();
        $csvFileName = 'result_data.csv';

        // Dosyayı yazma modunda aç
        $fp = fopen($csvFileName, 'w');

        // İsteğe bağlı: CSV dosyasının başlığını ekle
        fputcsv($fp, ['SKU', 'Name', 'Tax', 'Unit Price', 'Unit Per Price', 'Brand Name', 'Pack Size', 'Category', 'Sub Category','Old Main Category','Old Sub Category']);

        foreach ($main_categories as $category) {
            $sub_categories = $category->categories;
            foreach ($sub_categories as $sub_category) {
                $products = $sub_category->products;
                foreach ($products as $product) {
                    fputcsv($fp, [
                        $product->sku,
                        $product->name,
                        $product->taxrate,
                        floatval($product->unit_price),
                        floatval($product->unit_per_price),
                        $product->brand->name,
                        $product->productdetail->pack,
                        $category->name,
                        $sub_category->name,
                        $this->findOldMainCategory($product->sku, 'main'),
                        $this->findOldMainCategory($product->sku, 'sub')
                    ]);
                }
            }
        }
        // Dosyayı kapat
        fclose($fp);

        return;
    }

    private function findOldMainCategory($sku, $type)
    {
        $file = fopen('app/Data/UpdatedData/updated_category_data-2.csv', 'r');
        while ($row = fgetcsv($file)) {
            $data = ($row);
            if ($data) {
                $skuData = $data[0];
                $subCategory = $data[3];
                $category = $data[2];
                if ($skuData == $sku) {
                    if ($type == 'main') {
                        return $category;
                    } else {
                        return $subCategory;
                    }
                }
            }
        }
    }
}
