<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        ProductVariant::query()->truncate();
        ProductGallery::query()->truncate();
        DB::table('product_tag')->truncate();
        Product::query()->truncate();
        ProductSize::query()->truncate();
        ProductColor::query()->truncate();
        Tag::query()->truncate();

        Tag::factory(15)->create();


        // Size 1,6Lbs, 2Lbs, 5Lbs, 10Lbs

        foreach (['1,6Lbs', '2Lbs', '5Lbs', '10Lbs'] as $item) {
            ProductSize::query()->create([
                'name' => $item
            ]);
        }
        foreach (['#66FFFF', '#66FFCC', '#33FF99', '#3333FF'] as $item) {
            ProductColor::query()->create([
                'name' => $item
            ]);
        }

        for ($i = 0; $i < 1000; $i++) {
            $name = fake()->text(100);
            Product::query()->create([
                'catalogue_id' => rand(2, 7),
                'name' => $name,
                'slug' => Str::slug($name) . '-' . Str::random(8),
                'sku' => Str::random(7) . $i,
                'img_thumbnail' => 'https://bizweb.dktcdn.net/100/011/344/products/iso-gold1.jpg?v=1670036275547',
                'price_regular' => 1750000,
                'price_sale' => 1590000,
            ]);
        }
        //
        for ($i = 1; $i < 1001; $i++) {
            ProductGallery::query()->insert([
                [
                    'product_id' => $i,
                    'image' => 'https://bizweb.dktcdn.net/100/011/344/products/iso-gold1.jpg?v=1670036275547',

                ],
                [
                    'product_id' => $i,
                    'image' => 'https://bizweb.dktcdn.net/thumb/1024x1024/100/011/344/products/kevin-anabolic-iso-whey-2-kg-gymstore-jpeg.jpg?v=1714030753673',

                ],
            ]);
        }
        for ($i = 1; $i < 1001; $i++) {
            DB::table('product_tag')->insert([
                ['product_id' => $i, 'tag_id' => rand(1, 8)],
                ['product_id' => $i, 'tag_id' => rand(9, 15)]
            ]);
        }

        for ($productID = 1; $productID < 1001; $productID++) {
            $data = [];
            for ($sizeID = 1; $sizeID < 5; $sizeID++) {
                for ($colorID = 1; $colorID < 5; $colorID++) {
                    $data[] = [
                        'product_id' => $productID,
                        'product_size_id' => $sizeID,
                        'product_color_id' => $colorID,
                        'quantity' => 100,
                        'image' => 'https://bizweb.dktcdn.net/100/011/344/products/iso-gold1.jpg?v=1670036275547',
                    ];
                }
            }
            DB::table('product_variants')->insert($data);
        }
    }
}