<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    // getting list of all services
    public function index(){
        $services = Services::all();
        return view('services',compact('$services'));
    }
    // getting form to create a service
    public function create(){
        return view('services.create');
    }

    // creating a service
    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|string|max:255',
        ]);

        Services::create($request->all());

        return redirect()->route('services.list')
                         ->with('success', 'Service created successfully.');
    }

    // getting service to Edit
    public function edit(Services $service){
        return view('services.edit',compact('service'));
    }
    // updating the service
    public function update(Request $request, Services $service){

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|string|max:255',
            ]);

            $service->update($request->all());
            return redirect()->route('services.list')
            ->with('success', 'Service updated successfully.');
    }
    // deleting a service
    public function destroy(Services $service){
        $service->delete();
        return redirect()->route('services.list')
            ->with('success', 'Service deleted successfully.');
        
    }
}
