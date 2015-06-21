@extends('layouts.master')

@section('title', $pagetitle)

@section('sidebar')
    @parent

@stop

@section('content')

	<h1>About</h1>

	@if( count($people))
		<h3>People I Like:</h3>
		<ul>
			@foreach($people as $person)
				<li> {{ $person}} </li>
			@endforeach
		</ul>
	@endif
<p>
	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
</p>
@stop