@extends('layouts.app')

@section('title', 'Editar ' . $empresa->nome)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('empresas.index') }}">Listagem</a></li>
    <li class="breadcrumb-item"><a href="{{ route('empresas.edit', $empresa) }}">Edit</a></li>
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
                            <h3 class="card-title">Editar os dados necessários do {{ $empresa->tipo }} {{ $empresa->nome }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Atualizar</h3>
                                </div>
                                <form method="post" action="{{ route('empresas.update', $empresa) }}">
                                    @csrf
                                    @method('PUT')
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
