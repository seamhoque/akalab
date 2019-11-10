<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
use Illuminate\Database\Eloquent\SoftDeletes;


class Answers extends Model
{
    protected $fillable = ['question_id','answer','user_name','user_email','mobile_number','answered_at'];

    public function question(){
        return $this->belongsTo('App\Question');
    }

    use SoftDeletes;
}
