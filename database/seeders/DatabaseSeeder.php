<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Listing;
use \App\Models\Tag;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $tags = Tag::factory(10)->create();

        User::factory(10)->create()->each(function ($user) {
            Listing::factory(rand(1, 5))->create([
                'user_id' => $user->id
            ])->each(function ($listing) {
                $listing->tags()->attach(Tag::factory(rand(1, 3))->create());
            });
        });
    }
}
