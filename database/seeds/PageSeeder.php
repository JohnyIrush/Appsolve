<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
        \App\Page::truncate();
        $page = new \App\Page([
            'page' => 'home',
            'content' => '',
       ]);

       $page->save();

       $page = new \App\Page([
        'page' => 'apps',
        'content' => '',
       ]);

       $page->save();

       $page = new \App\Page([
        'page' => 'services',
        'content' => '',
       ]);

       $page->save();

       $page = new \App\Page([
        'page' => 'about',
        'content' => '',
       ]);

       $page->save();
    }
}
