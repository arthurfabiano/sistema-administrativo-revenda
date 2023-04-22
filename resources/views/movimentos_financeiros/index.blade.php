@extends('layouts.app')

@section('title',  'Movimentos Financeiros')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/movimentos_financeiros') }}">Listagem</a></li>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Movimentos Financeiros</div>
                        <div class="card-body">

                            <form method="GET">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label" for="data_inicial">Data Inicial</label>
                                            <div class="input-group">
                                                <input id="data_inicio" name="data_inicial" type="text" class="form-control data" value="{{ request('data_inicial') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label" for="data_final">Data Final</label>
                                            <div class="input-group">
                                                <input id="data_final" name="data_final" type="text" class="form-control data" value="{{ request('data_final') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group pt-2">
                                            <label class="control-label" for=""></label>
                                            <div class="input-group">
                                                <button class="btn btn-info m-t-xs" title="Buscar Conta"><i class="fa fa-search" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <br>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tipo</th>
                                            <th>Empresa</th>
                                            <th>Descricao</th>
                                            <th>Valor</th>
                                            <th>Data</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($movimentos_financeiros as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><span class="badge badge-{{ $item->tipo === 'Entrada' ? 'success' : 'danger' }}">{{ $item->tipo }}</span></td>
                                            <td>{{ $item->empresa->nome }} ({{ $item->empresa->razao_social }})</td>
                                            <td>{{ $item->descricao }}</td><td>{{ numero_iso_para_br($item->valor) }}</td><td>{{ data_iso_para_br($item->data) }}</td>
                                            <td>
                                                <a href="{{ url('/movimentos_financeiros/' . $item->id) }}" title="View Movimentos_financeiro"><button class="btn btn-info btn-sm"><i class="nav-icon far fa-eye"></i></button></a>
                                                <a href="{{ url('/movimentos_financeiros/' . $item->id . '/edit') }}" title="Edit Movimentos_financeiro"><button class="btn btn-primary btn-sm"><i class="nav-icon far fa-edit"></i></button></a>

                                                <form method="POST" action="{{ url('/movimentos_financeiros' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Movimentos_financeiro" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="nav-icon fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <a href="{{ url('/movimentos_financeiros/create') }}" class="btn btn-success btn-sm" title="Novo Movimentos_financeiro">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Novo
                                </a>

                                <div class="pagination-wrapper"> {!! $movimentos_financeiros->appends(['search' => Request::get('search')])->render() !!} </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
