<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('limit')) {
            $limit = $request->limit;
        } else {
            $limit = 10;
        }

        if ($request->has('search')) {
            $categories = category::where('description', 'like', '%' . $request->search . '%')
                ->paginate($limit);
        } else {
            $categories = category::paginate($limit);
        }

        return is_null($categories) ? response()->json('Category not found', 404) : response()->json($categories, 200);
    }

    public function show($id)
    {
        $category = category::find($id);

        return is_null($category) ? response()->json('Category not found', 404) : response()->json($category, 200);
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        if (!$user->hasRole('admin')) return response()->json('Unauthorized', 422);

        $validator = Validator::make($request->all(), [
            'description' => 'required|max:50|unique:categories',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $category = category::create($request->all());

        return response()->json($category, 201);
    }

    public function update(Request $request, $id)
    {
        $user = auth()->user();
        if (!$user->hasRole('admin')) return response()->json('Unauthorized', 422);

        $validator = Validator::make($request->all(), [
            'description' => 'max:50|unique:categories,description,'.$id,
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $category = category::find($id);

        if (is_null($category)) return response()->json('Category not found', 404);

        $category->update($request->all());

        return response()->json(category::find($id), 200);
    }

    public function destroy($id)
    {
        $user = auth()->user();
        if (!$user->hasRole('admin')) return response()->json('Unauthorized', 422);

        $category = category::find($id);

        if (is_null($category)) return response()->json('Category not found', 404);

        $category->delete();

        return response()->json('Category deleted', 200);
    }
}
