<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'image|max:2048',
        ]);
        $imagePath = null;
        if ($request->hasFile('image')) {
            if ($team && $team->image) {
                Storage::disk('public')->delete('team/' . $team->image);
            }

            $imageName = 'team_' . now()->format('YmdHis') . '.jpg';
            // @phpstan-ignore-next-line
            $imagePath = $request->file('image')->storeAs('team', $imageName, 'public');
        } elseif ($team) {
            $imagePath = $team->image;
        }

        $team = Team::updateOrCreate(
            ['id' => $team ? $team->id : null],
            [
                'name' => $request->name,
                'designation' => $request->designation,
                'short_info' => $request->short_info,
                'image' => $imagePath,
            ]
        );
        if ($team->wasRecentlyCreated) {
            $message = 'Team Member created successfully.';
        } else {
            $message = 'Team Member updated successfully.';
        }
        $notification = [
            'message' => $message,
            'alert-type' => 'success',
        ];

        return redirect()->route('team.list')->with($notification);
    }

    // deleting a team member
    public function destroy(Team $team)
    {
        if ($team->image) {
            Storage::disk('public')->delete('team/' . $team->image);
        }
        $team->delete();

        $notification = ['message' => 'Member deleted successfully', 'alert-type' => 'success'];

        return redirect()->route('team.list')
            ->with($notification);
    }
}
