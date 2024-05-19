<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\ArchivedQuestion;
use App\Models\Response;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function showByCode($code)
    {
        $question = Question::where('code', $code)->firstOrFail();
        if (!$question->active) {
            return redirect()->route('questions.question-result', [$code])->with('message', 'Question is not active!!!');
        }
        $responses = Response::where('question_code', $question->code)
            ->where('version', $question->version)
            ->get(); // Get responses where question_code is in $questionCodes*/
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
                ->where('value', $validatedData['text_input'])
                ->first();

            if ($response) {
                $response->increment('count');
            } else {
                Response::create([
                    'question_code' => $questionCode,
                    'value' => $validatedData['text_input'],
                    'version' => $question->version,
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
        $question = Question::with('responses')->where('code', $questionCode)->firstOrFail();

        // Fetch responses for the current and previous versions
        $currentResponses = $question->responses;
        $allResponses = Response::where('question_code', $questionCode)
            ->orderBy('version', 'desc')
            ->get()
            ->groupBy('version');

        return view('questions.question-result', compact('question', 'currentResponses', 'allResponses'));
    }

    public function destroy($question_code)
    {
        // Nájdenie otázky podľa kódu
        $question = Question::where('code', $question_code)->firstOrFail();
        $question_arch = ArchivedQuestion::where('code', $question_code)->get();

        // Odstránenie otázky
        $question->delete();
        $question_arch->each->delete();

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
            'version' => 1,
        ]);

        // Create responses for input questions
        if ($question->category !== "text") {
            $inputOptions = $request->input('input_options');
            foreach ($inputOptions as $option) {
                Response::create([
                    'question_code' => $question->code, // Assuming 'code' is the question code
                    'value' => $option,
                    'version' => $question->version,
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

        if (!$question->active && $request->input('active')) {
            $question->active = true;
            $question->version = $question->version + 1;
            $question->closed_at = null;
            $question->save();

            $previousResponses = Response::where('question_code', $question->code)
                ->where('version', $question->version - 1)
                ->get();
            if ($question->category === "choice") {
                foreach ($previousResponses as $response) {
                    Response::create([
                        'question_code' => $question->code,
                        'value' => $response->value,
                        'version' => $question->version,
                        'count' => 0  // Reset count to zero for new version
                    ]);
                }
            }
            return redirect('/dashboard')->with('success', 'Question updated successfully');
        }
        // Check if 'active' is set to false
        if ($question->active && !$request->input('active')) {
            $question->active = false; // Set 'active' to false
            $question->closed_at = now(); // Set 'closed_at' to the current timestamp
            $question->save();
            ArchivedQuestion::create([
                'code' => $question->code,
                'title' => $question->title,
                'lesson' => $question->lesson,
                'category' => $question->category,
                'user_id' => $question->user_id,
                'version' => $question->version,  // Ensure version is tracked and incremented as necessary elsewhere
                'closed_at' => $question->closed_at,
                'created_at' => $question->created_at,
                'updated_at' => $question->updated_at
            ]);
            return redirect('/dashboard')->with('success', 'Question updated successfully');
        }

        // Update question
        $old_cat = $question->category;
        $question->update($validatedData);

        // Check if the category has changed from "text" to "choice" or vice versa
        if ($question->category !== "text") {
            $inputOptions = $request->input('input_options');

            // Remove existing responses if category changed from "text" to "choice"
            if ($old_cat === "text") {
                Response::where('question_code', $question->code)->where('version', $question->version)->delete();
                return redirect('/dashboard')->with('success', 'Question updated successfully');
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
                    'version' => $question->version,
                    // Add other necessary fields here
                ]);
            }

            // Now, remove responses from the database that are not present in the input options
            $answersDb->whereNotIn('value', $inputOptions)->whereIn('version', $question->version)->each->delete();
        } elseif ($question->getOriginal('category') !== "text") {
            // Remove existing responses if category changed from "choice" to "text"
            Response::where('question_code', $question->code)->where('version', $question->version)->delete();
        }
        // Redirect back with success message or to a specific route
        return redirect('/dashboard')->with('success', 'Question updated successfully');
    }


    public function export($format)
    {
        if ($format == 'json') {
            if (Auth::user()->isAdmin()) {
                $questions = Question::with('responses')->get();
            } else {
                $questions = Question::with('responses')->where('user_id', Auth::id())->get();
            }

            $questionsWithResponses = $questions->map(function ($question) {
                $responsesGroupedByVersion = $question->responses->groupBy('version')->map(function ($responses, $version) {
                    return [
                        'version' => $version,
                        'responses' => $responses->map(function ($response) {
                            return [
                                'value' => $response->value,
                                'count' => $response->count,
                            ];
                        }),
                    ];
                })->values();

                return [
                    'code' => $question->code,
                    'title' => $question->title,
                    'lesson' => $question->lesson,
                    'created_at' => $question->created_at->format('Y-m-d H:i'),
                    'closed_at' => $question->closed_at,
                    'active' => $question->active,
                    'responses' => $responsesGroupedByVersion,
                ];
            });

            return response()->json($questionsWithResponses);
        }

        return response()->json(['error' => 'Invalid format'], 400);
    }
}
