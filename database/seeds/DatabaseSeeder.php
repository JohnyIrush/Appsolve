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
       $this->call(ProductTableSeeder::class);
    }
}
