<?php

namespace App\Http\Controllers;

use App\Models\WhyUs;
use Illuminate\Http\Request;


class WhyUsController extends Controller
{
    // getting list of all cards
    public function index()
    {
        $whyUs = WhyUs::all();

        return view('admin.whyus.list', compact('whyUs'));
    }

    // getting form to create or Edit a card
    public function CreateOrEdit(?WhyUs $whyUs = null)
    {
        return view('admin.whyus.form', compact('whyUs'));
    }

    // creating a card and updating a card
    public function save(Request $request, ?WhyUs $whyUs = null)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);



        $whyUs = WhyUs::updateOrCreate(
            ['id' => $whyUs ? $whyUs->id : null],
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        if ($whyUs->wasRecentlyCreated) {
            $message = 'Card created successfully.';
        } else {
            $message = 'Card updated successfully.';
        }
        $notification = [
            'message' => $message,
            'alert-type' => 'success',
        ];

        return redirect()->route('whyUs.list')->with($notification);
    }
    // deleting a card
    public function destroy(WhyUs $whyUs)
    {

        $whyUs->delete();

        $notification = [
            'message' => ' deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('whyUs.list')->with($notification);
    }
}
