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
    
    // getting form to create or Edit a service 
    public function CreateOrEdit(Services $service=null){
        if ($service) {
            return view('services.edit',compact('service'));
        }
        else {
            return view('services.create');
        }
    }

    // creating a service and updating a service
    public function save(Request $request, Services $service = null)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|string|max:255',
        ]);

        if ($service) {
            // Update the service
            $service->update(['title'=>$request->title]);
            $service->update(['description'=>$request->description]);
            $service->update(['image'=>$request->image]);
            $message = 'Service updated successfully.';
        } else {
            // Create a new service
            Services::create($request->all());
            $message = 'Service created successfully.';
        }

        return redirect()->route('services.list')
                         ->with('success', $message);
    }



    // deleting a service
    public function destroy(Services $service){
        $service->delete();
        return redirect()->route('services.list')
            ->with('success', 'Service deleted successfully.');
        
    }
}
