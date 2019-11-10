@extends('layouts.master')
@section('content')


    <div class="card card-default">
        <div class="card-header">
            <h4>Question Details of {{$response["name"]}}</h4>
        </div>

        <div class="card-body">
            <p><b>question name</b></p>
            <p>{{$response["name"]}}</p>

            <p><b>question type</b></p>
            <p>{{$response["type"]}}</p>

            <p><b>question question</b></p>
            <p>{{$response["question"]}}</p>

            <p><b>question description</b></p>
            <p>{{$response["description"]}}</p>

            <a href="{{route('questions.index')}}" class="btn btn-info align-content-lg-center " style="text-align: center">Go back</a>

        </div>
    </div>
@endsection