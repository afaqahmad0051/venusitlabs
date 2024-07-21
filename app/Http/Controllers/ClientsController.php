<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientsController extends Controller
{
    // getting list of all clients
    public function index()
    {
        $clients = Client::all();

        return view('admin.clients.list', compact('clients'));
    }

    // getting form to create or Edit a client
    public function CreateOrEdit(?Client $client = null)
    {
        return view('admin.clients.form', compact('client'));
    }

    // creating a client and updating a client
    public function save(Request $request, ?Client $client = null)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            if ($client && $client->image) {
                Storage::disk('public')->delete('clients/'.$client->image);
            }

            $imageName = 'client_'.now()->format('YmdHis').'.jpg';
            // @phpstan-ignore-next-line
            $imagePath = $request->file('image')->storeAs('clients', $imageName, 'public');
        } elseif ($client) {
            $imagePath = $client->image;
        }

        $client = Client::updateOrCreate(
            ['id' => $client ? $client->id : null],
            [
                'name' => $request->name,
                'image' => $imagePath,
            ]
        );
        if ($client->wasRecentlyCreated) {
            $message = 'Client created successfully.';
        } else {
            $message = 'Client updated successfully.';
        }
        $notification = [
            'message' => $message,
            'alert-type' => 'success',
        ];

        return redirect()->route('clients.list')->with($notification);
    }

    // deleting a client
    public function destroy(Client $client)
    {
        if ($client->image) {
            Storage::disk('public')->delete('clients/'.$client->image);
        }
        $client->delete();

        return redirect()->route('clients.list')
            ->with('success', 'client deleted successfully.');
    }
}
