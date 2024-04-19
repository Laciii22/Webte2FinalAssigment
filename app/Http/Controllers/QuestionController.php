<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function showByCode($code)
    {
        $question = Question::where('code', $code)->firstOrFail();
        return view('questions.question', compact('question'));
    }
}
