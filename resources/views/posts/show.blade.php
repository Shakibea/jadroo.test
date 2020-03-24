@extends('layout.app')


@section('content')


    <ul>

        <h1><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></h1>

    </ul>

    <p>{{$post->content}}</p>


@stop