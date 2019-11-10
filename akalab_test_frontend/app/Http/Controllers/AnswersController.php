<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://localhost:8000/api/questions');
        $response = json_decode($request->getBody()->getContents());

        /*dd($response);*/
        return view('answers.index',compact('response'));
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
        /*dd($request);*/

        $answer = [
            "question_id"=>$request->question_id,
            "answer"=>$request->answer,
            "user_name"=>$request->user_name,
            "user_email"=>$request->user_email,
            "mobile_number"=>$request->user_mobile
        ];

        setcookie('user_details',json_encode($answer));

        /*dd($answer);*/
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://localhost:8000/api/answers', [
            'form_params' => $answer
        ]);
        $response = $response->getBody()->getContents();


        session()->flash('success',"Question answered successful");
        return redirect(route('answers.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*dd($id);*/
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://localhost:8000/api/questions/'.$id);
        $response = json_decode($request->getBody()->getContents(),true);

        /*dd($response);*/

        return view ('answers.show',compact('response','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
