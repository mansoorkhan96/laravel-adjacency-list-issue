<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $parentCategory = Category::factory()->create();

        $childCategories = Category::factory()->times(10)->create(['parent_id' => $parentCategory->getKey()]);

        Post::factory()->times(100)->create()->each(function (Post $post) use ($childCategories) {
            $post
                ->categories()
                ->attach($childCategories->random(rand(2, 5))->pluck('id'));
        });
    }
}
