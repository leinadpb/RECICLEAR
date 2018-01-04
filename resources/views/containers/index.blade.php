@extends('layouts.app')

@section('content')

	<div class="container">

		<h2>Contenedores</h2>
		<hr>
		<br>

		<!-- Start containers -->

		<div class="row">
		@foreach($containers as $c)
			@if($c->status == "EMPTY")
			  <div class="col-sm-6 col-md-4">
			    <div class="thumbnail empty">
			      <img src="..." alt="No image">
			      <div class="caption">
			        <h3>{{$c->name}}</h3>
			        <p><span>{{$c->localization}}</span> | <span>{{ $c->status }}</span></p>
			        <p>
			        	<a href="#" class="btn btn-default" role="button">Detalles</a>
			        </p>
			      </div>
			    </div>
			  </div>
			@else
			  <div class="col-sm-6 col-md-4">
			    <div class="thumbnail full">
			      <img src="..." alt="No image">
			      <div class="caption">
			        <h3>{{$c->name}}</h3>
			        <p><span>{{$c->localization}}</span> | <span>{{ $c->status }}</span></p>
			        <p>
			        	<a href="#" class="btn btn-primary" role="button">Colectar</a>
			        	<a href="#" class="btn btn-default" role="button">Detalles</a>
			        </p>
			      </div>
			    </div>
			  </div>
			 @endif
		@endforeach
		</div>

		<!-- End Containers -->

	</div>

@endsection