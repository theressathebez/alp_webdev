<?php

namespace App\Http\Controllers;

use App\Models\Leader;
use Illuminate\Http\Request;

class LeaderController extends Controller
{
    
function create(Request $request) {
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
    return redirect()->route('participant.create', ['leader_id' => $leader->id])
    ->with('success', 'Leader created successfully. Please add participants.');
}

function edit(Leader $leader) {
    return view('participant.edit', [
        "title" => "Edit Client",
        "participant" => $leader
    ]);
}

// function update(Participant $participant, Request $request){
//     $validated = $request->validate([
//         'participant_name' => 'required|string|max:255',
//         'participant_dob' => 'required|date',
//         'participant_location' => 'required|string|max:255',
//         'participant_email' => 'required|email|max:255|unique:participants,participant_email',
//         'participant_phone' => 'required|string|max:20',
//         'participant_password' => 'required|string|min:8' 
//     ]);

//     $participant->update($validated);
//     return redirect()->route('participant.index')->with('success', 'Client updated successfully.');
// }

// function destroy(Participant $participant){
//     // delete all related projects
//     $participant->projects()->delete();
//     $participant->delete();

//     return redirect()->route('client.index')->with('success', 'Client deleted successfully.');
// }
}
