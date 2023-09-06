<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Validators\ProductValidator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all(); //pasiemam visus invoicus is DB
        return view('products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create', [
            'products' => Product::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = (new ProductValidator())->validate($request);

        if ($validator->fails()) {
            return redirect()
                ->route('products-create')
                ->withErrors($validator)
                ->withInput();
        }

        Product::create($request->all());
        return redirect()
            ->route('products-index')
            ->with('msg', ['type' => 'success', 'content' => 'Product was created successfully.']);
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
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()
            ->route('products-index')
            ->with('msg', ['type' => 'success', 'content' => 'Product was updated successfully.']);
    }

    /**
     * Show delete confirmation page.
     */

    public function delete(Product $product)
    {
        return view('products.delete', ['product' => $product]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()
            ->route('products-index')
            ->with('msg', ['type' => 'info', 'content' => 'Product was deleted successfully.']);
    }
}
