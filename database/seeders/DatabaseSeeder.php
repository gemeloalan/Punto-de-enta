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
        // \App\Models\User::factory(15)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
       
         State::factory(15)->create();
         Municipality::factory(15)->create();
         Customer::factory(15)->create();
         Category::factory(15)->create();
         Brand::factory(15)->create();
         Product::factory(15)->create();
         Sale::factory(15)->create();
         ProductSale::factory(15)->create();
    }
}
