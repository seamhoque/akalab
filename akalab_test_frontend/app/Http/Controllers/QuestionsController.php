<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionsController extends Controller
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

        /*dd($res);*/

        return view('index',compact('response'));
      /*  dd("inside");*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_questions');
    }


    public function store(Request $request)
    {
        /*dd($request);*/
        $question = [
            "type"=>$request->type,
            "name"=>$request->name,
            "question"=>$request->question,
            "description"=>$request->description
        ];
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://localhost:8000/api/questions', [
            'form_params' => $question
        ]);
        /*$response = $response->getBody()->getContents();*/


        if($response->getStatusCode() == 201){
            session()->flash('success',"Question created successful");
            return redirect(route('questions.create'));
        }
    }


    public function show($id)
    {


        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://localhost:8000/api/questions/'.$id);
        $response = json_decode($request->getBody()->getContents(),true);

        /*dd($response);*/

        return view ('show',compact('response'));
    }

    /**
     * Show the form for editing the specified resource.
     *     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://localhost:8000/api/questions/'.$id);
        $response = json_decode($request->getBody()->getContents(),true);

        /*dd($response);*/

        return view ('edit',compact('response'));
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
        $question = [
            "id" =>$id,
            "type"=>$request->type,
            "name"=>$request->name,
            "question"=>$request->question,
            "description"=>$request->description
        ];

        /*dd($question);*/
        $client = new \GuzzleHttp\Client();
        $response = $client->request('PUT', 'http://localhost:8000/api/questions/'.$id, [
            'form_params' => $question
        ]);

        if($response->getStatusCode() == 201){
            session()->flash('success',"Question updated successful");
            return redirect(route('questions.index'));
        }


        /*dd($response);*/
        /*$response = $response->getBody()->getContents();*/

        /*if($response->getStatusCode() == 201){
            session()->flash('success',"Question created successful");
            return redirect(route('questions.create'));
        }*/
    }



    public function destroy($id)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('DELETE', 'http://localhost:8000/api/questions/'.$id);

        if($response->getStatusCode() == 200){
            session()->flash('success',"Question deleted successfully");
            return redirect(route('questions.index'));
        }
    }
}
