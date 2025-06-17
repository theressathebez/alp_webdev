<?php

namespace App\Http\Controllers;

use App\Models\Leader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaderController extends Controller
{
    public function index()
    {
        $leader = Auth::guard('leader')->user();
        $team = $leader->team;
        $institution = $team->institution;
        $participants = $team->participants;
        $registrations = $team->registrations;
        // $competition = $category->competition;

        // Pass the team data to the view
        return view('account', [
            'title' => 'My Team',
            'leader' => $leader,
            'team' => $team,
            'institution' => $institution,
            'participants' => $participants,
            'registrations' => $registrations
        ]);
    }

    function create(Request $request)
    {
        $team_id = $request->query('team_id');
        return view('leader.create', [
            "title" => "Create Leader",
            "team_id" => $team_id
        ]);
    }

    function store(Request $request)
    {
        $validated = $request->validate([
            'leader_name' => 'required|string|max:255',
            'leader_dob' => 'required|date',
            'leader_location' => 'required|string|max:255',
            'leader_email' => 'required|email|max:255|unique:participants,participant_email',
            'leader_phone' => 'required|string|max:20',
            'leader_password' => 'nullable|string|min:8',
            'team_id' => 'required|exists:teams,id'
        ]);

        // Proceed with storing data
        $leader = Leader::create($validated);
        return redirect()->route('leader.login.get', ['leader_id' => $leader->id, 'team_id' => $leader->team_id])
            ->with('success', 'Leader created successfully. Please add participants.');
    }

    function edit(Leader $leader)
    {
        return view('leader.edit', [
            "title" => "Edit Client",
            "leader" => $leader
        ]);
    }

    function update(Leader $leader, Request $request)
    {
        $validated = $request->validate([
            'leader_name' => 'nullable|string|max:255',
            'leader_dob' => 'nullable|date',
            'leader_location' => 'nullable|string|max:255',
            'leader_email' => 'nullable|email|max:255|unique:participants,participant_email' . $leader->id,
            'leader_phone' => 'nullable|string|max:20',
            'leader_password' => 'nullable|string|min:8'
        ]);

        $leader->update($validated);
        return redirect()->route('leader.index', ['team_id' => $leader->team_id])->with('success', 'Participant added successfully.');
    }

    // function destroy(Participant $participant){
    //     // delete all related projects
    //     $participant->projects()->delete();
    //     $participant->delete();

    //     return redirect()->route('client.index')->with('success', 'Client deleted successfully.');
    // }
}
