<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{
    // getting list of all services
    public function index()
    {
        $services = Services::all();

        return view('admin.services.list', compact('services'));
    }

    // getting form to create or Edit a service
    public function CreateOrEdit(?Services $service = null)
    {
        return view('admin.services.form', compact('service'));
    }

    // creating a service and updating a service
    public function save(Request $request, ?Services $service = null)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            if ($service && $service->image) {
                Storage::disk('public')->delete('services/'.$service->image);
            }

            $imageName = 'service_'.now()->format('YmdHis').'.jpg';
            // @phpstan-ignore-next-line
            $imagePath = $request->file('image')->storeAs('services', $imageName, 'public');
        } elseif ($service) {
            $imagePath = $service->image;
        }

        $service = Services::updateOrCreate(
            ['id' => $service ? $service->id : null],
            [
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imagePath,
            ]
        );

        $notification = [
            'message' => 'Service created successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('services.list')->with($notification);
    }

    // deleting a service
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
