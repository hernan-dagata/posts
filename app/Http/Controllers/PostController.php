<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

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

    public function indexView()
    {
        $posts = Post::with('category')->get();
        $categories = Category::all();
        return view('posts.index', ['posts' => $posts, 'categories' => $categories]);
    }

    public function storeView(Request $request)
    {
        $request->validate([
            'idCategoria' => 'required|integer|exists:categories,id',
            'descripcion' => 'required|string|max:255'  
        ]);
        
        Post::create($request->all());
        return redirect('/posts');
    }

    public function destroyView(Post $post)
    {
        $post->delete();
        return redirect('/posts')->with('success', 'Post eliminado con éxito.');
    }

    public function editView(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function updateView(Request $request, Post $post)
    {
        $request->validate([
            'idCategoria' => 'required|integer|exists:categories,id',
            'descripcion' => 'required|string|max:255'
        ]);
        
        $post->update($request->all());
        return redirect('/posts')->with('success', 'Post actualizado con éxito.');
    }
}

?>