<?php

namespace Database\Seeders;

use App\Models\AppSlider;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\JobResume;
use App\Models\Message;
use App\Models\News;
use App\Models\Newsletter;
use App\Models\WebSlider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        //Blog::truncate();
        //News::truncate();
        //Gallery::truncate();
        WebSlider::truncate();
        AppSlider::truncate();
        //Message::truncate();
        //Newsletter::truncate();
        //JobResume::truncate();


        //JobResume::factory(20)->create();
        //Newsletter::factory(20)->create();
        //Gallery::factory(20)->create();
        //Blog::factory(20)->create();
        //News::factory(20)->create();
        WebSlider::factory(1)->create();
        AppSlider::factory(1)->create();
        //Message::factory(20)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
