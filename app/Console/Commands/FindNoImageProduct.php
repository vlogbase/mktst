<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FindNoImageProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:find-image';

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
        $pdfImages = 0;
        $copied = 0;


        foreach ($products as $product) {
            $image = $product->productimages->first();

            if (strpos($image->path, 'imageholderproduct') !== false) {
                $partialFileName = $product->sku;
                $files = glob(public_path('upload/product/' . $partialFileName . '.pdf'));

                if (!empty($files)) {

                    $destinationPath = public_path('upload/pdfimages/' . $partialFileName . '.pdf');
                    if(!file_exists($destinationPath)){
                        copy($files[0], $destinationPath);
                        $copied++;
                    }
                    $pdfImages++;
                    echo 'YES->'.$product->sku."\n";
                }else{
                    echo $product->sku."\n";
                    $counterNoImage++; //Not found product image
                }
                
            }
        }

        $this->info('Total product: ' . $products->count());
        $this->info('Total No image: ' . $counterNoImage);
        $this->info('Total PDF image: ' . $pdfImages);
        $this->info('Copied: ' . $copied);
    }
}
