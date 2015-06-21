@extends('layouts.master')

@section('title',$pagetitle)

@section('sidebar')
	@parent
@stop

@section('content')

	<h1>Write a New Article</h1>

	<hr/>

	{!! Form::open(['url'=>'articles']) !!}

		@include('articles.form', ['submitButtonText'=>'Add Articles'])

	{!! Form::close()  !!}

	@include('errors.list')
@stop