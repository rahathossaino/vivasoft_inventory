<?php

namespace Database\Seeders;

use App\Models\Attachment;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductQty;
use App\Models\Tax;
use App\Models\Unit;
use App\Models\User;
use App\Models\Warehouse;
use Database\Factories\CategoryFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        Brand::factory()->create();
        Category::factory()->create();
        Tax::factory()->create();
        Unit::factory()->create();
        Attachment::factory()->create();
        Warehouse::factory()->create();
        ProductQty::factory()->create();

    }
}
