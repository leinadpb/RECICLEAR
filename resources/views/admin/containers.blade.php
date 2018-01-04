@extends('layouts.app')

@section('content')

	<div class="container">

		<h2>Contenedores</h2>
		<hr>
		<br>

		<!-- Start containers -->

		@foreach($containers as $c)
			<div>$c->name</div>
		@endforeach

		<!-- End Containers -->

	</div>

@endsection