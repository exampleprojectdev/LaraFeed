<?php

namespace ExampleProject\LaraFeed\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ExampleProject\LaraFeed\Models\Feedbacks;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'screenshot'       => 'nullable|string',
            'page_url'         => 'nullable|url',
            'feedback'         => 'required|string',
        ]);

        Feedbacks::create($data);

        return response()->json(['message' => 'Feedback saved.']);
    }

    public function dashboard()
    {
        $feedbacks = Feedbacks::latest()->get();
        return view('larafeed::larafeed', compact('feedbacks'));
    }
}
