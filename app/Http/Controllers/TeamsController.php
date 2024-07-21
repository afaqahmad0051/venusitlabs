<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\alert;

class TeamsController extends Controller
{
    // getting list of all team members
    public function index()
    {
        $team = Team::all();

        return view('admin.team.list', compact('team'));
    }

    // getting form to create or Edit a team member
    public function CreateOrEdit(?Team $team = null)
    {
        return view('admin.team.form', compact('team'));
    }

    // creating a team member and updating a team member
    public function save(Request $request, ?Team $team = null)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'short_info' => 'required',
            'image' => 'required|string|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            if ($team && $team->image) {
                Storage::disk('public')->delete('team/' . $team->image);
            }
            $imageName = 'team_' . now()->format('YmdHis') . '.jpg';
            $imagePath = $request->file('image')->storeAs('team', $imageName, 'public');
        } elseif ($team) {
            $imagePath = $team->image;
        }

        $team = Team::CreateOrEdit(
            ['id' => $team ? $team->id : null],
            [
                'name' => $request->name,
                'designation' => $request->designation,
                'short_info' => $request->short_info,
                'image' => $imagePath
            ]
        );
        $notification = ['message' => 'Member created successfully', 'alert-type' => 'success'];

        return redirect()->route('team.list')->with($notification);
    }

    // deleting a team member
    public function destroy(Team $team)
    {
        $team->delete();

        $notification = ['message' => 'Member deleted successfully', 'alert-type' => 'success'];
        return redirect()->route('admin.team.list')
            ->with($notification);
    }
}
