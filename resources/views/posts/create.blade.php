@extends('layouts.app')

@section('contentSection')

<h1>Create Post</h1>
{{-- <form method="post" action="/posts"> --}}
{!! Form::open(['method'=>'post','action'=>'App\Http\Controllers\PostsController@store']) !!}
@csrf <!-- {{ csrf_field() }} -->

{!! Form::label('title','Title:') !!} 
{!! Form::text('title', null) !!}   
 <br>
<br>
{!! Form::submit('SUBMIT'); !!}    
{{-- </form> --}}

{!! Form::close() !!}    

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@endsection

    