<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\models\Commande;
use \App\models\Article;

class DetaileBl extends Model
{
    use HasFactory;
    public function commande(){
        return $this->belongsTo(Commande::class);
    }
    public function article(){
        return $this->belongsTo(Article::class);
    }
}
