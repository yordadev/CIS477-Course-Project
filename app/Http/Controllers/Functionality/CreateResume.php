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
            'phd_name'   => 'nullable|string|max:255',
            'attributes' => 'required|array',
            'attributes.*' => 'required|array',
            'attributes.*.name' => 'required|string|max:255'
        ]);

        try {
            $resume = Resume::create([
                'user_id'    => Auth::user()->id,
                'resume_id'  => Resume::generateResumeID(),
                'name'       => $request->name,
                'location'   => $request->location,
                'highschool' => $request->highschool,
                'hs_name'    => $request->hs_name ?? null,
                'undergrad'  => $request->undergrad,
                'ug_name'    => $request->ug_name ?? null,
                'graduate'   => $request->graduate,
                'g_name'     => $request->g_name ?? null,
                'phd'        => $request->phd,
                'phd_name'   => $request->hs_name ?? null,
            ]);

            foreach ($request->all()['attributes'] as $attribute) {
                if (isset($attribute['name'])) {
                    ResumeAttribute::create([
                        'resume_id' => $resume->resume_id,
                        'attribute_id' => ResumeAttribute::generateAttributeID(),
                        'name'         => $attribute['name']
                    ]);
                }
            }

            return redirect()->route('home')->with('success', 'Successfully submitted the resume.');
        } catch (\Exception $e) {
            return redirect()->route('home')->withErrors($e->getMessage());
        }
    }
}
