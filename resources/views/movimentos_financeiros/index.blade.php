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
                            <a href="{{ url('/movimentos_financeiros/create') }}" class="btn btn-success btn-sm" title="Novo Movimentos_financeiro">
                                <i class="fa fa-plus" aria-hidden="true"></i> Novo
                            </a>

                            <form method="GET" action="{{ url('/movimentos_financeiros') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th><th>Descricao</th><th>Valor</th><th>Data</th><th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($movimentos_financeiros as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
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
                                <div class="pagination-wrapper"> {!! $movimentos_financeiros->appends(['search' => Request::get('search')])->render() !!} </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
