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
        //$users = User::where('is_admin', false)->get();
        $users = User::all();
        $selectedUserId = request()->query('user_id');
        
        if (Auth::user()->isAdmin()) {
            if ($selectedUserId) {
                $questions = Question::where('user_id', $selectedUserId)->get();
            } else {
                $questions = Question::all();
            }
        } else {
            $questions = Question::where('user_id', Auth::id())->get();
        }

        $questionCodes = $questions->pluck('code'); // Get all question codes
        $questionVersion = $questions->pluck('version');
        $responses = Response::whereIn('question_code', $questionCodes)
                        ->whereIn('version', $questionVersion)
                        ->get(); // Get responses where question_code is in $questionCodes*/
        //$responses = Response::whereIn('question_code', $questionCodes)->get();
        return view('dashboard.dashboard', compact('questions', 'users', 'responses', 'selectedUserId'));
    }
}
