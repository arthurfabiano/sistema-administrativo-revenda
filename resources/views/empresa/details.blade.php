<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <h2 class="text-center">{{ $empresa->nome }}</h2>
                        <h3 class="profile-username text-center">{{ $empresa->razao_social }}</h3>

                        <p class="text-muted text-center">{{ $empresa->tipo }}</p>
                        <h2 class="text-{{ $empresa->tipo === 'fornecedor' ? 'danger' : 'success' }} text-center">
                            <i class="right fas fa-arrow-circle-{{ $empresa->tipo === 'fornecedor' ? 'down' : 'up' }}"></i>
                            R$ {{ numero_iso_para_br($saldo->valor) }}
                        </h2>

                        <ul class="list-group list-group-unbordered mb-3 text-justify">
                            {{ $empresa->tipo }}
                        </ul>
                        <form method="post" action="{{ route('empresas.destroy', $empresa) }}?tipo={{ $empresa->tipo }}">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-danger btn-block"
                                onclick="return confirm('Tem certeza que deseja apagar o registro?')">
                                <b>Apagar</b>
                            </button>
                        </form>
                    </div>

                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Empresa</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Contato</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Documento</label>
                                        <div class="col-sm-10">
                                            <input class="cpf_cnpj form-control"
                                                   value="@if (strlen($empresa->documento) === 11) {{ mascara($empresa->documento, '###.###.###-##') }}
                                                   @else {{ mascara($empresa->documento, '##.###.###/####-##') }} @endif"
                                                   disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">IE/RG</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" value="{{ $empresa->ie_rg }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">CEP</label>
                                        <div class="col-sm-10">
                                            <input class="cep form-control" value="{{ mascara($empresa->cep, '#####-###') }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Logradouro</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" value="{{ $empresa->logradouro }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Bairro</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" value="{{ $empresa->bairro }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Cidade</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" value="{{ $empresa->cidade }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Estado</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" value="{{ $empresa->estado }}" disabled>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane" id="settings">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nome</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" value="{{ $empresa->nome }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" value="{{ $empresa->email }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Telefone</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" value="{{ mascara($empresa->telefone, '(##) ####-####') }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Celular</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" value="{{ mascara($empresa->celular, '(##) # ####-####') }}" disabled>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
