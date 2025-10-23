<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = [
        'user_id',
        'email',
        'telephone',
        'adresse',
        'total',
        'mode_paiement',
        'statut'
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'commande_article')
                    ->withPivot('quantite', 'prix');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
