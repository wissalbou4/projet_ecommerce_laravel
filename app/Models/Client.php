<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\models\Reglement;
use \App\models\Commande;

class Client extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function reglements(){
        return $this->hasMany(Reglement::class);
    }
    public function commandes(){
        return $this->hasMany(Commande::class);
    }
}
