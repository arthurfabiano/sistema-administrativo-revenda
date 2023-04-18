@extends('layouts.app')

@section('title',  $empresa->tipo)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('empresas.index') }}?tipo={{ $empresa->tipo }}">Listagem</a></li>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detalhes do {{ $empresa->tipo .'.: '. $empresa->nome}}</h3>
                        </div>
                        <div class="card-body">
                            @include('empresa.details')
                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            {{ now() }}
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
