<?php

namespace App\Http\Controllers;

use App\Models\Testimonials;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    // getting list of all services
    public function index()
    {
        $testimonials = Testimonials::all();

        return view('testimonials.list', compact('testimonials'));
    }

    // getting form to create or Edit a service
    public function CreateOrEdit(?Testimonials $testimonial = null)
    {
        if ($testimonial) {
            return view('testimonials.edit', compact('testimonial'));
        } else {
            return view('testimonials.create');
        }
    }

    // creating a service and updating a service
    public function save(Request $request, ?Testimonials $testimonial = null)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'qualification' => 'required|string',
            'short_info' => 'required|text',
            'image' => 'required|string|max:255',
        ]);

        if ($testimonial) {
            // Update the service
            $testimonial->update(['name' => $request->name]);
            $testimonial->update(['qualification' => $request->qualification]);
            $testimonial->update(['short_info' => $request->short_info]);
            $testimonial->update(['image' => $request->image]);
            $message = 'Testimonial updated successfully.';
        } else {
            // Create a new service
            Testimonials::create($request->all());
            $message = 'Testimonial created successfully.';
        }

        return redirect()->route('testimonials.list')
            ->with('success', $message);
    }

    // deleting a service
    public function destroy(Testimonials $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('testimonials.list')
            ->with('success', 'Testimonial deleted successfully.');
    }
}
