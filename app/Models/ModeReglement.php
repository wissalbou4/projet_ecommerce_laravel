<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\models\Reglement;

class ModeReglement extends Model
{
    use HasFactory;
    protected $guarded=["id"];
    public function reglements(){
        return $this->hasMany(Reglement::class);
    }
}
