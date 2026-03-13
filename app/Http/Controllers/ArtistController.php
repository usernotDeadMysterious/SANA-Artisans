<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller
{
    public function index(Request $request)
    {
        $query = Artist::query();

        // Search by name
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by approval
        if ($request->approval) {
            $query->where('approval_status', $request->approval);
        }

        // Filter by gender
        if ($request->gender) {
            $query->where('gender', $request->gender);
        }

        $artists = $query->latest()->paginate(20)->withQueryString();

        return view('artists.index', compact('artists'));
    }

    public function create()
    {
        return view('artists.create');
    }
    public function show(Artist $artist)
    {
        $artist->load('certifications');

        return view('artists.show', compact('artist'));
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
            'contact' => 'required|min:12|max:13',
            'email' => 'required',
            'address' => 'required',
            'trade' => 'required|string',
            'district' => 'required|string',
            'certification_name.*' => 'nullable|string',
            'certification_year.*' => 'nullable|string',
            'current_status' => 'required',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('cv')) {
            $validated['cv_path'] = $request->file('cv')->store('cv', 'public');
        }

        if ($request->hasFile('profile_photo')) {
            $validated['profile_photo_path'] =
                $request->file('profile_photo')->store('profile', 'public');
        }

        $validated['approval_status'] = 'approved';

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

        return redirect()->route('artists.index')
            ->with('success', 'Artist created successfully.');
    }

    public function edit(Artist $artist)
    {
        return view('artists.edit', compact('artist'));
    }

    public function update(Request $request, Artist $artist)
    {
        $validated = $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'qualification' => 'required',
            'specialization' => 'required',
            'experience' => 'required',
            'contact' => 'required|min:12|max:13',
            'email' => 'required',
            'address' => 'required',
            'trade' => 'required|string',
            'district' => 'required|string',
            'certification_name.*' => 'nullable|string',
            'certification_year.*' => 'nullable|string',
            'current_status' => 'required',
            'approval_status' => 'required',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('cv')) {
            if ($artist->cv_path) {
                Storage::disk('public')->delete($artist->cv_path);
            }
            $validated['cv_path'] = $request->file('cv')->store('cv', 'public');
        }

        if ($request->hasFile('profile_photo')) {
            if ($artist->profile_photo_path) {
                Storage::disk('public')->delete($artist->profile_photo_path);
            }
            $validated['profile_photo_path'] =
                $request->file('profile_photo')->store('profile', 'public');
        }

        $artist->update($validated);

        // delete old certifications
        $artist->certifications()->delete();

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

        return redirect()->route('artists.index')
            ->with('success', 'Artist updated successfully.');
    }

    public function destroy(Artist $artist)
    {
        if ($artist->cv_path) {
            Storage::disk('public')->delete($artist->cv_path);
        }

        if ($artist->profile_photo_path) {
            Storage::disk('public')->delete($artist->profile_photo_path);
        }

        $artist->certifications()->delete();

        $artist->delete();

        return back()->with('success', 'Artist deleted.');
    }

    public function approve(Artist $artist)
    {
        $artist->update(['approval_status' => 'approved']);
        return back();
    }

    public function reject(Artist $artist)
    {
        $artist->update(['approval_status' => 'rejected']);
        return back();
    }

    public function downloadCv(Artist $artist)
    {
        return response()->download(
            storage_path('app/public/' . $artist->cv_path)
        );
    }
}
