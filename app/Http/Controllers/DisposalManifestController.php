<?php

namespace App\Http\Controllers;

use App\Models\DisposalManifest;
use App\Models\DisposalFacility;
use App\Models\Generator;
use App\Models\Transporter;
use App\Models\WasteCategory;
use App\Http\Requests\StoreDisposalManifestRequest;
use App\Http\Requests\UpdateDisposalManifestRequest;

class DisposalManifestController extends Controller
{
    public function index()
    {
        $manifests = DisposalManifest::latest()->paginate(10);

        return view('disposal-manifests.index', compact('manifests'));
    }

    public function create()
    {
        $generators = Generator::all();
        $categories = WasteCategory::all();
        $transporters = Transporter::all();
        $facilities = DisposalFacility::where('is_active', true)->get();

        return view('disposal-manifests.create', compact(
            'generators',
            'categories',
            'transporters',
            'facilities'
        ));
    }

    public function store(StoreDisposalManifestRequest $request)
    {
        $validated = $request->validated();
        $category = WasteCategory::findOrFail($validated['waste_category_id']);
        $validated['processing_fee'] = $category->fee_per_kg * $validated['weight_kg'];

        DisposalManifest::create($validated);

        return redirect()
            ->route('disposal-manifests.index')
            ->with('success', 'Disposal Manifest created successfully!');
    }

    public function show(DisposalManifest $disposalManifest)
    {
        return view('disposal-manifests.show', compact('disposalManifest'));
    }

    public function edit(DisposalManifest $disposalManifest)
    {
        $generators = Generator::all();
        $categories = WasteCategory::all();
        $transporters = Transporter::all();
        $facilities = DisposalFacility::where('is_active', true)->get();

        return view('disposal-manifests.edit', compact(
            'disposalManifest',
            'generators',
            'categories',
            'transporters',
            'facilities'
        ));
    }

    public function update(
        UpdateDisposalManifestRequest $request,
        DisposalManifest $disposalManifest
    )
    {
        $validated = $request->validated();
        $category = WasteCategory::findOrFail($validated['waste_category_id']);
        $validated['processing_fee'] = $category->fee_per_kg * $validated['weight_kg'];

        $disposalManifest->update($validated);

        return redirect()
            ->route('disposal-manifests.index')
            ->with('success', 'Disposal Manifest updated successfully!');
    }

    public function destroy(DisposalManifest $disposalManifest)
    {
        $disposalManifest->delete();

        return redirect()
            ->route('disposal-manifests.index')
            ->with('success', 'Disposal Manifest deleted successfully!');
    }
}