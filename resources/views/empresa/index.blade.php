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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Listagem de {{ $tipo }}</h3>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('empresas.create') }}?tipo={{ $tipo }}" class="btn btn-success btn-sm" title="Novo Produto">
                                <i class="fa fa-plus" aria-hidden="true"></i> Novo
                            </a>

                            <form method="GET" action="{{ url('/produtos') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                                    <span class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>

                            <br/>
                            <br/>
                            <div class="table-responsive">
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
                                            <td>{{ mascara($emp->celular, '(##)#####-####') }}</td>
                                            <td>
                                                <a href="{{ route('empresas.show', $emp) }}" class="btn btn-sm btn-success"><i class="nav-icon far fa-eye"></i></a>
                                                <a href="{{ route('empresas.edit', $emp) }}" class="btn btn-sm btn-primary"><i class="nav-icon far fa-edit"></i></a>
                                                <a href="{{ route('empresas.destroy', $emp) }}" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash-alt"></i></a>
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
                        </div>

                        <div class="card-footer">
                            {{ $empresas->appends(['tipo' => request('tipo')])->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
