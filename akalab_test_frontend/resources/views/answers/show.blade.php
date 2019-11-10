@extends('layouts.master')
@section('content')

    <div class="card card-default">
        <div class="card-header">
            <h4>Question Details of {{$response["name"]}}</h4>
        </div>

        <div class="card-body">

            <form action="{{route('answers.store')}}" method="post">
                @csrf
                <input type="hidden"  name="question_id" value="{{$id}}">

                <div class="form-group">
                    <label for="user_name">Your Name</label>
                    <input type="text" class="form-control" name="user_name" id="user_name">
                </div>

                <div class="form-group">
                    <label for="user_mobile">Your Mobile Number</label>
                    <input type="text" class="form-control" name="user_mobile" id="user_mobile">
                </div>

                <div class="form-group">
                    <label for="user_email">Your Email</label>
                    <input type="text" class="form-control" name="user_email" id="user_email">
                </div>
                <p><b>question name</b></p>
                <p>{{$response["name"]}}</p>

                <p><b>question type</b></p>
                <p>{{$response["type"]}}</p>

                <p><b>question </b></p>
                <p>{{$response["question"]}}</p>

                <p><b>question description</b></p>
                <p>{{$response["description"]}}</p>
                <div class="form-group">
                    <label for="description"><h2>Answer</h2></label>
                    <textarea name="answer" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button class="btn btn-info align-content-lg-center " style="text-align: center" >Submit Answer</button>
            </form>



        </div>
    </div>
@endsection