<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Commande;

class CommandeController extends Controller
{
    public function create()
    {
        $panier = session()->get('panier', []);
        if (empty($panier)) {
            return redirect()->route('panier')->with('error', 'Votre panier est vide.');
        }
        return view('confirmation', compact('panier'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $panier = session()->get('panier', []);
        if (empty($panier)) {
            return redirect()->route('panier')->with('error', 'Panier vide');
        }

        $total = array_sum(array_map(fn($a) => $a['price'] * $a['quantity'], $panier));

        $commande = Commande::create([
            'user_id' => $user->id,
            'email' => $user->email,
            'telephone' => $user->telephone,
            'adresse' => $request->adresse,
            'total' => $total,
            'mode_paiement' => $request->mode_paiement
        ]);


        foreach ($panier as $id => $article) {
            $commande->articles()->attach($id, [
                'quantite' => $article['quantity'],
                'prix' => $article['price']
            ]);
        }

        session()->forget('panier');

        return redirect()->route('paiement', $commande->id);
    }

    public function paiement($id)
    {
        $commande = Commande::findOrFail($id);
        return view('paiement', compact('commande'));
    }

    public function validerPaiement(Request $request, $id)
    {
        $commande = Commande::findOrFail($id);
        $commande->statut = 'payée';
        $commande->save();
        return redirect()->route('merci', $commande->id);
    }

    public function merci($id)
    {
        $commande = Commande::findOrFail($id);
        return view('merci', compact('commande'));
    }
}
