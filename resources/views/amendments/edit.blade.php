@extends('layouts.main')
@section('script')
<script>
    $(document).ready(function($){
        $('#amendment').mask('99999.99', , {reverse: true});
        $('#work_program').mask('99.999.9999.9999.9999', , {reverse: true});
        $('#nature_of_expense').mask('999.999', {reverse: true});
        $("#price").mask("#,##0.00", {reverse: true});
   });
</script>
@endsection
@section('content')
<main class="py-5">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-title">
                <strong>Edição da Emenda</strong>
              </div>
              <div class="card-body">
                <form action="{{ route('amendments.update', $amendment->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    @include('amendments._formUpdate')
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection

@section('title', 'Emendas NOVACAP | Edição da Emenda')
