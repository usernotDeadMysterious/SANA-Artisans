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
            ->paginate(12);

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
            'trade' => 'required|string',
            'district' => 'required|string',
            'certification_name.*' => 'nullable|string',
            'certification_year.*' => 'nullable|string',
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

        $artist = Artist::create($validated);

        if ($request->certification_name) {

            foreach ($request->certification_name as $index => $name) {

                if ($name) {

                    $artist->certifications()->create([
                        'certification_name' => $name,
                        'certification_year' => $request->certification_year[$index] ?? null
                    ]);

                }
            }
        }

        return back()->with(
            'success',
            'Your application has been submitted and is awaiting approval.'
        );
    }
    public function artisans(Request $request)
    {
        $query = Artist::where('approval_status', 'approved');

        // SEARCH BY NAME
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // TRADE FILTER
        if ($request->trade) {
            $query->where('trade', $request->trade);
        }

        // SKILL FILTER
        if ($request->skill) {
            $query->where('specialization', 'like', '%' . $request->skill . '%');
        }

        // GENDER FILTER
        if ($request->gender) {
            $query->where('gender', $request->gender);
        }

        $artists = $query->latest()->paginate(12)->withQueryString();

        // get trades dynamically from database
        $trades = Artist::select('trade')
            ->whereNotNull('trade')
            ->distinct()
            ->pluck('trade');

        return view('frontend.publicartists', compact('artists', 'trades'));
    }
    public function artisanDetail($id)
    {
        $artist = Artist::where('approval_status', 'approved')
            ->with('certifications')
            ->findOrFail($id);

        return view('frontend.artisanprofile', compact('artist'));
    }
}