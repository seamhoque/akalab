<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;




class MailController extends Controller
{
    public function mail()
    {
        $name = app('App\Http\Controllers\AnswersController')->answers_48hr();
        Mail::to('seam.hoque@live.com')->send(new SendMailable($name));

        return 'Email was sent';
    }
}
