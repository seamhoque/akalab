<?php

namespace App\Http\Controllers;

use App\Answers;
use App\Question;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $answer = [
            "question_id"=>$request->question_id,
            "answer"=>$request->answer,
            "user_name"=>$request->user_name,
            "user_email"=>$request->user_email,
            "mobile_number"=>$request->mobile_number

        ];

        /*dd($answer);*/



        Answers::create($answer);

        return response()->json("created",201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function show(Answers $answers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function edit(Answers $answers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answers $answers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answers $answers)
    {
        //
    }

    public function answers_48hr(){
        $answers = Answers::where( 'created_at', '>', Carbon::now()->subDays(2))
            ->get();
        /*$answers["question"]=Answers::find($answers["id"])->question();*/
        foreach ($answers as $answer){
            $answer["question_name"]=Answers::find($answer["id"])->question->name;
            $answer["question_details"]=Answers::find($answer["id"])->question->question;
        }

        /*$answers = Answers::find(2)->question();*/
        /*dd($answers);*/
        return $answers;

    }
}
