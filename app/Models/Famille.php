<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\models\Article;
class Famille extends Model
{
    use HasFactory;
    protected $guarded=["id"];
    public function articles(){
        return $this->hasMany(Article::class);
    }
}
