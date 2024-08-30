<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return product::paginate(10);
    }

    public function show($id)
    {

        $product =product::find($id);

        if(is_null($product)) return response()->json('Product not found', 404);

        return $product;
    }

    public function store(Request $request)
    {
        $product = product::create($request->all());

        return $product;
    }

    public function update(Request $request, $id)
    {
        $product = product::find($id);

        $product->update($request->all());
        
        return $product;
    }

    public function destroy($id)
    {
        $product = product::find($id);

        if(is_null($product)) return response()->json('Product not found', 404);

        $product->delete();

        return 204;
    }
}
