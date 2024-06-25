<?php

namespace Database\Factories;

use App\Models\Attachment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attachment>
 */
class AttachmentFactory extends Factory
{
    protected $model = Attachment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id'=>159,
            'uploaded_user_id' => null,
            'attachmentable_id' => $this->faker->numberBetween(1, 100), 
            'attachmentable_type' => 'App\Models\Product', 
            'url' => 'storage/app/public/upload/product/attachment/53465476812312.jpg',
            'state' => 'Product', 
            'label' => 'attachments',
            'file' => '53465476812312.jpg',
            'content_type' => 'jpg', 
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}
