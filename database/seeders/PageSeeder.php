<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $page = new Page;
        $page = new Page(["en" => ["name" => "customer", "desc" => "desc"],
                            "ar" => ["name" => "الرؤية","desc" => "الوصف"]]);
        $page['identifier'] = 'customer';
        
        $page->save();
    }
}


//php artisan db:seed --class=UserSeeder