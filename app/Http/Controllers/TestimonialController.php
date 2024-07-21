<?php

namespace App\Http\Controllers;

use App\Models\Testimonials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    // getting list of all services
    public function index()
    {
        $testimonials = Testimonials::all();

        return view('admin.testimonials.list', compact('testimonials'));
    }

    // getting form to create or Edit a service
    public function CreateOrEdit(?Testimonials $testimonial = null)
    {
        return view('admin.testimonials.form', compact('testimonial'));
    }

    // creating a service and updating a service
    public function save(Request $request, ?Testimonials $testimonial = null)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'qualification' => 'required|string',
            'client_review' => 'required',
            'image' => 'image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            if ($testimonial && $testimonial->image) {
                Storage::disk('public')->delete('testimonials/'.$testimonial->image);
            }

            $imageName = 'testimonial_'.now()->format('YmdHis').'.jpg';
            // @phpstan-ignore-next-line
            $imagePath = $request->file('image')->storeAs('testimonials', $imageName, 'public');
        } elseif ($testimonial) {
            $imagePath = $testimonial->image;
        }

        $testimonial = Testimonials::updateOrCreate(
            ['id' => $testimonial ? $testimonial->id : null],
            [
                'name' => $request->name,
                'qualification' => $request->qualification,
                'client_review' => $request->client_review,
                'image' => $imagePath,
            ]
        );

        if ($testimonial->wasRecentlyCreated) {
            $message = 'Testimonial created successfully.';
        } else {
            $message = 'Testimonial updated successfully.';
        }
        $notification = [
            'message' => $message,
            'alert-type' => 'success',
        ];

        return redirect()->route('testimonials.list')->with($notification);
    }

    // deleting a service
    public function destroy(Testimonials $testimonial)
    {
        if ($testimonial->image) {
            Storage::disk('public')->delete('testimonials/'.$testimonial->image);
        }
        $testimonial->delete();

        $notification = [
            'message' => 'Testimonial deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('testimonials.list')
            ->with($notification);
    }
}
