<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $questions = Question::all();
        } else {
            $questions = Question::where('user_id', Auth::id())->get();
        }
        $users = User::where('is_admin', false)->get();

        $questionCodes = $questions->pluck('code'); // Get all question codes
        $responses = Response::whereIn('question_code', $questionCodes)->get(); // Get responses where question_code is in $questionCodes

        return view('dashboard.dashboard', compact('questions', 'users', 'responses'));
    }
}
