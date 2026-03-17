<?php

namespace App\Http\Controllers;

use App\Models\Artist;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [

            'total' => Artist::count(),
            'pending' => Artist::where('approval_status', 'pending')->count(),
            'approved' => Artist::where('approval_status', 'approved')->count(),
            'rejected' => Artist::where('approval_status', 'rejected')->count(),

            'own_business' => Artist::where('current_status', 'own_business')->count(),
            'employee' => Artist::where('current_status', 'employee')->count(),
            'student' => Artist::where('current_status', 'student')->count(),
            'other_status' => Artist::whereIn('current_status', ['other', 'unemployed'])->count(),

            // TRADE COUNTS
            'cooking' => Artist::where('trade', 'Cooking')->count(),
            'tailoring' => Artist::where('trade', 'Tailoring')->count(),
            'beautification' => Artist::where('trade', 'Beautification')->count(),
            'digital_skills' => Artist::where('trade', 'Digital Skills')->count(),

            'recent' => Artist::latest()->take(5)->get(),
        ]);
    }
}