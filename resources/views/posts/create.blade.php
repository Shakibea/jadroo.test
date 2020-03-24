@extends('layout.app')


@section('content')

    <h1>Create Post</h1>

    {{--<form method="post" action = "/posts">--}}
    {!! Form::open(['method'=>'POST', 'action'=>'PostsController@store']) !!}
        {{--<input type="text" name="title" placeholder="Enter title">--}}
        {{--{{csrf_field()}}--}}
        {{--<input type="submit" name="submit">--}}
        <div class="form-group">
            {!! Form::label('title', 'Title: ') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}

            {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}
    {{--</form>--}}

@stop