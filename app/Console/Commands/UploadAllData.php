<?php

namespace App\Console\Commands;

use App\Imports\DataImport;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class UploadAllData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:import';

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

        $dataDirectory = 'app/Data/Data2';

        $files = glob($dataDirectory . '/*');

        foreach ($files as $file) {

            if (!file_exists($file)) {
                $this->error('File not found: ' . $file);
                return;
            }

            Excel::import(new DataImport(), $file);
            
        }
    }
}
