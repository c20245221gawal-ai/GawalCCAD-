<?php

namespace App\Http\Controllers;

use App\Models\WasteCategory;
use App\Http\Requests\StoreWasteCategoryRequest;
use App\Http\Requests\UpdateWasteCategoryRequest;

class WasteCategoryController extends Controller
{
    public function index()
    {
        $categories = WasteCategory::latest()->paginate(10);

        return view('waste-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('waste-categories.create');
    }

    public function store(StoreWasteCategoryRequest $request)
    {
        WasteCategory::create($request->validated());

        return redirect()
            ->route('waste-categories.index')
            ->with('success', 'Waste Category created successfully!');
    }

    public function show(WasteCategory $wasteCategory)
    {
        return view('waste-categories.show', compact('wasteCategory'));
    }

    public function edit(WasteCategory $wasteCategory)
    {
        return view('waste-categories.edit', compact('wasteCategory'));
    }

    public function update(
        UpdateWasteCategoryRequest $request,
        WasteCategory $wasteCategory
    )
    {
        $wasteCategory->update($request->validated());

        return redirect()
            ->route('waste-categories.index')
            ->with('success', 'Waste Category updated successfully!');
    }

    public function destroy(WasteCategory $wasteCategory)
    {
        $wasteCategory->delete();

        return redirect()
            ->route('waste-categories.index')
            ->with('success', 'Waste Category deleted successfully!');
    }
}