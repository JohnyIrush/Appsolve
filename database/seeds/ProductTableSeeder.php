<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Product::truncate();
        $product = new \App\Product([
             'imagePath' => 'Images/microsoft-edge.jpg',
             'title' => 'Microsoft-edge',
             'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis accusantium exercitationem a, pariatur soluta alias.',
             'price' => 6 
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'Images/avast.png',
            'title' => 'Avast',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis accusantium exercitationem a, pariatur soluta alias.',
            'price' => 10 
       ]);
       $product->save();

       $product = new \App\Product([
        'imagePath' => 'Images/windows-10.jpg',
        'title' => 'Microsoft Windows 10',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis accusantium exercitationem a, pariatur soluta alias.',
        'price' => 10 
       ]);
       $product->save();
       $product = new \App\Product([
        'imagePath' => 'Images/cybersecurity.jpg',
        'title' => 'cyber security',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis accusantium exercitationem a, pariatur soluta alias.',
        'price' => 6 
   ]);
   $product->save();

   $product = new \App\Product([
       'imagePath' => 'Images/comp.jpg',
       'title' => 'Computer',
       'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis accusantium exercitationem a, pariatur soluta alias.',
       'price' => 10 
  ]);
  $product->save();

  $product = new \App\Product([
   'imagePath' => 'Images/binary.jpg',
   'title' => 'Binary',
   'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis accusantium exercitationem a, pariatur soluta alias.',
   'price' => 10 
  ]);
  $product->save();
    }
}
