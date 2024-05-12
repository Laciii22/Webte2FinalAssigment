<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Response;

class ResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $responses = [
            [
                'question_code' => 'Agx5s',
                'value' => 'Answer1',
                'count' => 107,
                'version' => 1,
            ],
            [
                'question_code' => 'Agx5s',
                'value' => 'Answer2',
                'count' => 152,
                'version' => 1,
            ],
            [
                'question_code' => 'Agx5s',
                'value' => 'Answer3',
                'count' => 85,
                'version' => 1,
            ],
            [
                'question_code' => 'Agx5s',
                'value' => '4',
                'count' => 122,
                'version' => 1,
            ],
            [
                'question_code' => 'Agx5s',
                'value' => 'Hypertext Preprocessor.',
                'count' => 10,
                'version' => 2,
            ],
            [
                'question_code' => 'Agx5s',
                'value' => 'Server-side scripting.',
                'count' => 15,
                'version' => 2,
            ],
            [
                'question_code' => 'Agx5s',
                'value' => 'HTML, CSS.',
                'count' => 8,
                'version' => 2,
            ],
            [
                'question_code' => 'Agx5s',
                'value' => 'Executed on server.',
                'count' => 12,
                'version' => 2,
            ],
            [
                'question_code' => 'Bhy4t',
                'value' => 'Composer, Laravel.',
                'count' => 10,
                'version' => 1,
            ],
            [
                'question_code' => 'Bhy4t',
                'value' => 'Command-line, Laravel new.',
                'count' => 15,
                'version' => 1,
            ],
            [
                'question_code' => 'Bhy4t',
                'value' => 'Install, Laravel.',
                'count' => 8,
                'version' => 1,
            ],
            [
                'question_code' => 'Cfd3r',
                'value' => 'MySQL 8.0.',
                'count' => 10,
                'version' => 1,
            ],
            [
                'question_code' => 'Cfd3r',
                'value' => 'Latest MySQL.',
                'count' => 15,
                'version' => 1,
            ],
            [
                'question_code' => 'Cfd3r',
                'value' => 'MySQL version.',
                'count' => 8,
                'version' => 1,
            ],
            [
                'question_code' => 'Cfd3r',
                'value' => 'MySQL upgrade.',
                'count' => 12,
                'version' => 1,
            ],
            [
                'question_code' => 'Dge2q',
                'value' => 'ORM usage.',
                'count' => 1,
                'version' => 1,
            ],
            [
                'question_code' => 'Ehf1p',
                'value' => 'Template engine.',
                'count' => 1,
                'version' => 1,
            ],
            [
                'question_code' => 'Fcg0o',
                'value' => 'API architecture.',
                'count' => 1,
                'version' => 1,
            ],
            [
                'question_code' => 'Gbf9n',
                'value' => 'Programming paradigm.',
                'count' => 1,
                'version' => 1,
            ],
            [
                'question_code' => 'Hae8m',
                'value' => 'Software development methods.',
                'count' => 1,
                'version' => 1,
            ],
            [
                'question_code' => 'Iad7l',
                'value' => 'Authentication setup.',
                'count' => 1,
                'version' => 1,
            ],
            [
                'question_code' => 'Jbc6k',
                'value' => 'Request methods difference.',
                'count' => 1,
                'version' => 1,
            ],
        ];


        // Populate the questions table
        foreach ($responses as $response) {
            // Generate a random 5-character code for each question
            Response::create($response);
        }
    }
}