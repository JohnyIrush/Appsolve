<?php

use Illuminate\Database\Seeder;

//use App\DynamicCms\Appversion;

class VersionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Version::truncate();
        App\Version::create(['version'=>'Basic']);
        App\Version::create(['version'=>'Standard']);
        App\Version::create(['version'=>'Pro']);
    }
}
