<?php

namespace App\Console\Commands;

use App\Imports\ProductImport;
use App\Models\Category;
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
    protected $signature = 'products:import'; // php artisan products:import category_name

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

        $dataDirectory = 'app/Data'; // Klasör adı

        // Dosya yolu içindeki tüm dosyaları alın
        $files = glob($dataDirectory . '/*');

        // Her dosya için döngü yapın ve dosya adlarını değişken olarak kullanın
        foreach ($files as $file) {
            $category = pathinfo($file, PATHINFO_FILENAME);

            if (!file_exists($file)) {
                $this->error('File not found: ' . $file);
                return;
            }

            $category = Category::firstOrCreate(
                ['name' => ucfirst($category)],
                [
                    'slug' => Str::slug($category),
                ]
            );

            Excel::import(new ProductImport($category), $file);
        }
    }
}
