@extends('layouts.admin')

@section('content')

<!-- Content Header -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Nueva Lectura</h1>
        </div>
    </div>
    </div>
</section>
<!-- End Content Header -->

<!---->
<section class="content">
    <div class="grid-hor">

        {!!Form::open(['route'=>'lectura.store','method'=>'POST','class'=>'col-sm-10'])!!}

            <div class="form-group row">

                <div class="row mb-3 col-md-12 col-xl-6">
                    <div class="col-sm-2"> 
                        {!!Form::label('misa','Misa:')!!}
                    </div>
                    <div class="col-sm-10">  
                        <select name="misa" id="misa" class="form-control">
                            <option value="">:: Seleccione ::</option>
                            @foreach ($misas as $misa)
                                <option value="{{ $misa->MISAP_Codigo }}">{{ $misa->MISAC_Descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row  mb-3 col-md-12 col-xl-6">
                    <div class="col-sm-2"> 
                        {!!Form::label('fecha','Fecha:')!!}
                    </div>
                    <div class="col-sm-10"> 
                        {!!Form::date('fecha',null,['class'=>'form-control','placeholder'=>'Ingrese la fecha','id'=>'fecha'])!!}
                    </div>
                </div>                

            </div>

            <div><hr></div>  
            
            <!-- Primera lectura -->
            <div class="form-group row">
                <label class="col-sm-12 col-lg-2">1ERA LECTURA: </label>
                <div class="col-sm-12 col-lg-10 row">
                    <div class="col-11">
                        <div class="row mb-2">
                            {!!Form::text('titulo_lectura_1',NULL,['class'=>'form-control','placeholder'=>'','id'=>'titulo_lectura_1'])!!}
                        </div>
                        <div class="row">
                            {!!Form::textarea('descripcion_lectura_1',NULL,['class'=>'form-control','placeholder'=>'','id'=>'descripcion_lectura_1', 'rows' => 5])!!}  
                        </div>
                    </div>
                </div>  
            </div>
            <!--/ Primera lectura -->

            <!-- Salmo -->
            <div class="form-group row">
                <label class="col-sm-12 col-lg-2">SALMO: </label>
                <div class="col-sm-12 col-lg-10 row">
                    <div class="col-11">
                        <div class="row mb-2">
                            {!!Form::text('titulo_salmo',null,['class'=>'form-control','placeholder'=>'','id'=>'titulo_salmo'])!!}
                        </div>
                        <div class="row">
                            {!!Form::textarea('descripcion_salmo',NULL,['class'=>'form-control','placeholder'=>'','id'=>'descripcion_salmo', 'rows' => 5])!!}  
                        </div>
                    </div>
                </div>  
            </div>
            <!--/ Salmo -->      
            
            <!-- Segunda lectura -->
            <div class="form-group row">
                <label class="col-sm-12 col-lg-2">2DA LECTURA: </label>
                <div class="col-sm-12 col-lg-10 row">
                    <div class="col-11">
                        <div class="row mb-2">
                            {!!Form::text('titulo_lectura_2',null,['class'=>'form-control','placeholder'=>'','id'=>'titulo_lectura_2'])!!}
                        </div>
                        <div class="row">
                            {!!Form::textarea('descripcion_lectura_2',NULL,['class'=>'form-control','placeholder'=>'','id'=>'descripcion_lectura_2', 'rows' => 5 ])!!} 
                        </div> 
                    </div>
                </div>  
            </div>
            <!--/ Segunda lectura -->    
            
            <!-- Evangelio -->
            <div class="form-group row">
                <label class="col-sm-12 col-lg-2">EVANGELIO: </label>
                <div class="col-sm-12 col-lg-10 row">
                    <div class="col-11">
                        <div class="row mb-2">
                            {!!Form::text('titulo_evangelio',null,['class'=>'form-control','placeholder'=>'','id'=>'titulo_evangelio'])!!}
                        </div>
                        <div class="row">
                            {!!Form::textarea('descripcion_evangelio',NULL,['class'=>'form-control','placeholder'=>'','id'=>'descripcion_evangelio', 'rows' => 5])!!}  
                        </div>
                    </div>
                </div>  
            </div>
            <!--/ Evangelio -->            

            {!!Form::submit('Agregar',['class'=>'btn btn-info'])!!}
            <a class="btn btn-danger" href="{{ route('lectura.index') }}">Cancelar</a>
        {!!Form::close()!!}
    </div>
</section>

@endsection