@extends('layout.app')


@section('content')

    <h1>Edit Post</h1>

    <form method="post" action = "/posts/{{$post->id}}">

        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">
        <input type="text" name="title" value="{{$post->title}}" placeholder="Enter title">
        {{csrf_field()}}
        <input type="submit" name="Update">
    </form>

    <form action="/posts/{{$post->id}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="Delete">

    </form>

@stop