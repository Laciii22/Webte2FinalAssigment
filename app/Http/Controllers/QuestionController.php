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
        $responses = Response::where('question_code', $code)->get();

        return view('questions.question', compact('question', 'responses'));
    }


    public function submitResponse(Request $request)
    {

        $questionCode = $request->input('question_code');
        $question = Question::where('code', $questionCode)->firstOrFail();

        if ($question->category === "text") {
            $validatedData = $request->validate([
                'text_input' => 'required|string',
            ]);

            $response = Response::where('question_code', $questionCode)
                ->where('selected_value', $validatedData['text_input'])
                ->first();

            if ($response) {
                $response->increment('count');
            } else {
                Response::create([
                    'question_code' => $questionCode,
                    'selected_value' => $validatedData['text_input'],
                    'count' => 1
                ]);
            }
        } else {
            $validatedData = $request->validate([
                'response' => 'required|array', // Make sure at least one option is selected
                'response.*' => 'exists:responses,id', // Make sure option IDs are valid
            ]);
            // Iterate through each selected option and update the selection count
            foreach ($validatedData['response'] as $responseId) {
                $response = Response::findOrFail($responseId);
                $response->increment('count');
            }
        }
        // Voliteľne presmerujte na inú stránku
        return redirect()->route('questions.question-result', [$questionCode])->with('message', 'State saved correctly!!!');
    }


    public function showResult($questionCode)
    {
        $question = Question::where('code', $questionCode)->firstOrFail();

        // Fetch all responses for the question code
        $responses = Response::where('question_code', $questionCode)->get();

        // Pass the question and responses to the view
        return view('questions.question-result', compact('question', 'responses'));
    }

    public function destroy($question_code)
    {
        // Nájdenie otázky podľa kódu
        $question = Question::where('code', $question_code)->firstOrFail();

        // Odstránenie otázky
        $question->delete();

        // Presmerovanie na určenú cestu
        return redirect()->route('dashboard')->with('success', 'Question deleted successfully');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'lesson' => 'required|string',
            'active' => 'required|boolean',
            'category' => 'required|string',
            'user_id' => 'required|exists:users,id', // Ensure the selected user exists
        ]);

        $question = Question::create([
            'title' => $request->title,
            'lesson' => $request->lesson,
            'active' => $request->active,
            'user_id' => $request->user_id,
            'category' => $request->category,
        ]);

        // Create responses for input questions
        if ($question->category !== "text") {
            $inputOptions = $request->input('input_options');
            foreach ($inputOptions as $option) {
                Response::create([
                    'question_code' => $question->code, // Assuming 'code' is the question code
                    'value' => $option,
                    // Add other necessary fields here
                ]);
            }
        }

        // Redirect to dashboard
        return redirect('/dashboard')->with('success', 'Question created successfully');
    }

    public function update(Request $request, Question $question)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'lesson' => 'required|string',
            'active' => 'required|boolean',
            'category' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        // Check if 'active' is set to false
        if (!$request->input('active')) {
            $question->active = false; // Set 'active' to false
            $question->closed_at = now(); // Set 'closed_at' to the current timestamp
            $question->save();
            return redirect('/dashboard')->with('success', 'Question updated successfully');
        }

        // Update question
        $question->update($validatedData);

        // Check if the category has changed from "text" to "choice" or vice versa
        if ($question->category !== "text") {
            $inputOptions = $request->input('input_options');

            // Remove existing responses if category changed from "text" to "choice"
            if ($question->getOriginal('category') === "text") {
                Response::where('question_code', $question->code)->delete();
            }

            $answersDb = Response::where('question_code', $question->code)->get();

            // Extract the values of existing responses from the database
            $existingValues = $answersDb->pluck('value')->toArray();

            // Iterate over the input options
            foreach ($inputOptions as $option) {
                // Check if the option already exists in the database
                if (in_array($option, $existingValues)) {
                    // If it exists, do nothing
                    continue;
                }

                // If the option doesn't exist, create a new response
                Response::create([
                    'question_code' => $question->code,
                    'value' => $option,
                    // Add other necessary fields here
                ]);
            }

            // Now, remove responses from the database that are not present in the input options
            $answersDb->whereNotIn('value', $inputOptions)->each->delete();
        } elseif ($question->getOriginal('category') !== "text") {
            // Remove existing responses if category changed from "choice" to "text"
            Response::where('question_code', $question->code)->delete();
        }
        // Redirect back with success message or to a specific route
        return redirect('/dashboard')->with('success', 'Question updated successfully');
    }
}
