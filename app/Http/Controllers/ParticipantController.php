<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
   // get indexes 
   public function index()
    {
        $lastParticipant = Participant::latest()->first();

        if (!$lastParticipant) {
            return view('account', [
                'title' => 'Project',
                'participant' => null,
                'team' => null,
                'registration' => null,
                'category' => null,
                'leader' => null,
                'institution' => null,
                'participants' => null,
            ]);
        }

        // Use map and flatMap for related data
        $team = optional($lastParticipant->team);
        $leader = optional($team->leader);
        $registration = optional($team->registration);
        $category = optional($registration->category);
        $institution = optional($team->institution);

        $participants = $team ? $team->participants : [];

        return view('account', [
            'title' => 'Project',
            'participant' => $lastParticipant,
            'team' => $team,
            'registration' => $registration,
            'category' => $category,
            'leader' => $leader,
            'institution' => $institution,
            'participants' => $participants,
        ]);
    }

// show detail of client
// function show($id) {
//     return view('clientdetail', [
//         "pagetitle" => "Client Detail",
//         "client" => Client::find($id)  
//     ]);
// }

function create(Request $request) {
    $leader_id = $request->query('leader_id');
    $team_id = $request->query('team_id');
    return view('participant.create', [
        "title" => "Create Participant",
        "leader_id" => $leader_id,
        "team_id"=>$team_id
    ]);
}

function store(Request $request)
{
    
    $validated = $request->validate([
       'participant_name' => 'required|string|max:255',
        'participant_dob' => 'required|date',
        'participant_location' => 'required|string|max:255',
        'participant_email' => 'required|email|max:255|unique:participants,participant_email',
        'participant_phone' => 'required|string|max:20',
        'participant_password' => 'nullable|string|min:8',
        //FK FK disini
        'leader_id' => 'required|exists:leaders,id',
        'team_id' => 'required|exists:teams,id'
    ]);

    // Proceed with storing data
    Participant::create($validated);
    return redirect()->route('participant.index')->with('success', 'Participant added successfully.');
}

function edit(Participant $participant) {
    return view('participant.edit', [
        "title" => "Edit Client",
        "participant" => $participant
    ]);
}

function update(Participant $participant, Request $request){
    $validated = $request->validate([
        'participant_name' => 'required|string|max:255',
        'participant_dob' => 'required|date',
        'participant_location' => 'required|string|max:255',
        'participant_email' => 'required|email|max:255|unique:participants,participant_email',
        'participant_phone' => 'required|string|max:20',
        'participant_password' => 'required|string|min:8' 
    ]);

    $participant->update($validated);
    return redirect()->route('participant.index')->with('success', 'Client updated successfully.');
}

// function destroy(Participant $participant){
//     // delete all related projects
//     $participant->projects()->delete();
//     $participant->delete();

//     return redirect()->route('client.index')->with('success', 'Client deleted successfully.');
// }
}