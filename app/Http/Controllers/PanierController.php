<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;

class PanierController extends Controller
{
   function index(){
    $panier = session()->get('panier');
    return view('panier', compact('panier'));
   }
   function add($id){
    $article=Article::findOrFail($id);
    $panier = session()->get('panier');
        if(isset($panier[$id])){
            $panier[$id]['quantity']++;
        }else{
            $panier[$id] = ['quantity' => 1,
                            'title'=>$article->title,
                             'price'=>$article->price,
                             'image'=>$article->image,
                             ] ;
        }
        session()->put('panier', $panier);
        return redirect()->route('panier')->with('produit ajouter avec succès');
    }
   function delete($id)
   {
    $panier=session()->get('panier',[]);
    if (isset($panier[$id])) {
        if ($panier[$id]['quantity'] > 1) {
            $panier[$id]['quantity']--;
        } else {
            unset($panier[$id]); // Supprimer si quantité = 1
        }

        session()->put('panier', $panier);
    }
    return redirect()->route('panier')->with('produit ajouter avec succès');
    
   }
}
