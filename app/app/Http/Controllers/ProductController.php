<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }

    public function countProduct(){
        dd(88888888);
    }

    public function filterProduct(Request $request)
    {
        $items = Product::query()
            ->when($request->has('categories'), function ($query) use ($request) {
                $query->where('category_id', $request->input('categories'));
            })
            ->when($request->has('colors'), function ($query) use ($request) {
                $query->withWhereHas('tags', function ($query) use ($request) {
                    $tags = $request->input('colors');
                    $query->whereIn('taggables.tag_id', $tags);
                });
            })
            ->get();

        return ProductResource::collection($items);
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
        //
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
