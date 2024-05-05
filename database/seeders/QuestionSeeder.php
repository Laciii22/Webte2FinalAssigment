<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'title' => 'What is PHP?',
                'user_id' => 2,
                'active' => true,
                'category' => 'choice', // Changed to 'WEBTE' as per your constraint
                'closed_at' => null,
                'lesson' => 'WEBTE', // Changed to 'MAT' as per your constraint
                'code' => 'Agx5s'
            ],
            [
                'title' => 'How to install Laravel?',
                'user_id' => 3,
                'active' => true,
                'category' => 'choice', // Changed to 'WEBTE' as per your constraint
                'closed_at' => null,
                'lesson' => 'MAT', // Changed to 'MAT' as per your constraint
                'code' => 'Bhy4t'
            ],
            [
                'title' => 'What is the latest version of MySQL?',
                'user_id' => 2,
                'active' => true,
                'category' => 'choice', // Changed to 'WEBTE' as per your constraint
                'closed_at' => null,
                'lesson' => 'WEBTE', // Changed to 'MAT' as per your constraint
                'code' => 'Cfd3r'
            ],
            [
                'title' => 'How to use Eloquent ORM?',
                'user_id' => 3,
                'active' => true,
                'category' => 'text', // Changed to 'WEBTE' as per your constraint
                'closed_at' => null,
                'lesson' => 'MAT', // Changed to 'MAT' as per your constraint
                'code' => 'Dge2q'
            ],
            [
                'title' => 'What is Blade templating engine?',
                'user_id' => 2,
                'active' => true,
                'category' => 'text', // Changed to 'WEBTE' as per your constraint
                'closed_at' => null,
                'lesson' => 'MAT', // Changed to 'MAT' as per your constraint
                'code' => 'Ehf1p'
            ],
            [
                'title' => 'What is RESTful API?',
                'user_id' => 3,
                'active' => true,
                'category' => 'text', // Changed to 'WEBTE' as per your constraint
                'closed_at' => null,
                'lesson' => 'MAT', // Changed to 'MAT' as per your constraint
                'code' => 'Fcg0o'
            ],
            [
                'title' => 'What is Object-Oriented Programming (OOP)?',
                'user_id' => 2,
                'active' => true,
                'category' => 'text', // Changed to 'WEBTE' as per your constraint
                'closed_at' => null,
                'lesson' => 'MAT', // Changed to 'MAT' as per your constraint
                'code' => 'Gbf9n'
            ],
            [
                'title' => 'What are Agile Software Development methodologies?',
                'user_id' => 3,
                'active' => true,
                'category' => 'text', // Changed to 'WEBTE' as per your constraint
                'closed_at' => null,
                'lesson' => 'WEBTE', // Changed to 'MAT' as per your constraint
                'code' => 'Hae8m'
            ],
            [
                'title' => 'How to implement authentication in Laravel?',
                'user_id' => 2,
                'active' => true,
                'category' => 'text', // Changed to 'WEBTE' as per your constraint
                'closed_at' => null,
                'lesson' => 'WEBTE', // Changed to 'MAT' as per your constraint
                'code' => 'Iad7l'
            ],
            [
                'title' => 'What is the difference between GET and POST requests?',
                'user_id' => 3,
                'active' => true,
                'category' => 'text', // Changed to 'WEBTE' as per your constraint
                'closed_at' => null,
                'lesson' => 'WEBTE', // Changed to 'MAT' as per your constraint
                'code' => 'Jbc6k'
            ],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
