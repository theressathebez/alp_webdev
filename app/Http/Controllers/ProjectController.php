<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Participant;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function indexCompetition()
    {
        $lastcompetition = Competition::latest()->first();
        $countdown = $lastcompetition->countdown();

        return view('home', [
            'title' => 'Project',
            'competition' => $lastcompetition,
            'countdown_days' => $countdown['days'],
            'countdown_hours' => $countdown['hours'],
            'countdown_minutes' => $countdown['minutes']
        ]);
    }

    public function indexParticipant()
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




    public function showCategory()
    {
        $lastcompetition = Competition::latest()->first();
        $allCategories = $lastcompetition->categories;

        return view('competition', [
            'title' => 'Competition',
            'categories' => $allCategories
        ]);
    }

    public function showResult()
    {
        $lastCompetition = Competition::latest()->first();

        if (!$lastCompetition) {
            return view('result', [
                'title' => 'Result',
                'stages' => [],
                'results' => [],
                'teams' => [],
            ]);
        }

        // Fetch related data
        $categories = $lastCompetition->categories;
        $stages = $categories->flatMap(fn($category) => $category->stages);
        $outputs = $stages->flatMap(fn($stage) => $stage->outputs);
        $results = $outputs->map(fn($output) => $output->result);
        $teams = $outputs->map(fn($output) => $output->registration->team);

        return view('result', [
            'title' => 'Result',
            'stages' => $stages,
            'results' => $results,
            'teams' => $teams,
        ]);
    }



    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:participants',
            'password' => 'required|string|min:6',
            'dob' => 'required|date',
            'location' => 'required|string|max:255',

        ]);

        // Create new participant
        $participant = Participant::create([
            'participant_name' => $validatedData['name'],
            'participant_email' => $validatedData['email'],
            'participant_password' => bcrypt($validatedData['password']),
            'participant_dob' => $validatedData['dob'],
            'participant_location' => $validatedData['location'],

        ]);

        // Redirect or handle login after registration
        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }
}
