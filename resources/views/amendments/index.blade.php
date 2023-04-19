@extends('layouts.main')

@section('title', 'SISEMENDAS | TODAS EMENDAS')

@section('content')
<main class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header card-title">
                  <div class="d-flex align-items-center">
                    <h2 class="mb-0">Todas Emendas</h2>
                    <div class="ml-auto">
                      <a href="{{route('amendments.create')}}" class="btn btn-success">
                          <i class="fa fa-plus-circle"></i> Adicionar</a>
                    </div>
                  </div>
                </div>
              <div class="card-body">
                @include('amendments._filter')
                <table id="tblAmendment" class="table table-bordered table-striped table-hover table-responsive" style="font-size: 13px;">
                  <thead>
                    <tr class="text-center">
                      <th scope="col">#</th>
                      <th scope="col">PARLAMENTAR</th>
                      <th scope="col">EMENDA</th>
                      <th scope="col">SUBTÍTULO</th>
                      <th scope="col">PROGRAMA DE TRABALHO</th>
                      <th scope="col">NATUREZA DA DESPESA</th>
                      <th scope="col">VALOR</th>
                      <th scope="col">VIABILIDADE</th>
                      <th scope="col">AÇÕES</th>
                    </tr>
                  </thead>
                  <tbody>
                      @if ($message = session('message'))
                        <div class="alert alert-success">{{ $message}}</div>
                      @endif
                    @if ($amendments->count())
                        @foreach ($amendments as $index => $amendment)
                           <tr>
                            <th scope="row">{{ $index + $amendments->firstItem()}}</th>
                            <td>{{ Str::upper($amendment->parliamentary->name) ?? $amendment->parliamentarians_id}}</td>
                            <td>{{ $amendment->amendment}}</td>
                            <td>{{ $amendment->caption}}</td>
                            <td>{{ $amendment->work_program}}</td>
                            <td>{{ $amendment->nature_of_expense}}</td>
                            <td class="text-right">{{ $amendment->price > 0 ? number_format($amendment->price, 2, ',', '.') : '0'}}</td>
                            <td>{{ $amendment->viability->name ?? $amendment->viability_id}}</td>
                            <td width="150">
                                <a href="{{ route('amendments.show', $amendment->id)}}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('amendments.edit', $amendment->id)}}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('amendments.destroy', $amendment->id)}}" class="btn-delete btn btn-sm btn-circle btn-outline-danger" title="Delete"><i class="fa fa-times"></i></a>
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
                {{ $amendments->appends(request()->only('id'))->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection
