<?php

namespace App\Http\Controllers;

use App\Models\EducationalArticle;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EducationalArticleController extends Controller
{
    public function index()
    {
        $articles = EducationalArticle::latest()->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required'
        ]);
        
        $validated['slug'] = Str::slug($validated['title']);
        EducationalArticle::create($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel edukasi berhasil ditambahkan.');
    }

    public function destroy(EducationalArticle $article)
    {
        $article->delete();
        return back()->with('success', 'Artikel berhasil dihapus.');
    }
}
