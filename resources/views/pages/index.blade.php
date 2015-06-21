@extends('layouts.master')

@section('title',$pagetitle)

@section('sidebar')
	@parent
@stop

@section('content')

	<article>
		<h2>{{ $article->title }}</h2>

		<div class="body">{{ $article->body }}</div>
	</article>
@stop