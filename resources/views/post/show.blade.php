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
            float:right;
        }
    </style>
    <div style="float:right;margin-bottom: 2cm;margin-left: 2cm; margin-right: 2cm;">

        <a href="/contacts/" style="color:red;"><button type="button" class="btn btn-primary">back and create contact</button></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            @foreach($posts as $post)
                @if($post->time_visit!=0||$post->creator_post_id==$user->id)
                                @if($post->creator_post_id==$user->id)
                                    <div class="panel-body">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Written by <small style="color: blue;">you {{$user->phone_number}} </small>To<small style="color: red;"> {{\App\User::find($post->destination_user_id)->phone_number}}{{\App\User::find($post->destination_user_id)->name}}</small></div>
                                            @if(!empty($post->picture_name))
                                                <img id="01" src="{{asset('Uploads/'.$post->picture_name)}}" alt="ops!!!!!!" width="200" height="200" >
                                            @endif
                                            <p id="02">{{$post->text}}</p>
                                            <p id="02"><sub>{{$post->created_at}}</sub></p>
                                            @if(!($post->time_visit==0))
                                                <p id="03"><sub >time visit:{{$post->time_visit}}</sub></p>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                        @if($post->destination_user_id==$user->id)
                                            <div class="panel-body">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">written by <small style="color: blue;">{{\App\User::find($post->creator_post_id)->phone_number}} {{\App\User::find($post->creator_post_id)->name}} </small>To <small style="color: red;">{{\App\User::find($post->destination_user_id)->phone_number}}{{\App\User::find($post->destination_user_id)->name}}</small></div>
                                                    @if(!empty($post->picture_name))
                                                        <img id="01" src="{{asset('Uploads/'.$post->picture_name)}}" alt="ops!!!!!!" width="200" height="200" >
                                                    @endif
                                                  
                                                    <p id="02">{{$post->text}}</p>
                                                    <p id="02"><sub>{{$post->created_at}}</sub></p>
                                                    @if(!($post->time_visit==0))
                                                        <p id="03"><sub >time visit:{{$post->time_visit}}</sub></p>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                    @elseif($post->time_visit==0)
                        <a href="/contacts/post/{{$post->id}}"><img src="{{asset('message/com.my.mail.png')}}" width="100" height="100" alt="message"></a>
                    @endif
                            @endforeach

    </div>
    </div>
    </div>
@stop

