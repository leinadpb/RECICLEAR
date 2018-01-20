@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="list-group">
                      <a href="/admin/containers"><li class="list-group-item">Contenedores</li></a>
                      <a href="#"><li class="list-group-item">Empleados</li></a>
                      <a href="#"><li class="list-group-item">Gráficas y estadísticas</li></a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
