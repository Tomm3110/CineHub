<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $films = Film::all();

        if ($users->count() === 0 || $films->count() === 0) {
            $this->command->info('Veuillez créer des Users et des Films avant de seeder les commentaires.');
            return;
        }
        Comment::factory(50)
            ->recycle($users)
            ->recycle($films)
            ->create();
    }
}
