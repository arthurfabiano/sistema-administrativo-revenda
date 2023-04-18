@extends('layouts.app')

@section('title',  $tipo)

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
                            <h3 class="card-title">Listagem de {{ $tipo }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('empresas.create') }}?tipo={{ $tipo }}" class="btn btn-success"><i class="nav-icon fas fa-plus"></i> Novo</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Empresa</th>
                                    <th>Contato</th>
                                    <th>Email</th>
                                    <th>Celular</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($empresas as $emp)
                                    <tr>
                                        <td>{{ $emp->id }}.</td>
                                        <td>{{ $emp->nome }}</td>
                                        <td>{{ $emp->nome_contato }}</td>
                                        <td>{{ $emp->email }}</td>
                                        <td>{{ $emp->celular }}</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-success"><i class="nav-icon far fa-eye"></i></a>
                                            <a href="#" class="btn btn-sm btn-primary"><i class="nav-icon far fa-edit"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        Não possui nenhum registro cadastrado.
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            {{ $empresas->appends(['tipo' => request('tipo')])->links() }}
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
