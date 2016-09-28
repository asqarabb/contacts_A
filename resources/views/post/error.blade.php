@extends('layouts.app2')
@section('showPost')
<style>
    /*.showPost{*/
        /*background-color: whitesmoke;*/
    /*}*/
    /*.h1{*/
        /*color: blue;font-size: 36px;margin-left: 2cm;margin-right: 2cm;padding: 0;*/
    /*}*/
    /*.p{*/
        /*color: red;*/
        /*font-family: "B Nazanin+ Regular";*/
        /*font-size: 12px;*/
        /*margin-left: 10px;*/
        /*margin-right: 10px;*/
        /*margin-top: 10px;*/
        /*margin-bottom: 10px;*/
    /*}*/
</style>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
<div style=" margin-top: 10px;float: right;">
    <a href="/contacts"><button type="button" class="btn btn-success">BACK</button></a>
</div>
<h1 style="color: blue;font-size: 36px;margin-left: 5cm;margin-right: 5cm;padding: 0;">this contact not register in site.!!!</h1>
<p style="color: red;
        font-family: 'B Nazanin+ Regular';font-size: 20px;
margin-left: 5cm;
margin-right: 5cm;
margin-top: 1cm;
margin-bottom: 1cm;">please first register in site for this contact by this phone </p>
<ul>
    <li>{{$contact->name}}</li>
    <li>{{$contact->family_name}}</li>
    <li>{{$contact->phone_number}}</li>
    <li>{{$contact->email}}</li>
</ul>.
<p style="color: red;
        font-family: 'B Nazanin+ Regular';font-size: 20px;
margin-left: 5cm;
margin-right: 5cm;
margin-top: 1cm;
margin-bottom: 1cm;">
for register by phone number {{$contact->phone_number}}:</p>
<div style="margin-left: 4cm;">
    <a href="/logout"><button type="button" class="btn btn-danger">logout and register</button></a>
</div>
</p>


</div>
</div>
</div>
@stop
