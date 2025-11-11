<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        return response()->json(Card::paginate(10));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'card_number' => 'required|digits:20|unique:cards,card_number',
            'pin' => 'required|digits:4',
            'activation_date' => 'required|date',
            'expiry_date' => 'required|date',
            'balance' => 'required|numeric|min:0',
        ]);

        $card = Card::create($validated);
        return response()->json($card, 201);
    }

    public function show(Card $card)
    {
        return response()->json($card);
    }

    public function update(Request $request, Card $card)
    {
        $validated = $request->validate([
            'pin' => 'digits:4',
            'activation_date' => 'date',
            'expiry_date' => 'date',
            'balance' => 'numeric|min:0',
        ]);

        $card->update($validated);
        return response()->json($card);
    }

    public function destroy(Card $card)
    {
        $card->delete();
        return response()->json(null, 204);
    }
}