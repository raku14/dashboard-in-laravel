@extends('app')

@section('content')
	<h1>About</h1>
	
	@if(count($people))

		<h3>People i like:</h3>
		<ul>
			@foreach($people as $person)

				<li>{{ $person }}</li>

			@endforeach

		</ul>

	@endif
@stop

@section('footer')
	<h2>Footer</h2>
@stop