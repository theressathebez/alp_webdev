<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\Registration;
use Illuminate\Support\Facades\Log;


class RegistrationController extends Controller
{
    public function create(Request $request)
    {
        $team_id = $request->query('team_id');
        $lastcompetition = Competition::latest()->first();
        $allCategories = $lastcompetition->categories;

        return view('registration.create', [
            'title' => 'Registration Form',
            'categories' => $allCategories,
            'team_id' => $team_id,
        ]);
    }

    function store(Request $request)
    {
        Log::info('Storing Participant Data:', $request->all());

        $validated = $request->validate([
            'registration_date' =>'required|date',
            //fk fk disini
            'category_id' =>'required|exists:categories,id',
            'team_id' =>'required|exists:teams,id',
        ]);

        // Proceed with storing data
        Registration::create($validated);
        return redirect()->route('home')->with('success', 'Participant added successfully.');
    }
}
