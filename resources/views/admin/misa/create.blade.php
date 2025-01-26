@extends('layouts.admin')

@section('content')

<!-- Content Header -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Nueva Misa</h1>
        </div>
    </div>
    </div>
</section>
<!-- End Content Header -->

<!---->
<section class="content">
    <div class="grid-hor">
        {!!Form::open(['route'=>'misa.store','method'=>'POST','class'=>'col-sm-10'])!!}

            <div class="pb-4">
                @include('admin.misa.forms.misa')
            </div>

            <div class="text-center">
                {!!Form::submit('Agregar',['class'=>'btn btn-info'])!!}
                <a class="btn btn-danger" href="{{ route('misa.index') }}">Cancelar</a>
            </div>

        {!!Form::close()!!}
    </div>
</section>

@endsection

@section('scripts')
<script src="{{asset('js/admin/misa.js')}}"></script>
@endsection