<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Commande;

class Article extends Model
{
    protected $fillable = [
        'title',
        'content',
        'price',
        'image',
        'categorie',
    ];

    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'commande_article', 'article_id', 'commande_id')
                    ->withPivot('quantite', 'prix');
    }
}
