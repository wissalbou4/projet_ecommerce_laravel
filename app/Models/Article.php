<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\models\Famille;
use \App\models\Marque;
use \App\models\Unite;
use \App\models\DetaileBl;

class Article extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function famille(){
        return $this->belongsTo(Article::class);
    }
    public function marque(){
        return $this->belongsTo(Marque::class);
    }
    public function unite(){
        return $this->belongsTo(Unite::class);
    }

    public function detailbls(){
        return $this->hasMany(DetaileBl::class);
    }

}
