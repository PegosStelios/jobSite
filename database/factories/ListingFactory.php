<?php

namespace Database\Factories;

use App\Models\Listing;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Listing::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->unique()->sentence(rand(3, 6));
        $content = '';

        // gets saved as html so we can later use MarkDown
        for($i = 0; $i < 5; $i++){
            $content .= '<p class="mb-4">' . fake()->sentence(rand(5, 10)) . '</p>';
        }

        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . rand(1000, 9999),
            'description' => fake()->paragraph(rand(10, 20)),
            'company' => fake()->company(),
            'company_url' => fake()->url(),
            'location' => fake()->city() . ', ' . fake()->country(),
            'logo' => basename(fake()->image(storage_path('app/public'))),
            'is_highlighted' => (rand(1, 9) > 5),
            'is_active' => true,
            'content' => $content,
            'apply_url' => fake()->url(),
        ];
    }
}
