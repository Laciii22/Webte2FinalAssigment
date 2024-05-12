<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(ArchivedQuestionSeeder::class);
        $this->call(ResponseSeeder::class);
    }
}