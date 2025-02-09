<?php

namespace App\Console\Commands;

use App\Imports\ProductImport;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class ImportProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:import'; // php artisan products:import

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

        $dataDirectory = 'app/OldData';

        $files = glob($dataDirectory . '/*');


        $products = Product::all();
        foreach($products as $product){
            $product->delete();
        }

        $oldBrands = Brand::all();
        foreach($oldBrands as $oldBrand){
            $oldBrand->delete();
        }
        

        foreach ($files as $file) {
            $category = pathinfo($file, PATHINFO_FILENAME);

            if (!file_exists($file)) {
                $this->error('File not found: ' . $file);
                return;
            }

            $category = '';

            Excel::import(new ProductImport($category), $file);
        }

        
    }
}
