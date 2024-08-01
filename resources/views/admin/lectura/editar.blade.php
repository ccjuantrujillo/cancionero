@extends('layouts.admin')

@section('content')

<!-- Content Header  -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Editar Lectura</h1>
        </div>
    </div>
    </div>
</section>
<!-- End Content Header  -->

<!-- Content Body -->
<section class="content">
    <div class="grid-hor">           
        {!!Form::model($misa, ['route'=>['lectura.update', $misa->MISAP_Codigo],'method'=>'POST', 'class'=>'col-sm-10'])!!}
            @csrf

            <div class="form-group row">

                <div class="row mb-3 col-md-12 col-xl-6">
                    <div class="col-sm-2"> 
                        {!!Form::label('misa','Misa:')!!}
                    </div>
                    <div class="col-sm-10">  
                        <select name="misa" id="misa" class="form-control" disabled="disabled">
                            <option value="">:: Seleccione ::</option>
                            @foreach ($misas as $value)
                                <option value="{{ $value->MISAP_Codigo }}"
                                    @if($value->MISAP_Codigo == $misa->MISAP_Codigo)
                                        selected = "selected"
                                    @endif
                                >{{ $value->MISAC_Descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row  mb-3 col-md-12 col-xl-6">
                    <div class="col-sm-2"> 
                        {!!Form::label('fecha','Fecha:')!!}
                    </div>
                    <div class="col-sm-10"> 
                        {!!Form::date('fecha',$misa->MISAC_Fecha,['class'=>'form-control','placeholder'=>'Ingrese la fecha','id'=>'fecha', 'disabled'=>'disabled'])!!}
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
                                {!!Form::text('titulo_lectura_1',$lecturas[0]->LECTC_Titulo,['class'=>'form-control','placeholder'=>'Ingrese el titulo','id'=>'titulo_lectura_1'])!!}
                            </div>
                            <div class="row">
                                {!!Form::textarea('descripcion_lectura_1',html_entity_decode($lecturas[0]->LECTC_Descripcion),['class'=>'form-control','placeholder'=>'Ingrese la primera lectura','id'=>'descripcion_lectura_1', 'rows' => 5])!!}  
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
                                {!!Form::text('titulo_salmo',$lecturas[1]->LECTC_Titulo,['class'=>'form-control','placeholder'=>'Ingrese el titulo','id'=>'titulo_salmo'])!!}
                            </div>
                            <div class="row">
                                {!!Form::textarea('descripcion_salmo',html_entity_decode($lecturas[1]->LECTC_Descripcion),['class'=>'form-control','placeholder'=>'Ingrese una descripcion','id'=>'descripcion_salmo', 'rows' => 5])!!}  
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
                                {!!Form::text('titulo_lectura_2',$lecturas[2]->LECTC_Titulo,['class'=>'form-control','placeholder'=>'Ingrese el titulo','id'=>'titulo_lectura_2'])!!}
                            </div>
                            <div class="row">
                                {!!Form::textarea('descripcion_lectura_2',html_entity_decode($lecturas[2]->LECTC_Descripcion),['class'=>'form-control','placeholder'=>'Ingrese una descripcion','id'=>'descripcion_lectura_2', 'rows' => 5 ])!!} 
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
                                {!!Form::text('titulo_evangelio',$lecturas[3]->LECTC_Titulo,['class'=>'form-control','placeholder'=>'Ingrese el titulo','id'=>'titulo_evangelio'])!!}
                            </div>
                            <div class="row">
                                {!!Form::textarea('descripcion_evangelio',html_entity_decode($lecturas[3]->LECTC_Descripcion),['class'=>'form-control','placeholder'=>'Ingrese una descripcion','id'=>'descripcion_evangelio', 'rows' => 5])!!}  
                            </div>
                        </div>
                    </div>  
                </div>
                <!--/ Evangelio -->    


            {!!Form::submit('Editar',['class'=>'btn btn-info'])!!}
            <a class="btn btn-danger" href="{{ route('lectura.index') }}">Cancelar</a>
        {!!Form::close()!!}
    </div>
</section>
<!-- End Content Body -->

@endsection