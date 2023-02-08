<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Municipality;
use App\Models\Product;
use App\Models\ProductSale;
use App\Models\Sale;
use App\Models\State;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
   
         State::factory(9)->create();
         Municipality::factory(9)->create();
         Customer::factory(9)->create();
         Category::factory(9)->create();
         Brand::factory(9)->create();
         Product::factory(9)->create();
         Sale::factory(9)->create();
         ProductSale::factory(9)->create();
    }
}
