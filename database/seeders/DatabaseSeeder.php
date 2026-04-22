<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
// use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'boss@gmail.com',
        //     'password' => Hash::make('bigboss'),
        //     'role' => 'admin'
        // ]);
        // User::factory()->create([
        //     'name' => 'Editor 1',
        //     'email' => 'editor@gmail.com',
        //     'password' => Hash::make('editor1'),
        //     'role' => 'editor'
        // ]);
        // User::factory()->create([
        //     'name' => 'Editor 2',
        //     'email' => 'editor2@gmail.com',
        //     'password' => Hash::make('editor2'),
        //     'role' => 'editor'
        // ]);

        Post::factory()->count(15)->create();
        Comment::factory()->count(20)->create();
    }
}
