<?php

namespace Database\Factories;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class UnitFactory extends Factory
{
    protected $model=Unit::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id'=>3,
            'name' => "piece",
            'code'=>'pc',
            'for'=>'Product-unit',
            'base_unit' => "piece",
            'operator'=>'*',
            'operation_value' => "3",
            'is_active'=>1
        ];
    }
}
