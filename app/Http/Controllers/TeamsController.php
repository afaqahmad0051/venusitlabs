<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    // getting list of all team members
    public function index()
    {
        $team = Team::all();

        return view('team.list', compact('team'));
    }

    // getting form to create or Edit a team member
    public function CreateOrEdit(?Team $team = null)
    {
        if ($team) {
            return view('team.edit', compact('team'));
        } else {
            return view('team.create');
        }
    }

    // creating a team member and updating a team member
    public function save(Request $request, ?Team $team = null)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string',
            'short_info' => 'required|string',
            'image' => 'required|string|max:255',
        ]);

        if ($team) {
            // Update the team
            $team->update(['name' => $request->name]);
            $team->update(['designation' => $request->designation]);
            $team->update(['short_info' => $request->short_info]);
            $team->update(['image' => $request->image]);
            $message = 'member updated successfully.';
        } else {
            // Create a new team
            Team::create($request->all());
            $message = 'member created successfully.';
        }

        return redirect()->route('team.list')
            ->with('success', $message);
    }

    // deleting a team member
    public function destroy(Team $team)
    {
        $team->delete();

        return redirect()->route('team.list')
            ->with('success', 'member deleted successfully.');
    }
}
