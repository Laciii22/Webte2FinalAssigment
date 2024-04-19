<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Response;
use Illuminate\Support\Facades\Redirect;


class QuestionController extends Controller
{
    public function showByCode($code)
    {
        $question = Question::where('code', $code)->firstOrFail();
        return view('questions.question', compact('question'));
    }

    public function submitResponse(Request $request)
    {
        $validatedData = $request->validate([
            'text_input' => 'required|string',
            // Add more validation rules if needed
        ]);

        // Assuming you have access to the question code from the view
        $questionCode = $request->input('question_code');

        // Create a response record
        Response::create([
            'question_code' => $questionCode,
            'selected_value' => $validatedData['text_input']
        ]);

        // Optionally redirect to another page
        return Redirect::route('questions.question-result', [$questionCode])->with('message', 'State saved correctly!!!');

        //return redirect()->route('questions.question-result');
    }

    public function showResult($questionCode)
    {
        $question = Question::where('code', $questionCode)->firstOrFail();

        // Fetch all responses for the question code
        $responses = Response::where('question_code', $questionCode)->get();

        // Pass the question and responses to the view
        return view('questions.question-result', compact('question', 'responses'));
    }

    public function destroy($code) /* //TODO not working */
    {
        $question =  Question::where('code', $code)->firstOrFail();
        $question->delete();
        return redirect()->route('questions.question');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'active' => 'required|boolean',
            'user_id' => 'required|exists:users,id', // Ensure the selected user exists
        ]);

        // Create new question
        Question::create([
            'title' => $request->title,
            'body' => $request->body,
            'active' => $request->active,
            'user_id' => $request->user_id,
            'category' => $request->category,
        ]);

        // Redirect to dashboard
        return redirect('/dashboard');
    }
    public function update(Request $request, Question $question)
    {
        // Validation
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
        ]);

        // Update question
        $question->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        // Redirect back with success message or to a specific route
        return redirect()->back()->with('success', 'Question updated successfully');
    }
}