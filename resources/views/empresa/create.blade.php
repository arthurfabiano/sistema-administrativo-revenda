@extends('layouts.app')

@section('title', 'Novo ' . $tipo)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('empresas.index') }}?tipo={{ $tipo }}">Listagem</a></li>
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
                            <h3 class="card-title">Entre com os dados do {{ $tipo }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Cadastro</h3>
                                </div>
                                <form method="post" action="{{ route('empresas.store') }}">
                                    @csrf
                                    @include('empresa.form')
                                </form>
                            </div>
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
