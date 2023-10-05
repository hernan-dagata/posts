<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'idCategoria' => 'required|exists:categories,id',
            'descripcion' => 'required|string|min:3|max:255',
        ]);

        $post = Post::create($request->all());
        return response()->json(['message' => 'Post creado exitosamente.', 'data' => $post], 201);
    }

    public function show(Post $post)
    {
        return response()->json($post, 200);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'idCategoria' => 'sometimes|required|exists:categories,id',
            'descripcion' => 'sometimes|required|string|min:3|max:255',
        ]);

        $post->update($request->all());
        return response()->json(['message' => 'Post actualizado exitosamente.', 'data' => $post], 200);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(['message' => 'Post eliminado exitosamente.'], 200);
    }
}
