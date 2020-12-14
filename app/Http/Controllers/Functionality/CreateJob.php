<?php

namespace App\Http\Controllers\Functionality;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\JobAttribute;

class CreateJob extends Controller
{
    public function process(Request $request)
    {
        $request->validate([
            'title'             => 'required|string|max:255',
            'location'          => 'required|string|max:255',
            'description'       => 'required|string|max:420',
            'minimum_education' => 'required|string|max:255',
            'attribute'        => 'required|array',
            'attribute.*'      => 'nullable|string|max:255'
        ]);

        if (Job::where([
            'posted_by' => Auth::user()->id,
            'title' => strtolower($request->title),
            'location' => strtolower($request->location)
        ])->first()) {
            return redirect()->route('home')->withErrors(['error' => 'This job has already been posted.']);
        }

        $job_id = Job::generateJobID();

        try {
            Job::create([
                'posted_by' => Auth::user()->id,
                'job_id' => $job_id,
                'title'  => strtolower($request->title),
                'location' => strtolower($request->location),
                'minimum_education' => strtolower($request->minimum_education),
                'description' => $request->description
            ]);

            foreach ($request->attribute as $attribute) {
                if (!is_null($attribute)) {
                    JobAttribute::create([
                        'job_id' => $job_id,
                        'attribute_id' => JobAttribute::generateAttributeID(),
                        'name' => strtolower($attribute)
                    ]);
                }
            }

            return redirect()->route('home')->with('success', 'Successfully created the job in the system.');
        } catch (\Exception $e) {
            return redirect()->route('home')->withErrors($e->getMessage());
        }
    }
}
