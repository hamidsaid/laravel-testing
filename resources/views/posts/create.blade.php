@extends('layouts.app')

@section('contentSection')

<h1>Create Post</h1>
<form method="post" action="/posts">
@csrf <!-- {{ csrf_field() }} -->
<input type='text' name="title" ></textarea>
    <br>
    <br>
    <input type="submit" name="submit">
</form>
    

@endsection

    