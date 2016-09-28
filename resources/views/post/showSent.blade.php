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
                        @if($post->creator_post_id==$user->id&&$post->destination_user_id==$contact_u->id)
                            <div class="panel-body">
                            <div class="panel panel-default">
                                <div class="panel-heading">Written by <small style="color: blue;">you {{$user->phone_number}}</small>To <small style="color: deepskyblue;">{{$contact_u->name}} _{{$contact_u->phone_number}}</small></div>
                          @if(!empty($post->picture_name))
                              <img id="01" src="{{asset('Uploads/'.$post->picture_name)}}" alt="ops!!!!!!" width="200" height="200" >
                          @endif
                                <p id="02">{{$post->text}}</p>  <p><sub>{{$post->created_at}}</sub></p>
                                @if(!($post->time_visit==0))
                                    <p id="03"><sub >time visit:{{$post->time_visit}}</sub></p>
                                @endif
                                </div>
                                </div>

                        @endif
            @endforeach
            </div>
        </div>
    </div>
@stop
