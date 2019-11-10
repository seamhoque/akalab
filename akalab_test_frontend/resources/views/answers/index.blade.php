@extends('layouts.master')
@section('content')

    <div class="card card-default">
        <div class="card-header">
            <h2>Answer Questions</h2>
        </div>

        <div class="card-body">
            <table class="table table-striped">

                <tbody>
                @foreach($response as $res)
                    <tr>
                        <td>
                            <p><b>{{$res->name}}</b></p>

                        </td>
                        <td>
                            <a href="{{route('answers.show', $res->id)}}" class="btn btn-info ">answer</a>
                            {{-- </td>
                             <td>--}}
                        </td>


                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection