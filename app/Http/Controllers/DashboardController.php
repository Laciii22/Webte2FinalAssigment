<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
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
        return view('dashboard.dashboard', compact('questions'));
    }
}
