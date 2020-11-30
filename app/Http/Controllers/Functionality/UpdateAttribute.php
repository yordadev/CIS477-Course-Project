<?php

namespace App\Http\Controllers\Functionality;

use Illuminate\Http\Request;
use App\Models\ResumeAttribute;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UpdateAttribute extends Controller
{
    public function process(Request $request)
    {
        $request->validate([
            'attribute_id' => 'required|string|max:255',
            'value'        => 'required|string|max:255'
        ]);

        if (!$attribute = ResumeAttribute::where('attribute_id', $request->attribute_id)->first()) {
            return redirect()->route('home')->withErrors(['Unable to locate the attribute to update.']);
        }

        // little validation quick.
        if (!Auth::user()->id === $attribute->resume->user_id) {
            // this attribute belongs to someone else resume.
            return redirect()->route('home')->withErrors(['Unable to locate the attribute to update.']);
        }

        try {
            $attribute->name = $request->value;
            $attribute->save();

            return redirect()->route('home')->with('success', 'Resume attribute successfully updated.');
        } catch (\Exception $e) {
            return redirect()->route('home')->withErrors([$e->getMessage()]);
        }
    }
}
