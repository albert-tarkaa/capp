@extends('layouts.app')
@section('content')
<small> <a href="/posts">Posts</a>  > {{$post->title}}</small><hr>
    
    <h1>{{$post->title}}</h1>
    <p><small>Written on {{$post->created_at}} by {{$post->user->name}} </small></p>
<h3>{!!$post->body!!}</h3>
<hr>
@if (!Auth::guest())
    <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
    {!! Form::open(['action' =>['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right']) !!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('DELETE',['class'=>'btn btn-danger'])}}
    {!! Form::close() !!} 
@endif
@endsection