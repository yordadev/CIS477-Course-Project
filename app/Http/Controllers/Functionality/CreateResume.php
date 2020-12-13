<?php

namespace App\Http\Controllers\Functionality;

use App\Models\Resume;
use Illuminate\Http\Request;
use App\Models\ResumeAttribute;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateResume extends Controller
{
    public function process(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'location'   => 'required|string|max:255',
            'highschool' => 'required',
            'hs_name'    => 'nullable|string|max:255',
            'undergrad'  => 'required',
            'ug_name'    => 'nullable|string|max:255',
            'graduate'   => 'required',
            'g_name'     => 'nullable|string|max:255',
            'phd'        => 'required',
            'phd_name'   => 'nullable|string|max:255'
        ]);

        try {
            Resume::create([
                'user_id'    => Auth::user()->id,
                'resume_id'  => Resume::generateResumeID(),
                'name'       => $request->name,
                'location'   => $request->location,
                'highschool' => boolval($request->highschool),
                'hs_name'    => $request->hs_name ?? null,
                'undergrad'  => boolval($request->undergrad),
                'ug_name'    => $request->ug_name ?? null,
                'graduate'   => boolval($request->graduate),
                'g_name'     => $request->g_name ?? null,
                'phd'        => boolval($request->phd),
                'phd_name'   => $request->hs_name ?? null,
            ]);

            return redirect()->route('home')->with('success', 'Successfully submitted the resume.');
        } catch (\Exception $e) {
            return redirect()->route('home')->withErrors($e->getMessage());
        }
    }
}
