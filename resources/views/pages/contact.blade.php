@extends('layouts.master')

@section('title', $pagetitle)

@section('sidebar')
    @parent

@stop

@section('content')
<h1>Contact Me!</h1>
<p>
	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
</p>
@stop 

@section('footer')
	<script> alert('Contact form scripts'); </script>
@stop