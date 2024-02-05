<?php

namespace App\Console\Commands;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Console\Command;

class AllDataUpload extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:all-data';

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
        $this->info('All data upload command is running');

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

        $this->info('Removed all data from the database.');

        $categoryFile = 'app/Data/MainData/new_category_data.csv';
        
        $this->call('products:import');
        $this->call('data:import');
        $this->call('detect:categories');
        $this->call('upload:special-categories');

        $this->info('All data upload command has been executed successfully.');
    }

    
}
