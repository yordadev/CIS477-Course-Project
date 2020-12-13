<?php

namespace App\Http\Controllers\Functionality;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CloseJob extends Controller
{
    public function process(Request $request)
    {
        $request->validate([
            'job_id' => 'required|string|max:255'
        ]);

        if (!$job = Job::where(['posted_by' => Auth::user()->id, 'job_id' => $request->job_id])->first()) {
            return redirect()->route('home')->withErrors(['error' => 'Unable to find the job.']);
        }


        try {
            $job->delete();
            return redirect()->route('home')->with('success', 'Successfully closed the job.');
        } catch (\Exception $e) {
            return redirect()->route('home')->withErrors($e->getMessage());
        }
    }
}
