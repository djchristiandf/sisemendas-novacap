@extends('layouts.main')

@section('content')
<main class="py-5">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-title">
                <strong>Adição de Parlamentar</strong>
              </div>
              <div class="card-body">
                <form action="{{ route('parliamentarians.store')}}" method="POST">
                    @csrf
                    @include('parliamentarians._form')
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection

@section('title', 'Emendas NOVACAP | Adição de Parlamentar')
