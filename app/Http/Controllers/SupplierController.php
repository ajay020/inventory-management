<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::query()
                    ->search(request('search'))
                    ->latest()
                    ->paginate(10)
                    ->withQueryString();

        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view(
            'suppliers.create',
            [
                'supplier' => new Supplier()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request)
    {
        $supplier = new Supplier($request->validated());
        $supplier->save();

        return redirect()
            ->route('suppliers.index')
            ->with('success', 'Supplier created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view(
            'suppliers.edit', [
            'supplier' => $supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $supplier->fill($request->validated());
        $supplier->save();

        return redirect()
            ->route('suppliers.index')
            ->with('success', 'Supplier updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()
            ->route('suppliers.index')
            ->with('success', 'Supplier moved to trash.');
    }

    /**
     * Display a list of trashed suppliers
     */

    public function trash () {
        $suppliers = Supplier:: onlyTrashed()
                    ->search(request('search'))
                    ->latest()
                    ->paginate(10)
                    ->withQueryString()
                    ;

        return view(
            'suppliers.trash', 
            compact('suppliers')
        );
    }

    public function restore (Supplier $supplier) {
        $supplier->restore();

        return redirect()
            ->route('suppliers.trash')
            ->with('success', 'Supplier restored successfully.');
    }
}
