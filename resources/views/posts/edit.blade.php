@extends('layouts.app')

@section('contentSection')

<h1>Edit Post</h1>

{{-- //action follows the update route --}}
{{-- The form data will be sent to update method in PostsController --}}
<form method="post" action="/posts/{{ $post->id }}">
{{-- create a token for the form --}}
@csrf <!-- {{ csrf_field() }} -->

{{-- THE action route for updating uses onlt PUT/PATCH NOT POST hence we have to
use them, archieved as follows
the underscore signfies _ a super global variable --}}

<input type='hidden' name='_method' value='PUT'>

<input type='text' name="title"  value="{{ $post->title }}">
    <br>
    <br>
    <input type="submit" name="SUBMIT">
</form>
    



{{-- //DELETE FORM --}}
 <form method='post' action='/posts/{{ $post->id }}'>
 {{ csrf_field() }}

 <input type='hidden' name='_method' value='DELETE'>
<br>
 <input type='submit' value='DELETE'>
 </form> 



@endsection

    