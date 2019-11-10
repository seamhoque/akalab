@extends('layouts.master')
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('questions.create')}}" class="btn btn-success float-right">
            Add Category
        </a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Questions
        </div>

        <div class="card-body">
            <table class="table table-striped">

                <tbody>
                @foreach($response as $res)
                    <tr>
                        <td>
                            <a href="{{route('questions.show', $res->id)}}">{{$res->name}}</a>

                        </td>
                        <td>
                            <a href="{{route('questions.edit', $res->id)}}" class="btn btn-info ">Edit</a>
                       {{-- </td>
                        <td>--}}
                        </td>
                        <td>
                            <form action="{{route('questions.destroy',$res->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection