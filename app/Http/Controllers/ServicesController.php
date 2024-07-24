<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

    public function index()
    {
        $services = Services::all();

        return view('admin.services.list', compact('services'));
    }


    public function CreateOrEdit(?Services $service = null)
    {
        return view('admin.services.form', compact('service'));
    }


    public function save(Request $request, ?Services $service = null)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);



        $service = Services::updateOrCreate(
            ['id' => $service ? $service->id : null],
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        if ($service->wasRecentlyCreated) {
            $message = 'Service created successfully.';
        } else {
            $message = 'Service updated successfully.';
        }
        $notification = [
            'message' => $message,
            'alert-type' => 'success',
        ];

        return redirect()->route('services.list')->with($notification);
    }


    public function destroy(Services $service)
    {

        $service->delete();

        $notification = [
            'message' => 'Service deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('services.list')->with($notification);
    }
}
