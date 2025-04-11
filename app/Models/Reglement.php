<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\models\Client;
use \App\models\ModeReglement;

class Reglement extends Model
{
    use HasFactory;
    protected $guarded=["id"];
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function modeReglement()
{
    return $this->belongsTo(ModeReglement::class);
}

}
