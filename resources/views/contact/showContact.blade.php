@extends('layouts.app')
@section('content')


    <div style="margin-top: 10px;float: right;">
        @if(count(\App\contact::all())==0)
        <a href="/contacts/inbox"><button type="button" class="btn btn-primary">Inbox</button></a>
        @endif
        @if($contact->user_id==$user->id)
        <a href="/contacts/{{$contact->id}}/delete" onclick="return confirm ('Are you sure for delete contact?');"><button type="button" class="btn btn-danger">DELETE</button></a>
        <a href="/contacts/{{$contact->id}}/edit"><button type="button" class="btn btn-primary">Edit</button></a>
        <a href="/contacts/{{$contact->id}}/show/{{$user->id}}/inbox"><button type="button" class="btn btn-primary">Inbox</button></a>
        <a href="/contacts/{{$contact->id}}/show/{{$user->id}}/sent"><button type="button" class="btn btn-primary">Sent</button></a>
        <a href="/contacts/{{$contact->id}}/sms/{{$user->id}}"><button type="button" class="btn btn-primary">Send SMS</button></a>
        <a href=""><button type="button" class="btn btn-primary">Send E-Mail</button></a>
    </div>
    <h3 style="color:red;">The details of <small style=" color:blue;">{{$contact->name}}</small></h3>
  <i>
      <ul style="list-style:circle;color: black;margin: 5px;">
          <li>{{$contact->family_name}}</li>
          <li>{{$contact->email}}</li>
          <li>{{$contact->phone_number}}</li>
          <li>{{$contact->description}}</li>
      </ul>
  </i>
    @endif
@stop
@section('navigation')
  <h1>  <a href="/contacts" style="font-size:1cm;color:red;"><button type="button" class="btn btn-success">Contacts</button></a></h1>

    <div style="float:right;">
        <a href="/contacts/create"><button type="button" class="btn btn-primary">+</button></a>
    </div>
    <i>
        <ul style="list-style:disc;color: black;">
            @foreach ($contacts as $contact)
                @if($contact->user_id==$user->id)
                <li><a href="/contacts/{{$contact->id}}/show">{{$contact->name}}-{{$contact->family_name}}</a>
            @endif
                    @endforeach
        </ul>
    </i>
@stop