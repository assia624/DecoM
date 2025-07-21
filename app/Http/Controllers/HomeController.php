<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;


class HomeController extends Controller
{
public function home(Request $request) {
    $query = Article::query();

    // 🔍 Filtrer par mot-clé
    if ($request->filled('q')) {
        $query->where('title', 'like', '%' . $request->q . '%')
              ->orWhere('content', 'like', '%' . $request->q . '%');
    }

    // 🔎 Filtrer par catégorie
    if ($request->filled('categorie')) {
        $query->where('categorie', $request->categorie);
    }

    // 🔃 Tri
    switch ($request->sort) {
        case 'price_asc':
            $query->orderBy('price', 'asc');
            break;
        case 'price_desc':
            $query->orderBy('price', 'desc');
            break;
        default:
            $query->latest(); // du plus récent au plus ancien
    }

    $articles = $query->get();

    return view('home', compact('articles'));
}

    public function show($id) {
        $articleD=Article::findOrFail($id);
        return view('details',compact('articleD'));
    }
    public function store(Request $request)
{
   
    $validated = $request->validate([
        'titre' => 'required|string|max:255',
        'contenu' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);

    $article = new Article();
    $article->titre = $validated['titre'];
    $article->contenu = $validated['contenu'];

    if ($request->hasFile('image')) {
        
        $path = $request->file('image')->store('images', 'public');
        $article->image = $path; 
    }

    $article->save();

    return redirect()->route('articles.index')->with('success', 'Article créé avec succès.');
}
}