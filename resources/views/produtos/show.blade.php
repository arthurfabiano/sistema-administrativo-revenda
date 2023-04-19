@extends('layouts.app')

@section('title',  'Produto ' . $produto->nome)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('empresas.index') }}">Visualizar Produto</a></li>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Produto #{{ $produto->id }}</div>
                        <div class="card-body">

                            <a href="{{ url('/produtos') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                            <a href="{{ url('/produtos/' . $produto->id . '/edit') }}" title="Edit Produto"><button class="btn btn-primary btn-sm"><i class="nav-icon far fa-edit"></i></button></a>

                            <form method="POST" action="{{ url('produtos' . '/' . $produto->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Produto" onclick="return confirm(&quot;Tem certeza que deseja apagar?&quot;)"><i class="nav-icon fas fa-trash-alt"></i></button>
                            </form>
                            <br/>
                            <br/>

                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>ID</th><td>{{ $produto->id }}</td>
                                        </tr>
                                        <tr><th> Nome </th><td> {{ $produto->nome }} </td></tr><tr><th> Descricao </th><td> {{ $produto->descricao }} </td></tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
