@extends('layouts.main')

@section('content')
<main class="py-5">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-title">
                <strong>Detalhes da Emenda</strong>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="parliamentary" class="col-md-3 col-form-label">PARLAMENTAR</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{ $amendment->parliamentary}}</p>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="amendment" class="col-md-3 col-form-label">EMENDA</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{ $amendment->amendment}}</p>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="caption" class="col-md-3 col-form-label">SUBTÍTULO</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{ $amendment->caption}}</p>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="work_program" class="col-md-3 col-form-label">PROGRAMA DE TRABALHO</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{ $amendment->work_program}}</p>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="work_program" class="col-md-3 col-form-label">NATUREZA DA DESPESA</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{ $amendment->nature_of_expense}}</p>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="price" class="col-md-3 col-form-label">VALOR</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">R$ {{ number_format($amendment->price, 2, ',', '.')}}</p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="viability" class="col-md-3 col-form-label">VIABILIDADE</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{ $amendment->viability }}</p>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group row mb-0">
                      <div class="col-md-9 offset-md-3">
                          <a href="{{ route('amendments.edit', $amendment->id)}}" class="btn btn-info">Atualizar</a>
                          <a href="#" class="btn btn-outline-danger">Excluir</a>
                          <a href="{{ route('amendments.index')}}" class="btn btn-outline-secondary">Voltar</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection
