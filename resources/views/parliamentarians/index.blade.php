@extends('layouts.main')

@section('title', 'SISEMENDAS | TODOS PARLAMENTARES')

@section('content')
<main class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header card-title">
                  <div class="d-flex align-items-center">
                    <h2 class="mb-0">Parlamentares</h2>
                    <div class="ml-auto">
                      <a href="{{route('parliamentarians.create')}}" class="btn btn-success">
                          <i class="fa fa-plus-circle"></i> Adicionar</a>
                    </div>
                  </div>
                </div>
              <div class="card-body">
                @include('parliamentarians._filter')
                <table class="table table-bordered table-striped table-hover table-responsive" style="font-size: 13px;width:100%;">
                  <thead>
                    <tr class="text-center">
                      <th scope="col">#</th>
                      <th scope="col">PARLAMENTAR</th>
                      <th scope="col">AÇÕES</th>
                    </tr>
                  </thead>
                  <tbody>
                      @if ($message = session('message'))
                        <div class="alert alert-success">{{ $message}}</div>
                      @endif
                    @if ($parliamentarians->count())
                        @foreach ($parliamentarians as $index => $parliamentary)
                           <tr>
                            <th scope="row">{{ $index + $parliamentarians->firstItem()}}</th>
                            <td>{{ $parliamentary->name}}</td>
                            <td width="150">
                                <a href="{{ route('parliamentarians.show', $parliamentary->id)}}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('parliamentarians.edit', $parliamentary->id)}}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('parliamentarians.destroy', $parliamentary->id)}}" class="btn-delete btn btn-sm btn-circle btn-outline-danger" title="Delete"><i class="fa fa-times"></i></a>
                            </td>
                            </tr>
                        @endforeach

                        <form id="form-delete" method="POST" style="display: none">
                            @csrf
                            @method('DELETE')
                        </form>
                    @endif
                  </tbody>
                </table>

                {{-- <nav class="mt-4">
                    <ul class="pagination justify-content-center">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                      </li>
                    </ul>
                  </nav> --}}
                {{ $parliamentarians->appends(request()->only('id'))->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection
