<?php

namespace App\Http\Controllers;

use App\Models\DisposalManifest;
use App\Models\DisposalFacility;
use App\Models\WasteCategory;

class DashboardController extends Controller
{
    public function index()
    {
        $totalManifests = DisposalManifest::count();

        $totalFacilities = DisposalFacility::count();

        $totalCategories = WasteCategory::count();

        $recentManifests = DisposalManifest::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalManifests',
            'totalFacilities',
            'totalCategories',
            'recentManifests'
        ));
    }
}