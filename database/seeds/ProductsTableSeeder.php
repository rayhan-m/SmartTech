<?php

use App\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 1; $i < 5; $i++) {
            $product = new Product();
            $product->name = $faker->name;
            $product->category_id = $i;
            $product->price = 2000+$i;
            $product->quantity =100+$i;
            $product->product_status =0;
            $product->details = $faker->text;
            $product->feature = $faker->text;
            $product->image = "backend/uploads/product/".$i.".jpg";
            $product->save();
        }
        $faker = Faker::create();
        for ($i = 1; $i < 5; $i++) {
            $product = new Product();
            $product->name = $faker->name;
            $product->category_id = $i;
            $product->price = 2000+$i;
            $product->quantity =100+$i;
            $product->product_status =1;
            $product->details = $faker->text;
            $product->feature = $faker->text;
            $product->image = "backend/uploads/product/".$i.".jpg";
            $product->save();
        }
    }
}