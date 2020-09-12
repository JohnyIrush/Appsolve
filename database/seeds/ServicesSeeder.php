<?php

use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Services ::truncate();
        DB::table('services_version')->truncate();
        App\Services ::create([
            'service'=>'hosting',
            'price'=>50
            ]);
        App\Services ::create([
            'service'=>'seo',
            'price'=>20
            ]);      
        App\Services ::create([
            'service'=>'security',
            'price'=>70
            ]);
        App\Services ::create([
            'service'=>'management',
            'price'=>20
            ]);

    }
}
