@extends('layouts.app1')
@section('content')
    <style>
        .img #01{
            float: right;
        }
        .p #02{
            color:black;
        }
        .p #03{
            color:black;
            float:left;
        }
    </style>
        <div style="margin-top: 10px;float:right;margin-left: 3cm;margin-bottom: 1cm;">
            <a href="/contacts/{{$contact->id}}/sms/{{$user->id}}"><button type="button" class="btn btn-primary">Send SMS</button></a>
        </div>

        <div style="margin-top: 10px;float: left;margin-left: 3cm;margin-bottom: 1cm;">
            <a href="/contacts/{{$contact->id}}/show"><button type="button" class="btn btn-primary">back</button></a>
        </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            @foreach($posts as $post)
                        @if($post->time_visit!=0)
                        @if($post->creator_post_id==$contact_u->id&&$post->destination_user_id==$user->id)
                            <div class="panel-body">
                                <div class="panel panel-default">
                                    <div class="panel-heading">written by <small style="color: blue;">{{$contact_u->name}} {{$contact_u->phone_number}}b</small> To <small style="color: deepskyblue;">you_{{$user->phone_number}}</small></div>
                                    @if(!empty($post->picture_name))
                                        <img id="01" src="{{asset('Uploads/'.$post->picture_name)}}" alt="ops!!!!!!" width="200" height="200" >
                                    @endif
                                    <p id="02">{{$post->text}}</p>
                                    <p id="02"><sub>{{$post->created_at}}</sub></p>
                                        <p id="03"><sub >time visit:{{$post->time_visit}}</sub></p>
                                </div>
                            </div>
                        @endif
                            @elseif($post->time_visit==0&& $post->destination_user_id==$user->id)
                                <a href="/contacts/{{$contact->id}}/editPost/{{$user->id}}/{{$post->id}}"><img src="{{asset('message/com.my.mail.png')}}" width="100" height="100" alt="message"></a>
                            @endif

            @endforeach
            </div>
        </div>
    </div>
@stop
