<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cart;
use App\Models\Discount;
use App\Models\Order;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(5)->create();
        \App\Models\Discount::factory(3)->create();
        DB::table('categories')->insert([
            'name' => 'Настольные',
        ]);
        DB::table('categories')->insert([
            'name' => 'Абажур',
        ]);
        DB::table('categories')->insert([
            'name' => 'Классика',
        ]);

        ini_set('memory_limit', '-1');
        DB::unprepared(file_get_contents(storage_path('app/public/products.sql')));
        $products = Product::get();
        collect($products)->each( function ($product ) {
            $string = Str::upper(Str::random(3));
            $a = rand(100, 999);
            $b = rand(100, 999);
            $c = rand(100, 999);
            $sku = $string .'-'.$a .'-'. $b .'-'. $c;
            $discount = Discount::inRandomOrder()->first();
            $id = $discount->id;
            $product->update(['SKU' => $sku, 'discount_id' => $id]);
        });

        \App\Models\Order::factory(10)->create();
        \App\Models\Cart::factory(10)->create();

        $products = Product::all();
        Cart::all()->each(function ($cart) use ($products) {
            $cart->products()->attach(
                $products->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        Order::all()->each(function ($order) use ($products) {
            $order->products()->attach(
                $products->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        $tags = collect(['Новинки', 'Популярные', 'Распродажа']);
        $tags->each(function ($tag){
            DB::table('tags')->insert(['name' => $tag]);
        });

        $tags = Tag::all();
        Product::all()->each(function ($product) use ($tags) {
            $product->tags()->attach(
                $tags->random(rand(1, 2))->pluck('id')->toArray()
            );
        });
    }
}
