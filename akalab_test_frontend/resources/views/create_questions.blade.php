@extends('layouts.master')
@section('content')
    <div class="card card-default">
        <div class="card-header">
            Create Question
        </div>

        <div class="card card-body" >

            <form action="{{route('questions.store')}}" method="POST" >
                @csrf
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" name="type" id="type">
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>

                <div class="form-group">
                    <label for="question">Question</label>
                    <input type="text" class="form-control" name="question" id="question">
                </div>

                <div class="form-group">
                    <label for="description">Description <small>(optional)</small></label>
                    <input type="text" class="form-control" name="description" id="description">
                </div>



                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        Add Post
                    </button>
                </div>



            </form>

        </div>


    </div>
@endsection
