<?php

namespace App\Http\Controllers\Functionality;

use App\Models\Resume;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RemoveResume extends Controller
{
    public function process(Request $request)
    {
        $request->validate([
            'resume_id' => 'required|string|max:255'
        ]);

        if (!$resume = Resume::where('resume_id', $request->resume_id)->first()) {
            return redirect()->route('home')->withErrors(['Unable to locate the resume to remove.']);
        }

        // little validation quick.
        if (Auth::user()->id !== $resume->user_id) {
            // this resume belongs to someone else resume.
            return redirect()->route('home')->withErrors(['Unable to locate the resume to remove.']);
        }

        try {
            $resume->delete();

            return redirect()->route('home')->with('success', 'Successfully removed resume.');
        } catch (\Exception $e) {
            return redirect()->route('home')->withErrors($e->getMessage());
        }
    }
}
