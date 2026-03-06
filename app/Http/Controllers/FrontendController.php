<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return redirect('/artists');
    }

    public function artists()
    {
        $artists = Artist::where('approval_status', 'approved')
            ->latest()
            ->paginate(9);

        return view('frontend.artists', compact('artists'));
    }

    public function apply()
    {
        return view('frontend.apply');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
            'gender' => 'required',
            'qualification' => 'required',
            'specialization' => 'required',
            'experience' => 'required',
            'contact' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'certification' => 'nullable|array',
            'current_status' => 'required',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('cv')) {
            $validated['cv_path'] = $request->file('cv')->store('cv', 'public');
        }

        if ($request->hasFile('profile_photo')) {
            $validated['profile_photo_path'] = $request->file('profile_photo')->store('profile', 'public');
        }
        $validated['approval_status'] = 'pending';

        Artist::create($validated);

        return back()->with(
            'success',
            'Your application has been submitted and is awaiting approval.'
        );
    }
    public function artisans(Request $request)
    {
        $query = Artist::where('approval_status', 'approved');

        // SEARCH
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('specialization', 'like', '%' . $request->search . '%');
            });
        }

        // GENDER
        if ($request->gender) {
            $query->where('gender', $request->gender);
        }

        // CATEGORY
        if ($request->category) {
            $query->where('specialization', 'like', '%' . $request->category . '%');
        }

        $artists = $query->latest()->paginate(9)->withQueryString();

        $categories = Artist::where('approval_status', 'approved')
            ->select('specialization')
            ->distinct()
            ->pluck('specialization');

        return view('frontend.publicartists', compact('artists', 'categories'));
    }
    public function artisanDetail($id)
    {
        $artist = Artist::where('approval_status', 'approved')->findOrFail($id);

        return view('frontend.artisanprofile', compact('artist'));
    }
}