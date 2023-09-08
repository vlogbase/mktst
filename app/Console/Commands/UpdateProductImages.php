<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateProductImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:update-image';

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
        $products = \App\Models\Product::all();

        $counterNoImage = 0;
        $counterUpdated = 0;

        foreach ($products as $product) {
            $image = $product->productimages->first();

            if (strpos($image->path, 'imageholderproduct') !== false) {
                $counterNoImage++; //Not found product image

                $partialFileName = $product->sku;
                $files = glob(public_path('upload/product/' . $partialFileName . '.jpg'));

                if (!empty($files)) {
                    $fileInfo = pathinfo($files[0]);
                    $fileExtension = $fileInfo['extension'];

                    $path = 'upload/product/' . $partialFileName . '.' . $fileExtension;
                    $image->path = $path;
                    $image->save();
                    
                    $counterUpdated++;
                }
            }
        }

        $this->info('Total ' . $counterNoImage . ' images no image and ' . $counterUpdated . ' images updated.');
    }
}
