<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{

    // To get data
    public function edit(AboutUs $about){
        return view('about.edit', compact('about')); // change return view accordingly
    }

// to post data
    public function update(Request $request,AboutUs $about){

        // validating the fetched form data 
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

    
        $about->update(['title'=>$request->title]);
        $about->update(['description'=>$request->description]);

        return redirect()->route('about.edit', $about->id)->with('success', 'About Us updated successfully');
    }
}
