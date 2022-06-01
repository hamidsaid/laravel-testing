@extends('layouts.app')

@section('contentSection')

 {{-- display data from show method in PostsController to the show page at /posts/id --}}
  <ul>
   <h1><a href="{{ route('posts.edit', $post->id) }}">{{ $post->title }}</a></h1>
  </ul>

@endsection