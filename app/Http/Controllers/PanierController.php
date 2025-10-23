<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;

class PanierController extends Controller
{
   function index(){
    $panier = session()->get('panier',[]);
     
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
   public function ajouterAjax(Request $request)
{
    $article = Article::find($request->id);

    if (!$article) {
        return response()->json(['success' => false, 'message' => 'Article introuvable.']);
    }

    // Exemple de panier stocké dans la session
    $cart = session()->get('panier', []);
    
    // Si l'article existe déjà dans le panier
    if (isset($cart[$article->id])) {
        $cart[$article->id]['quantity']++;
    } else {
        $cart[$article->id] = [
            "title" => $article->title,
            "quantity" => 1,
            "price" => $article->price,
            "image" => $article->image
        ];
    }

    session()->put('panier', $cart);

    return response()->json([
        'success' => true,
         'total' => count($cart)
    ]);
}
}
