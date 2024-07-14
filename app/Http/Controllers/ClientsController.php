<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    // getting list of all clients
    public function index()
    {
        $clients = Client::all();
        return view('clients.list', compact('$clients'));
    }

    // getting form to create or Edit a client 
    public function CreateOrEdit(Client $client = null)
    {
        if ($client) {
            return view('clients.edit', compact('client'));
        } else {
            return view('clients.create');
        }
    }

    // creating a client and updating a client
    public function save(Request $request, Client $client = null)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|string|max:255',
        ]);

        if ($client) {
            // Update the client
            $client->update(['title' => $request->title]);
            $client->update(['image' => $request->image]);
            $message = 'client updated successfully.';
        } else {
            // Create a new client
            Client::create($request->all());
            $message = 'client created successfully.';
        }

        return redirect()->route('clients.list')
            ->with('success', $message);
    }



    // deleting a client
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.list')
            ->with('success', 'client deleted successfully.');
    }
}
