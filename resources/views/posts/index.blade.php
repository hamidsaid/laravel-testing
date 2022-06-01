@extends('layouts.app')

@section('contentSection')

 {{-- display data from index method in PostsController to the index page at /posts --}}
  <ul>
   @foreach($posts as $post)
   {{-- route() routes the user to the specified route, 2nd parameter carries the route parameters --}}
       <li><a href="{{ route('posts.show',$post->id) }}">{{ $post->title }}</a></li>
   
  @endforeach
  </ul>

@endsection