<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'title' => 'What is PHP?',
                'body' => 'Can someone explain what PHP is and what it is used for?',
                'user_id' => 2 // User with ID 2
            ],
            [
                'title' => 'How to install Laravel?',
                'body' => 'I want to start using Laravel. How can I install it on my system?',
                'user_id' => 3 // User with ID 3
            ],
            [
                'title' => 'What is the latest version of MySQL?',
                'body' => 'I need to know the latest version of MySQL for my project. Can someone provide the information?',
                'user_id' => 2 // User with ID 2
            ],
            [
                'title' => 'How to use Eloquent ORM?',
                'body' => 'I am new to Laravel and want to learn about Eloquent ORM. Any resources or tutorials?',
                'user_id' => 3 // User with ID 3
            ],
            [
                'title' => 'What is Blade templating engine?',
                'body' => 'I heard about Blade templating in Laravel. Can someone explain its features and advantages?',
                'user_id' => 2 // User with ID 2
            ]
        ];

        // Populate the questions table
        foreach ($questions as $questionData) {
            // Generate a random 5-character code for each question
            $questionData['code'] = \Illuminate\Support\Str::random(5);
            Question::create($questionData);
        }
    }
}
