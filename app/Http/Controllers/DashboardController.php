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
            'other_status' => Artist::where('current_status', 'other')->count(),

            'recent' => Artist::latest()->take(5)->get(),
        ]);
    }
}