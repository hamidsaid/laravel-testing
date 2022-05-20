@extends('layouts.app')

@section('contentSection')

<h1>This is the passed content</h1>

{{-- people is passed from posts method in PostsController --}}

    @if(count($people))
    <ul>
        @foreach($people as $person)
            <h3><li>{{ $person }}</li></h3>
        @endforeach
    </ul>
    @endif

@endsection