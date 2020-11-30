<?php

namespace App\Http\Controllers\Functionality;

use App\Models\Resume;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UpdateResume extends Controller
{
    public function process(Request $request)
    {
        $request->validate([
            'resume_id'  => 'required|string|max:255',
            'name'       => 'required|string|max:255',
            'location'   => 'required|string|max:255',
            'highschool' => 'required',
            'hs_name'    => 'nullable|string|max:255',
            'undergrad'  => 'required',
            'ug_name'    => 'nullable|string|max:255',
            'graduate'   => 'required',
            'g_name'     => 'nullable|string|max:255',
            'phd'        => 'required',
            'phd_name'   => 'nullable|string|max:255',
        ]);

        if (!$resume = Resume::where('resume_id', $request->resume_id)->first()) {
            return redirect()->route('home')->withErrors(['Unable to locate the attribute to update.']);
        }

        // little validation quick.
        if (!Auth::user()->id === $resume->user_id) {
            // this attribute belongs to someone else resume.
            return redirect()->route('home')->withErrors(['Unable to locate the attribute to update.']);
        }

        try {
            $resume->name       = $request->name;
            $resume->location   = $request->location;
            $resume->highschool = $request->highschool;
            $resume->hs_name    = $request->hs_name ?? null;
            $resume->undergrad  = $request->undergrad;
            $resume->ug_name    = $request->ug_name ?? null;
            $resume->graduate   = $request->graduate;
            $resume->g_name     = $request->g_name ?? null;
            $resume->phd        = $request->phd;
            $resume->phd_name   = $request->hs_name ?? null;

            $resume->save();

            return redirect()->route('home')->with('success', 'Resume successfully updated.');
        } catch (\Exception $e) {
            return redirect()->route('home')->withErrors([$e->getMessage()]);
        }
    }
}
