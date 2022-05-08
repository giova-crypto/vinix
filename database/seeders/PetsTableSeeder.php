<?php

namespace Database\Seeders;

use App\Models\Pet;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testUrl = 'https://http2.mlstatic.com/D_NQ_NP_825464-MCO47010599930_082021-O.webp';
        Pet::truncate();
        Tag::truncate();
        Category::truncate();
        
        //Creating tags
        $tag = new Tag;
        $tag->name = 'Sweet';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Big';
        $tag->save();
        
        $tag = new Tag;
        $tag->name = 'Partner';
        $tag->save();

        //Creating categories
        $category = new Category;
        $category->name = 'Perro';
        $category->save();

        $category = new Category;
        $category->name = 'Gato';
        $category->save();


        //Creating pets
        $pet = new Pet;
        $pet->name = 'Bruno';
        $pet->urlPhoto = $testUrl;
        $pet->category_id = 1;
        $pet->status= 'available';
        $pet->save();

        $pet = new Pet;
        $pet->name = 'Delaware';
        $pet->urlPhoto = $testUrl;
        $pet->category_id = 1;
        $pet->status= 'pending';
        $pet->save();

        $pet = new Pet;
        $pet->name = 'Tina';
        $pet->urlPhoto = $testUrl;
        $pet->category_id = 1;
        $pet->status= 'available';
        $pet->save();

        $pet = new Pet;
        $pet->name = 'Charlie';
        $pet->urlPhoto = $testUrl;
        $pet->category_id = 1;
        $pet->status= 'sold';
        $pet->save();

        $pet = new Pet;
        $pet->name = 'Mino';
        $pet->urlPhoto = $testUrl;
        $pet->category_id = 1;
        $pet->status= 'pending';
        $pet->save();

        $pet = new Pet;
        $pet->name = 'Pato';
        $pet->urlPhoto = $testUrl;
        $pet->category_id = 1;
        $pet->status= 'sold';
        $pet->save();
    }
}
