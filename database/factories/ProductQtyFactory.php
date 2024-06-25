<?php

namespace Database\Factories;

use App\Models\ProductQty;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductQty>
 */
class ProductQtyFactory extends Factory
{
    protected $model = ProductQty::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id'=>15,
            'qty' =>200 ,
            'warehouse_id'=>7,
            'product_id'=>1,
        ];
    }
}
