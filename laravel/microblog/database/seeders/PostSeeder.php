<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // get 3 existing users or create 3 new users
        $users = User::count() < 3
            ? collect([
                User::create([
                    'name' => 'Jon Doe',
                    'email' => 'jondoe@example.com',
                    'password' => bcrypt('password'),
                ]),
                User::create([
                    'name' => 'Bob Ross',
                    'email' => 'bobross@example.com',
                    'password' => bcrypt('password'),
                ]),
                User::create([
                    'name' => 'Emily Wilder',
                    'email' => 'emilywilder@example.com',
                    'password' => bcrypt('password'),
                ]),
            ])
            : User::take(3)->get();
        
        $posts = [
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'Fusce eu congue lorem, et fringilla purus. Maecenas tristique eleifend ex a volutpat',
            'Sed tempus vestibulum lacinia.',
            'Phasellus eu risus dui. Integer quis enim dui. Aliquam porta fermentum bibendum.',
            'Phasellus pretium nunc vitae lacinia tincidunt.',
            'Etiam aliquet consectetur rutrum.',
            'Proin scelerisque urna eu felis fermentum, sed imperdiet nulla consequat.',
            'Etiam a risus dignissim, vestibulum nisl venenatis, vestibulum quam.',
            'Phasellus ac urna ac turpis dignissim pellentesque vitae ut lacus.',
            'Mauris tincidunt diam quis dui consectetur, in mattis lorem aliquet.',
        ];

        foreach ($posts as $message) {
            $users->random()->posts()->create([
                'message' => $message,
                'created_at' => now()->subMinutes(rand(5, 1440)),
            ]);
        }  
    }
}
