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
                'title' => 'What is PHP?', //this one has also arcchived one
                'user_id' => 2,
                'active' => true,
                'category' => 'choice',
                'closed_at' => null,
                'lesson' => 'WEBTE',
                'code' => 'Agx5s',
                'version' => 2,
            ],
            [
                'title' => 'How to install Laravel?', //This one is active false
                'user_id' => 3,
                'active' => false,
                'category' => 'choice',
                'closed_at' => now()->addHour(),
                'lesson' => 'MAT',
                'code' => 'Bhy4t',
                'version' => 1,
            ],
            [
                'title' => 'What is the latest version of MySQL?',
                'user_id' => 2,
                'active' => true,
                'category' => 'choice',
                'closed_at' => null,
                'lesson' => 'WEBTE',
                'code' => 'Cfd3r',
                'version' => 1,
            ],
            [
                'title' => 'How to use Eloquent ORM?',
                'user_id' => 3,
                'active' => true,
                'category' => 'text',
                'closed_at' => null,
                'lesson' => 'MAT',
                'code' => 'Dge2q',
                'version' => 1,
            ],
            [
                'title' => 'What is Blade templating engine?',
                'user_id' => 2,
                'active' => true,
                'category' => 'text',
                'closed_at' => null,
                'lesson' => 'MAT',
                'code' => 'Ehf1p',
                'version' => 1,
            ],
            [
                'title' => 'What is RESTful API?',
                'user_id' => 3,
                'active' => true,
                'category' => 'text',
                'closed_at' => null,
                'lesson' => 'MAT',
                'code' => 'Fcg0o',
                'version' => 1,
            ],
            [
                'title' => 'What is Object-Oriented Programming (OOP)?',
                'user_id' => 2,
                'active' => true,
                'category' => 'text',
                'closed_at' => null,
                'lesson' => 'MAT',
                'code' => 'Gbf9n',
                'version' => 1,
            ],
            [
                'title' => 'What are Agile Software Development methodologies?',
                'user_id' => 3,
                'active' => true,
                'category' => 'text',
                'closed_at' => null,
                'lesson' => 'WEBTE',
                'code' => 'Hae8m',
                'version' => 1,
            ],
            [
                'title' => 'How to implement authentication in Laravel?',
                'user_id' => 2,
                'active' => true,
                'category' => 'text',
                'closed_at' => null,
                'lesson' => 'WEBTE',
                'code' => 'Iad7l',
                'version' => 1,
            ],
            [
                'title' => 'What is the difference between GET and POST requests?',
                'user_id' => 3,
                'active' => true,
                'category' => 'text',
                'closed_at' => null,
                'lesson' => 'WEBTE',
                'code' => 'Jbc6k',
                'version' => 1,
            ],
        ];


        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
