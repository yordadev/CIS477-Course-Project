<?php

namespace App\Http\Controllers\Pages;

use App\Models\Job;
use App\Http\Controllers\Controller;
use App\Models\ResumeAttribute;
use Illuminate\Support\Facades\Auth;
use PDO;

class HomeController extends Controller
{
    public function render()
    {
        switch (Auth::user()->permission->accountType()) {
            case ('hiring manager'):

                $jobs = Job::where([
                    'posted_by' => Auth::user()->id
                ])->get();
                // create collection to house the job information
                $jobs_collection = collect([]);

                foreach ($jobs as $job) {
                    //the potiental candidates for the job collection
                    $potientalJobCandidates = collect([]);

                    foreach ($job->attributes as $attributeDesired) {

                        $hits = ResumeAttribute::where('name', $attributeDesired->name)->get();
                        foreach ($hits as $hit) {

                            // check if exists ++ else push new
                            if ($potientalJobCandidates->contains('name', $hit->resume->user->name)) {
                                $potientalJobCandidates->where('name', $hit->resume->user->name)->first()['hits'] = $potientalJobCandidates->where('name', $hit->resume->user->name)->first()['hits'] + 1;
                            } else {
                                $potientalJobCandidates->push([
                                    'name' => $hit->resume->user->name,
                                    'contact' => $hit->resume->user->email,
                                    'hits' => 1,
                                ]);
                            }
                        }
                    }

                    // push collections into collection
                    $jobs_collection->push([
                        'information' => $job,
                        'candidates'  => $potientalJobCandidates->sortBy('hits')
                    ]);
                }

                // prepare data to be returned
                $data = [
                    'jobs' => $jobs_collection,
                ];
                break;
        }

        return view('pages.home.index', [
            'data' => $data ?? []
        ]);
    }
}
