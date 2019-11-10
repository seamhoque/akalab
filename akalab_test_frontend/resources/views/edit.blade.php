@extends('layouts.master')
@section('content')
    <div class="card card-default">
        <div class="card-header">
            Update Question
        </div>

        <div class="card card-body" >

            <form action="{{route('questions.update',$response['id'])}}" method="POST" >
                @csrf
                @method("put")
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" name="type" id="type" value="{{$response["type"]}}">
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$response["name"]}}">
                </div>

                <div class="form-group">
                    <label for="question">Question</label>
                    <input type="text" class="form-control" name="question" id="question" value="{{$response["question"]}}">
                </div>

                <div class="form-group">
                    <label for="description">Description <small>(optional)</small></label>
                    <input type="text" class="form-control" name="description" id="description" value="{{$response["description"]}}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        Update Post
                    </button>
                </div>



            </form>

        </div>


    </div>
@endsection
