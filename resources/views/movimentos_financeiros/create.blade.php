@extends('layouts.app')

@section('title', 'Movimentos Financeiro')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('movimentos_financeiros.index') }}">Listagem</a></li>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Nova Movimentação Financeira</div>
                        <div class="card-body">
                            <a href="{{ url('/movimentos_financeiros') }}" title="Voltar"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                            <br />
                            <br />

                            @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            <form method="POST" action="{{ url('/movimentos_financeiros') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                @include ('movimentos_financeiros.form', ['formMode' => 'create'])

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
