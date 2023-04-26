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
                        @if ($empresa->tipo === 'fornecedor')
                            <div class="card-header">Dados do fornecedor:</div>
                        @else
                            <div class="card-header">Dados do cliente:</div>
                        @endif

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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        @if ($empresa->tipo === 'fornecedor')
                            <div class="card-header">Últimos itens comprados deste fornecedor:</div>
                        @else
                            <div class="card-header">Últimos itens vendidos para este cliente:</div>
                        @endif

                        <div class="card-body">
                            @include('empresa.parciais.movimentos_estoque')
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

@endsection
