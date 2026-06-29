<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;


class ProductController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $products = Product::query()
            ->with('category')
            ->search(request('search'))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()  {
        $categories = Category::query()
            ->orderBy('name', 'asc')
            ->get();

        return view('products.create', [
            'product' => new Product(),
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)  {
        $product = new Product($request->validated());
        $product->save();

        return redirect()
            ->route("products.index")
            ->with("success", "Product created succesfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product) {
        $categories = Category::query()
            ->orderBy('name', 'asc')
            ->get();

        return view('products.edit', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product) {
        $product->fill($request->validated());
        $product->save();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product moved to trash.');
    }

     public function trash() {
        $products = Product::query() 
            ->onlyTrashed()
            ->search(request('search'))
            ->with('category')
            ->latest('deleted_at')
            ->paginate(10)
            ->withQueryString();

        return view(
            'products.trash',
            compact('products')
        );
    }

    public function restore(Product $product) {
        $product->restore();

        return redirect()
            ->route('products.trash')
            ->with('success', 'Product restored.');
    }

    public function lowStock () {
        $products = Product::query()
            ->with('category')
            ->lowStock()
            ->latest()
            ->paginate(10);

        return view(
            'products.low-stock', 
            compact('products')
        );
    }
}
