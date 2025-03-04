<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Symfony\Component\Clock\now;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

      $deril =  User::create([
            'name'=>'Muhammad Deril',
            'username'=>'deriltetsuya',
            'email'=>'derilkillms@gmail.com',
            'email_verified_at'=>now(),
            'password'=>Hash::make('password'),
            'remember_token'=>Str::random(10)
        ]);

        // Category::create([
        //     'name'=>'Web Design',
        //     'slug'=>'web-design'
        // ]);

        // Post::create([
        //     'title'=>'Judul artikel 1',
        //     'author_id'=>1,
        //     'category_id'=>1,
        //     'slug'=>'judul-artikel-1',
        //     'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Non itaque praesentium commodi quo. Dolorum vero rem ipsum hic dolor similique quod, fugit laborum impedit architecto et corporis, maxime fuga eos.'

        // ]);

        $this->call([CategorySeeder::class,UserSeeder::class]);

        Post::factory(100)->recycle([Category::all(),$deril,User::all()])->create();
    }
}
