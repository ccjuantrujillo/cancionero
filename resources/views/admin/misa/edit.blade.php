@extends('layouts.admin')

@section('content')

<!-- Content Header  -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Editar Misa</h1>
        </div>
    </div>
    </div>
</section>
<!-- End Content Header  -->

<!-- Content Body -->
<section class="content">
    <div class="grid-hor">           
        {!!Form::model($misa, ['route'=>['misa.update', $misa->MISAP_Codigo],'method'=>'PATCH', 'class'=>'col-sm-10'])!!}
            {{ method_field('PATCH') }}
            @csrf
            @include('admin.misa.forms.misa')
            {!!Form::submit('Editar',['class'=>'btn btn-info'])!!}
            <a class="btn btn-danger" href="{{ route('misa.index') }}">Cancelar</a>
        {!!Form::close()!!}
    </div>
</section>
<!-- End Content Body -->

@endsection

@section('scripts')
    <script src="{{asset('js/admin/misa.js')}}"></script>
@endsection