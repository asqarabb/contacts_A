@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div style="float:right;">
                    <a href="/contacts/{{$contact->id}}/show"><button type="button" class="btn btn-primary">Back to detail of {{$contact->name}}</button></a>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/contacts/{{$contact->id}}/sms" enctype="multipart/form-data">

                        {!! csrf_field()  !!}
                        <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Text</label>
                            <div class="col-md-6">
                                    <textarea id="text" type="text" col="30" row="30" class="form-control" name="text">
                                        {{ old('text') }} </textarea>
                                @if ($errors->has('text'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('picture_name') ? ' has-error' : '' }}">
                            <label for="picture_name" class="col-md-4 control-label">Picture</label>

                            <div class="col-md-6">
                                <input id="picture_name" type="file" class="form-control" name="picture_name" value="{{ old('picture_name') }}">

                                @if ($errors->has('picture_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('picture_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-send">Send Post</i>
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
@stop
