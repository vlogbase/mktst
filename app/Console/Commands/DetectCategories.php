<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Console\Command;

class DetectCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'detect:categories';

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
         $this->info('Detecting categories...');
         $file = fopen('app/Data/UpdatedData/updated_category_data-2.csv', 'r');
         while ($row = fgetcsv($file)) {
            $data = ($row);
            if ($data) {
                $subCategory = $data[4];
                $category = $data[5];
                
                $foundCategory = $this->findCategory($category);
                $foundSubCategory = $this->findCategory($subCategory);

                //Find Product
                $sku = $data[0];
                $product = Product::where('sku', $sku)->first();

                if($product){
                    if($foundCategory && $foundSubCategory){
                        $product->categories()->sync([$foundCategory->id, $foundSubCategory->id]);
                    }
                }
                
            }
        }

    }

    private function findCategory($name){
        $category = Category::where('name', $name)->first();
        if($category){
            return $category;
        }else{
            return null;
        }
    }
}
