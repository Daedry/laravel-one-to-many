<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Post;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
     for ($i=0; $i < 10; $i++) { 
        $newPost = new Post();
        $newPost->title = $faker->sentence(3);
        $newPost->slug = Str::slug($newPost->title, '-');
        $newPost->content = $faker->text(350);
        $newPost->cover_image = $faker->imageUrl(180, 90, 'Post', true, '$newPost->slug', true);
        $newPost->save();
     }   
    }
}
