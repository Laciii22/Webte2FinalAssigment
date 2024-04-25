<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function store(Request $request)
    {
        // Validácia žiadosti
        $validatedData = $request->validate([
            'selected_value' => 'required|string',
            'question_code' => 'required|string',
            // pridajte ďalšie validácie podľa potreby
        ]);

        // Vytvorenie novej odpovede
        $response = Response::create($validatedData);

        // Voliteľne môžete presmerovať používateľa alebo vrátiť odpoveď v JSON formáte
        return response()->json(['message' => 'Response created successfully', 'response' => $response], 201);
    }

    public function show($id)
    {
        // Získanie konkrétnej odpovede podľa ID
        $response = Response::findOrFail($id);

        // Vrátiť odpoveď v JSON formáte
        return response()->json($response);
    }

    public function update(Request $request, $id)
    {
        // Validácia žiadosti
        $validatedData = $request->validate([
            'selected_value' => 'required|string',
            'question_code' => 'required|string',
            // pridajte ďalšie validácie podľa potreby
        ]);

        // Nájdenie a aktualizácia odpovede podľa ID
        $response = Response::findOrFail($id);
        $response->update($validatedData);

        // Voliteľne môžete presmerovať používateľa alebo vrátiť aktualizovanú odpoveď v JSON formáte
        return response()->json(['message' => 'Response updated successfully', 'response' => $response]);
    }

    public function destroy($id)
    {
        // Nájdenie a odstránenie odpovede podľa ID
        $response = Response::findOrFail($id);
        $response->delete();

        // Voliteľne môžete presmerovať používateľa alebo vrátiť potvrdenie v JSON formáte
        return response()->json(['message' => 'Response deleted successfully']);
    }
}
