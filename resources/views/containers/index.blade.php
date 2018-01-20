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

				@if($c->amount >= 50.00 && $c->amount < 100)
					<!-- Yellow Background -->
					<div class="col-sm-6 col-md-4">
					    <div class="thumbnail greaterMiddle">
					      <img src="..." alt="No image">
					      <div class="caption">
					        <h3>{{$c->name}}</h3>
					        <p><span>{{$c->localization}}</span> | <span>{{ $c->status }}</span></p>
					        <p>
					        	<a href="#" class="btn btn-default" role="button" data-toggle="modal" data-target="#details_{{$c->name}}">Detalles</a>
					        </p>
					      </div>
					  		<hr>
							<div class="row">
					      		<div class="col-sm-6">
					      			<form class="form-horizontal" method="POST" action="{{ route('full') }}" enctype="multipart/form-data">
							      		<input type="hidden" name="container_id" value="{{ $c->id }}">
							  			<button type="submit" class="btn btn-primary btn-sm" role="button">Set FULL</button>
							  			{!! csrf_field() !!}
									</form>
					      		</div>
					      		<div class="col-sm-6">
					      			<form class="form-horizontal" method="POST" action="{{ route('change_amount') }}" enctype="multipart/form-data">
							      		<input type="hidden" name="container_id" value="{{ $c->id }}">
							      		 <div class="form-group">
										    <div class="col-sm-10">
										      <input name="add_amount" type="number" step="0.01" class="form-control" id="st" value="10.00">
										    </div>
										 </div>
							  			<button type="submit" class="btn btn-primary btn-sm" role="button">Increase / Decrease</button>
							  			{!! csrf_field() !!}
									</form>
					      		</div>
					      	</div>
					    </div>
					  </div>
				@else
					<!-- Green Background -->
					<div class="col-sm-6 col-md-4">
					    <div class="thumbnail empty">
					      <img src="..." alt="No image">
					      <div class="caption">
					        <h3>{{$c->name}}</h3>
					        <p><span>{{$c->localization}}</span> | <span>{{ $c->status }}</span></p>
					        <p>
					        	<a href="#" class="btn btn-default" role="button" data-toggle="modal" data-target="#details_{{$c->name}}">Detalles</a>
					        </p>
					      </div>
					  		<hr>
							<div class="row">
					      		<div class="col-sm-6">
					      			<form class="form-horizontal" method="POST" action="{{ route('full') }}" enctype="multipart/form-data">
							      		<input type="hidden" name="container_id" value="{{ $c->id }}">
							  			<button type="submit" class="btn btn-primary btn-sm" role="button">Set FULL</button>
							  			{!! csrf_field() !!}
									</form>
					      		</div>
					      		<div class="col-sm-6">
					      			<form class="form-horizontal" method="POST" action="{{ route('change_amount') }}" enctype="multipart/form-data">
							      		<input type="hidden" name="container_id" value="{{ $c->id }}">
							      		 <div class="form-group">
										    <div class="col-sm-10">
										      <input name="add_amount" type="number" step="0.01" class="form-control" id="st" value="10.00">
										    </div>
										 </div>
							  			<button type="submit" class="btn btn-primary btn-sm" role="button">Increase / Decrease</button>
							  			{!! csrf_field() !!}
									</form>
					      		</div>
					      	</div>
					    </div>
					  </div>
				@endif
			@else
			  <div class="col-sm-6 col-md-4">
			    <div class="thumbnail full">
			      <img src="..." alt="No image">
			      <div class="caption">
			        <h3>{{$c->name}}</h3>
			        <p><span>{{$c->localization}}</span> | <span>{{ $c->status }}</span></p>
			        <p>
			        	@if($c->being_collected === 1)
			        		<span>Being collected...</span>
			        	@else
			        		<a href="#" class="btn btn-primary" role="button" data-toggle="modal" data-target="#collect_{{$c->name}}">Colectar</a>
			        	@endif
			        	<a href="#" class="btn btn-default" role="button" data-toggle="modal" data-target="#details_{{$c->name}}">Detalles</a>
			        </p>
			      </div>
			      <hr>
			      	<div class="row">
			      		<div class="col-sm-6">
			      			<form class="form-horizontal" method="POST" action="{{ route('empty') }}" enctype="multipart/form-data">
					      		<input type="hidden" name="container_id" value="{{ $c->id }}">
					  			<button type="submit" class="btn btn-primary btn-sm" role="button">Set EMPTY</button>
					  			{!! csrf_field() !!}
							</form>
			      		</div>
			      		<div class="col-sm-6">
			      			<form class="form-horizontal" method="POST" action="{{ route('change_amount') }}" enctype="multipart/form-data">
					      		<input type="hidden" name="container_id" value="{{ $c->id }}">
					      		 <div class="form-group">
								    <div class="col-sm-10">
								      <input name="add_amount" type="number" step="0.01" class="form-control" id="st" value="-10.00">
								    </div>
								 </div>
					  			<button type="submit" class="btn btn-primary btn-sm" role="button">Increase / Decrease</button>
					  			{!! csrf_field() !!}
							</form>
			      		</div>
			      	</div>
			    </div>
			  </div>
			 @endif
			 <!-- Modal Details -->
			<div class="modal fade" id="details_{{$c->name}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Detalles</h4>
			      </div>
			      <div class="modal-body">
			        <span><b>Nombre: </b></span><span>{{$c->name}}</span><br>
			        <span><b>Localización: </b></span><span>{{$c->localization}}</span>
			        <hr>
			        <div class="show_amount" align="center"><span>{{$c->amount}}</span><span>%</span></div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      
			      </div>
			    </div>
			  </div>
			</div>
			<!-- End Modal Details -->

			<!-- Modal Collect -->
			<div class="modal fade" id="collect_{{$c->name}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Solicitud de colección</h4>
			      </div>
			      <div class="modal-body">
			      	<!-- Form collect -->
			        <form class="form-horizontal" method="POST" action="{{ route('collect') }}" enctype="multipart/form-data">
						<div class="form-group">
						    <label for="container" class="col-sm-2 control-label">Contenedor</label>
						    <div class="col-sm-10">
						      <input name="container_name" type="text" class="form-control" id="container" value="{{ $c->name }}">
						    </div>
						 </div>
						 <div class="form-group">
						    <label for="address" class="col-sm-2 control-label">Dirección</label>
						    <div class="col-sm-10">
						      <input name="container_address" type="text" class="form-control" id="address" value="{{ $c->localization }}">
						    </div>
						 </div>
						 
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <button type="submit" class="btn btn-default">Enviar solicitud</button>
						    </div>
						  </div>
						  <input type="hidden" name="container_id" value="{{ $c->id }}">
						{!! csrf_field() !!}
					</form>
					<!-- End Form collect -->
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			     
			      </div>
			    </div>
			  </div>
			</div>
			<!-- End Modal Collect -->
		@endforeach
		</div>

		<!-- End Containers -->
		<div align="center">{{ $containers->links() }}</div>
	</div>

@endsection