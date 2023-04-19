@extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">QUANTIDADE</h5>
                                <h6 class="card-subtitle mb-2 text-muted">EMENDAS CRIADAS</h6>
                                <h1 class="card-text text-center">{{ DB::table('amendments')->count();}}</h1>
                                <a href="{{ route('amendments.index') }}" class="card-link">Todas Emendas</a>
                            </div>
                        </div>
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">TOTAL</h5>
                                <h6 class="card-subtitle mb-2 text-muted">EMPENHADO</h6>
                                <h1 class="card-text text-center">R$ {{ number_format(DB::table('amendments')->sum('price'), 2, ",","."); }}</h1>
                                <a href="#" class="card-link">Gráficos</a>
                            </div>
                        </div>
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">PARLAMENTARES</h5>
                                <h6 class="card-subtitle mb-2 text-muted">ENVOLVIDOS</h6>
                                <h1 class="card-text text-center">{{ DB::table('parliamentarians')->count();}}</h1>
                                <a href="{{ route('parliamentarians.index')}}" class="card-link">Envolvidos</a>
                            </div>
                        </div>
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">ANO</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Escolha o ano desejado:</h6>
                                <ul>
                                        <li><a href="#">{{ Carbon\Carbon::now()->subYear(2)->format('Y'); }}</a></li>
                                        <li><a href="#">{{ Carbon\Carbon::now()->subYear(1)->format('Y'); }}</a></li>
                                        <li><a href="#" class="activate">{{ Carbon\Carbon::now()->format('Y'); }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
