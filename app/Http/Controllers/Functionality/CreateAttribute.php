<?php

namespace App\Http\Controllers\Functionality;

use Illuminate\Http\Request;
use App\Models\ResumeAttribute;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateAttribute extends Controller
{
    public function process(Request $request)
    {
        $request->validate([
            'attribute' => 'required|string|max:255'
        ]);

        if (ResumeAttribute::where([
            'resume_id' => Auth::user()->resume->resume_id,
            'name' => strtolower($request->attribute)
        ])->first()) {
            return redirect()->route('home')->withErrors(['error' => 'Attribute already exists.']);
        }

        try {
            ResumeAttribute::create([
                'resume_id' => Auth::user()->resume->resume_id,
                'attribute_id' => ResumeAttribute::generateAttributeID(),
                'name'         => strtolower($request->attribute)
            ]);
            return redirect()->route('home')->with('success', 'Attribute successfully created.');
        } catch (\Exception $e) {
            return redirect()->route('home')->withErrors($e->getMessage());
        }
    }
}
