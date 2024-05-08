<?php

namespace Database\Seeders;

use App\Models\ArchivedQuestion;
use Illuminate\Database\Seeder;

class ArchivedQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'title' => 'What is PHP?',
                'user_id' => 2,
                'category' => 'choice',
                'closed_at' => now()->addHour(),
                'lesson' => 'WEBTE',
                'code' => 'Agx5s',
                'version' => 1,
            ],
            [
                'title' => 'How to install Laravel?',
                'user_id' => 3,
                'category' => 'choice',
                'closed_at' => now()->addHour(),
                'lesson' => 'MAT',
                'code' => 'Bhy4t',
                'version' => 1,
            ]
        ];

        foreach ($questions as $question) {
            ArchivedQuestion::create($question);
        }
    }
}