<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;



class ProductController extends Controller
{
    public function __construct() {}

    public function index()
    {

        if (isset($_GET['limit'])) {
            $limit = $_GET['limit'];
        } else {
            $limit = 10;
        }

        if (isset($_GET['search'])) {
            $products = product::where('name', 'like', '%' . $_GET['search'] . '%')
                ->where('description', 'like', '%' . $_GET['search'] . '%')
                ->paginate($limit);
        } else {

            $products = product::paginate($limit);
        }

        for ($i = 0; $i < count($products); $i++) {
            $products[$i]->image = Storage::disk('public')->url($products[$i]->image);
        }

       return response()->json($products, 200);

    }

    public function show($id)
    {

        $product = product::find($id);

        if (is_null($product)) return response()->json('Product not found', 404);

        return response()->json($product, 200);
    }

    public function store(Request $request)
    {

        $user = auth()->user();
        if (!$user->hasRole('admin')) return response()->json('Unauthorized', 422);

        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|max:50',
            'description' => 'required|max:200',
            'price' => 'required|decimal:2',
            'expiration_date' => 'required|date|after:yesterday',
            'id_category' => 'required|exists:categories,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        // $validatedData = $request->validate([

        // ]);

        $products = $request->except(['image']);

        if ($request->hasFile('image')) { //Verificar se existe imagem no request 

            $imagePath = $request->file('image')->store('image', 'public');

            $products['image'] = $imagePath;
        }

        $product = product::create($products);

        return response()->json($product, 201);
    }

    public function update(Request $request, $id)
    {

        
        $user = auth()->user();
        if (!$user->hasRole('admin')) return response()->json('Unauthorized', 422);

        $validator = Validator::make($request->all(), [
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'max:50',
            'description' => 'max:200',
            'price' => 'decimal:2',
            'expiration_date' => 'date|after:yesterday',
            'id_category' => 'exists:categories,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $product = product::find($id);

        if (is_null($product)) return response()->json('Product not found', 404);


        if ($request->hasFile('image')) { //Verificar se existe imagem no request 


            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }


            $imagePath = $request->file('image')->store('image', 'public');

            $product->update([
                'image' => $imagePath
            ]);
        }

        $product->update($request->except(['image']));

        return response()->json( product::find($id), 200);

    }

    public function destroy($id)
    {

        $user = auth()->user();
        if (!$user->hasRole('admin')) return response()->json('Unauthorized', 422);

        $product = product::find($id);

        if (is_null($product)) return response()->json('Product not found', 404);

        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return 204;
    }
}
