<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|min:3',
        ]);
        $category = Category::create($request->all());
        return response()->json(['message' => 'Categoría creada exitosamente.', 'data' => $category], 201);
    }

    public function show(Category $category)
    {
        return response()->json($category, 200);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nombre' => 'sometimes|required|string|min:3',
        ]);
    
        $category->update($request->all());
    
        return response()->json(['message' => 'Categoría actualizada exitosamente.', 'data' => $category], 200);
    }
    
    public function destroy(Category $category)
    {
        $category->delete();
    
        return response()->json(['message' => 'Categoría eliminada exitosamente.'], 200);
    }
    
}
