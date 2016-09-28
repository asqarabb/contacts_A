@extends('layouts.app')
@section('navigation')
    <h1>  <a href="/contacts" style="font-size:1cm;color:red;"><button type="button" class="btn btn-success">Contacts</button></a></h1>
    <div style="float:right;">

        <a href="/contacts/create" style="color:red;"><button type="button" class="btn btn-primary">+</button></a>
    </div>
   <ul style="list-style:square ">
       @foreach ($contacts as $contact)
           @if($contact->user_id==$user->id)
           <li><a href="/contacts/{{$contact->id}}/show
           ">{{$contact->name}}-{{$contact->family_name}}</a>
            @endif
       @endforeach
   </ul>
@stop
@section('content')
    <div style="float:right;margin-left: 2cm;">
    <a href="/contacts/inbox"><button type="button" class="btn btn-primary">Inbox</button></a>
    </div>
@stop