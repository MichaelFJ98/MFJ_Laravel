<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // user seeders
        \App\Models\User::factory(5)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => 'Password!321',
            'bio' => "Admins bio",
            'birthday' => date("Y/m/d"),
            'is_admin' => true,

        ]);

        //question seeders 
        \App\Models\Question::factory()->create([
            'question' => 'This is question 1 for first category',
            'answer' => 'This is answer 1 for first category',
            'category_id' => '1',

        ]);

        \App\Models\Question::factory()->create([
            'question' => 'This is question 1 for second category',
            'answer' => 'This is answer 1 for second category',
            'category_id' => '2',

        ]);
        //article seeders
        \App\Models\Article::factory(3)->create();
        //contact seeders
        \App\Models\Contact::factory(2)->create();
        //category seeders
        \App\Models\Category::factory(2)->create();
    }
}
