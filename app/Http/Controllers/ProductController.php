<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {

        $products= product::paginate(10);

        for( $i = 0; $i < count($products); $i++){
            $products[$i]->image = Storage::disk('public')->url($products[$i]->image);
        }

        return $products;


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

        $product = product::find($id); //Buscar Produto por ID


        if(is_null($product)) return response()->json('Product not found', 404);

    
        if ($request->hasFile('image')) { //Verificar se existe imagem no request 

            $validatedData = $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
              
            ]);
            if ($product->image && Storage::disk('public')->exists($product->image)) { 
                Storage::disk('public')->delete($product->image);
            }

            $imagePath = $request->file('image')->store('image', 'public');

            $product->update([
                'image' => $imagePath
            ]);
        
        }

        $product->update($request->all()); 

        return $product;
    }

    public function destroy($id)
    {
        $product = product::find($id);

        if(is_null($product)) return response()->json('Product not found', 404);

        if ($product->image && Storage::disk('public')->exists($product->image)) { 
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return 204;
    }
}
