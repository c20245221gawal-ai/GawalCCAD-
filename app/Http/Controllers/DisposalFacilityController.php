<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\DisposalFacility;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DisposalFacilityController extends Controller
{
    public function index()
    {
        $facilities = DisposalFacility::orderBy('id', 'desc')
            ->paginate(10);

        return view('disposal-facilities.index', compact('facilities'));
    }

    public function create()
    {
        return view('disposal-facilities.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'permit_number' => 'required|string|max:100',
            'is_active' => 'required|boolean',
        ]);

        $validated['name'] = trim($validated['name']);
        $validated['permit_number'] = strtoupper(
            trim($validated['permit_number'])
        );

        $validated['is_active'] = $request->boolean('is_active');

        if (DisposalFacility::where(
            'permit_number',
            $validated['permit_number']
        )->exists()) {
            return back()
                ->withErrors([
                    'permit_number' => 'Permit number already exists.'
                ])
                ->withInput();
        }

        DisposalFacility::create($validated);

        return redirect()
            ->route('disposal-facilities.index')
            ->with('success', 'Facility added successfully!');
    }

    public function show(DisposalFacility $disposalFacility)
    {
        return view('disposal-facilities.show', compact('disposalFacility'));
    }

    public function edit(DisposalFacility $disposalFacility)
    {
        return view('disposal-facilities.edit', compact('disposalFacility'));
    }

    public function update(Request $request, DisposalFacility $disposalFacility)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'permit_number' => [
                'required',
                'string',
                'max:100',
                Rule::unique('disposal_facilities', 'permit_number')
                    ->ignore($disposalFacility->id),
            ],
            'is_active' => 'required|boolean',
        ]);

        $validated['name'] = trim($validated['name']);
        $validated['permit_number'] = strtoupper(
            trim($validated['permit_number'])
        );

        $validated['is_active'] = $request->boolean('is_active');

        $disposalFacility->update($validated);

        return redirect()
            ->route('disposal-facilities.index')
            ->with('success', 'Facility updated successfully!');
    }

    public function destroy(DisposalFacility $disposalFacility)
    {
        $disposalFacility->delete();

        return redirect()
            ->route('disposal-facilities.index')
            ->with('success', 'Facility deleted successfully!');
    }
}
