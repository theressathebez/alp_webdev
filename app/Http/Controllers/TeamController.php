<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    function create(Request $request)
    {

        // Fetch all institutions to pass to the view
        $institutions = Institution::all();
        return view('team.create', [
            "title" => "Create Team",
            "institutions" => $institutions,
        ]);
    }

    public function store(Request $request)
    {
        // Validate the input fields
        $validated = $request->validate([
            'team_name' => 'required|string|max:255',
            'institution_id' => 'required|exists:institutions,id', // Ensure institution_id is provided and valid
        ]);

        try {
            // Store the team
            $team = Team::create($validated);

            // Redirect to the leader creation page with the team_id
            return redirect()->route('leader.create', ['team_id' => $team->id])
                ->with('success', 'Team created successfully. Please add team leader.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
