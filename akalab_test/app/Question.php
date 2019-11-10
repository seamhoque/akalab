<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Answers;

class Question extends Model
{
    protected $fillable = ['type','published_at','name','question','description'];

    public function answer(){
        return $this->hasMany('App\Answers');
    }
}
