<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class UploadSpecialCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upload:special-categories';

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
        $this->info('Uploading special categories...');

        $category_array = ['Markket Specials','Markket Clearance','Markket Exclusives','Featured Brands','Farmers Markket'];
        
        foreach($category_array as $category){
            $files = glob(public_path('upload/specialcategories/' . Str::slug($category) . '.*'));
    
            if (!empty($files)) {
                $fileInfo = pathinfo($files[0]);
                $fileExtension = $fileInfo['extension'];
                $fileName = $fileInfo['filename'];
                $path = 'upload/specialcategories/' . $fileName . '.' . $fileExtension;
            }else{
                echo 'Category image not found: ' . $category . PHP_EOL;
                $path = 'upload/product/imageholderproduct.jpg';
            }

            Category::updateOrCreate(
                ['name' => $category],
                [
                    'slug' => Str::slug($category),
                    'category_id' => null,
                    'image' => $path,
                    'created_at' => '2023-01-01 00:00:00',
                 ]
            );
        }

    }
}
