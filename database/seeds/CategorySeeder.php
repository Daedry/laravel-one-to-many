<?php

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['FrontEnd', 'BackEnd', 'FullStack', 'Programming', 'Design', 'Marketing'];

        foreach ($categories as $category) {
            $new_cat = new Category();
            $new_cat->name = $category;
            $new_cat->slug = Str::slug($new_cat->name);
            $new_cat->save();
        }
    }
}
