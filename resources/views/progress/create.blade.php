@extends('layouts.main')

@section('content')
<main class="py-5">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-title">
                <strong>Adição de Emendas</strong>
              </div>
              <div class="card-body">
                <form action="{{ route('amendments.store')}}" method="POST">
                    @csrf
                    @include('amendments._form')
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection

@section('title', 'Emendas NOVACAP | Adição de Emenda')
