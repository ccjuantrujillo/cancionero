@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Editar Categoria</h1>
        </div>
    </div>
    </div>
</section>

<!---->
<section class="content">
    <div class="grid-hor"> 

        {!!Form::model($categoria, ['route'=>['categoria.update', $categoria->CATEGP_Codigo],'method'=>'PATCH', 'class'=>'col-sm-10'])!!}
            <div class="form-group">
                {!!Form::label('id','Codigo')!!}
                {!!Form::text('id',$categoria->CATEGP_Codigo,['class'=>'form-control','placeholder'=>'Ingrese el COMPP_Codigo','id'=>'id','readonly'=>'readonly'])!!}
            </div>  
            <div class="form-group">
                {!!Form::label('orden','Orden')!!}
                {!!Form::text('orden',$categoria->CATEGC_Orden,['class'=>'form-control','placeholder'=>'Ingrese el orden','id'=>'orden'])!!}
            </div>                       
            <div class="form-group">
                {!!Form::label('nombres','Nombre corto')!!}
                {!!Form::text('nombre_corto',$categoria->CATEGC_DescripcionCorta,['class'=>'form-control','placeholder'=>'Ingrese el nombre corto','id'=>'nombre_corto'])!!}
            </div>   
            <div class="form-group">
                {!!Form::label('nombre','Nombre')!!}
                {!!Form::text('nombre',$categoria->CATEGC_Descripcion,['class'=>'form-control','placeholder'=>'Ingrese el nombre','id'=>'nombre'])!!}
            </div>                        
            {!!Form::submit('Editar',['class'=>'btn btn-info'])!!}

            <!-- Agregar boton de cancelar -->
            <a class="btn btn-danger" href="{{ route('categoria.index') }}">Cancelar</a>
        {!!Form::close()!!}

    </div>
</section>

@endsection