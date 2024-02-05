<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateCategoryCSV extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:category-csv';

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
        $csvFileName = 'old_category_data.csv';

        // Dosyayı yazma modunda aç
        $fp = fopen($csvFileName, 'w');

        // İsteğe bağlı: CSV dosyasının başlığını ekle
        fputcsv($fp, ['Category']);

        foreach ($main_categories as $category) {
            $sub_categories = $category->categories;
            foreach ($sub_categories as $sub_category) {
                //create csv with this.
                fputcsv($fp, [strtolower($category->name).'-'.strtolower($sub_category->name)]);
            }
        }
        // Dosyayı kapat
        fclose($fp);

        return;
    }
}
