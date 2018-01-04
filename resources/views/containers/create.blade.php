@extends('layouts.app')

@section('content')

	<div class="container">

		<h2>Crear contenedor</h2>
		<hr>
		<br>

		<form class="form-horizontal" method="POST" action="{{ action('ContainerController@store') }}" enctype="multipart/form-data">
			<div class="form-group">
			    <label for="locale" class="col-sm-2 control-label">Localización</label>
			    <div class="col-sm-10">
			      <input name="localization" type="text" class="form-control" id="locale" placeholder="Localization code">
			    </div>
			 </div>
			 <div class="form-group">
			    <label for="img" class="col-sm-2 control-label">Imagen</label>
			    <div class="col-sm-10">
			      <input name="image" type="file" class="form-control" id="img" placeholder="Imagen">
			    </div>
			 </div>
			 <div class="form-group">
			    <label for="st" class="col-sm-2 control-label">Estado</label>
			    <div class="col-sm-10">
			      <input name="status" type="text" class="form-control" id="st" placeholder="FILL or EMPTY">
			    </div>
			 </div>
			 <div class="form-group">
			    <label for="sr" class="col-sm-2 control-label">Serial</label>
			    <div class="col-sm-10">
			      <input name="name" type="text" class="form-control" id="sr" placeholder="Serial o nombre">
			    </div>
			 </div>
			  
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-default">Crear contenedor</button>
			    </div>
			  </div>
			{!! csrf_field() !!}
		</form>

	</div>

@endsection