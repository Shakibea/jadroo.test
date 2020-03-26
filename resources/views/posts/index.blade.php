@extends('layout.app')


@section('content')


    <ul>

        @foreach($post as $p)

            <img height="100" src="{{$p->path}}" alt="">

            <li><a href="{{route('posts.show', $p->id)}}">{{$p->title}}</a></li>

        @endforeach

            <form action="/posts/create" method="post">
                <input type="hidden" name="_method" value="GET">
                <input type="submit" value="create">
            </form>


    </ul>

@stop