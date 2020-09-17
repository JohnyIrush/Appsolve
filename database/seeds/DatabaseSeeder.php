<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $this->call(VersionsSeeder::class);
       $this->call(ServicesSeeder::class);
       $this->call(PageSeeder::class);
       $this->call(PostTypeSeeder::class);
       $this->call(CategorySeeder::class);
       $this->call(ProductTableSeeder::class);
    }
}
