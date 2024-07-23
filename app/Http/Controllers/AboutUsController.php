<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{

    // To get data
    public function edit()
    {
        $about = AboutUs::first();
        return view('admin.about.form', compact('about')); // change return view accordingly
    }

    // to post data
    public function save(Request $request, $id)
    {

        // validating the fetched form data 
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $about = AboutUs::findOrFail($id);

        $about->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        $notification = [
            'message' => 'About Us updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('about.edit')->with($notification);
    }
}
