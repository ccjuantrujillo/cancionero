@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Editar Usuario</h1>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<!---->
<section class="content">
    <div class="grid-hor">           
        {!!Form::model($usuario, ['route'=>['usuario.update', $usuario->id],'method'=>'PATCH', 'class'=>'col-sm-10'])!!}
            <div class="form-group">
                {!!Form::label('id','Codigo')!!}
                {!!Form::text('id',$usuario->id,['class'=>'form-control','placeholder'=>'Ingrese el nombre','id'=>'id','readonly'=>'readonly'])!!}
            </div>            
            <div class="form-group">
                {!!Form::label('nombres','Nombres')!!}
                {!!Form::text('nombre',$usuario->name,['class'=>'form-control','placeholder'=>'Ingrese los nombres','id'=>'nombre'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('email','Correo electronico')!!}
                {!!Form::text('email',$usuario->email,['class'=>'form-control','placeholder'=>'Ingrese la descripcion','id'=>'email'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('password','Contraseña')!!}
                {!!Form::text('password',null,['class'=>'form-control','placeholder'=>'Ingrese el password','id'=>'password'])!!}
            </div>                
            {!!Form::submit('Editar',['class'=>'btn btn-info'])!!}
            <!-- Agregar boton de cancelar -->
            <a class="btn btn-danger" href="{{ route('usuario.index') }}">Cancelar</a>
        {!!Form::close()!!}

    </div>
</section>

@endsection