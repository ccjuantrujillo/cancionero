@extends('layouts.admin')

@section('content')

<!-- Content Header -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Nueva Canción</h1>
        </div>
    </div>
    </div>
</section>
<!-- End Content Header -->

<!-- Content Body -->
<section class="content">
    <div class="grid-hor">
        {!!Form::open(['route'=>'cancion.store','method'=>'POST','class'=>'col-sm-10'])!!}

            <div class="form-group">
                <label>Nombres</label>
                <input type="text" name="nombre" id="nombre" class="form-control" />
            </div>
		
            <div class="form-group">
                <label>Contenido</label>
                <textarea name="contenido" id="contenido" class="form-control" rows="10"></textarea>
            </div>
        
            <div class="form">
                
                <label>Cancioneros <a href="#" id="anadir_cancion_a_cancionero">(+)</a></label>
                
               <table class="table table-bordered table-hover"  id="tbl_cancioneros">
                    <thead>
                      <tr class="text-center  bg-white">
                        <th scope="col">Item</th>
                        <th scope="col">Cancionero</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Orden</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                
            </div>      
        
            <div style="margin-top:5px;padding-top:10px;">
                {!!Form::submit('Agregar',['class'=>'btn btn-info'])!!}
                <a class="btn btn-danger" href="{{ route('cancion.index') }}">Cancelar</a>   
            </div>     
        {!!Form::close()!!}
    </div>
</section>
<!-- End Content Body -->

@endsection

@section('scripts')
    <script src="{{asset('js/admin/cancion.js')}}"></script>
@endsection