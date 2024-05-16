<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    public function filterProduct(Request $request)
    {
        return ProductResource::collection($this->filterCountAndProducts($request));
    }

    public function countProduct(Request $request)
    {
        return response(['count' => $this->filterCountAndProducts($request)->count() ?? null]);
    }

    private function filterCountAndProducts(Request $request)
    {
        return Product::with('category', 'tags')
            ->searchCategoryTags($request)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.detail', [
            'product' => $product->id,
        ]);
    }

    public function getProductId(Request $request)
    {
        return response(['data' => Product::with('discount')->find($request->input('product'))]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
