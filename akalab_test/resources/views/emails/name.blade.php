@foreach($name as $nam)
    <p>Question name</p> {{$nam["question_name"]}}
    <p>Question details</p>{{$nam["question_details"]}}
    <p>Answer</p>{{$nam["answer"]}}
    <p>User name</p>{{$nam["user_name"]}}
    <p>User email</p>{{$nam["user_email"]}}

    <br>
@endforeach