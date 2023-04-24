@extends('layouts.main')

@section('script')
<script>
    $(document).ready(function($){
        $('#amendment').mask('99999.99');
        $('#work_program').mask('99.999.9999.9999.9999');
        $('#nature_of_expense').mask('999.999');
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
                            <strong>Adição de Emendas</strong>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body">
                            <form action="{{ route('amendments.store') }}" method="POST">
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
