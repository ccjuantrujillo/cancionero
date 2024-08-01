@extends('layouts.admin')

@section('content')

<!-- Content Header  -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Editar Canción</h1>
        </div>
    </div>
    </div>
</section>
<!-- End Content Header  -->

<!-- Content Body -->
<section class="content">
    <div class="grid-hor">
     {!!Form::model($cancion, ['route'=>['cancion.update', $cancion->CANCP_Codigo],'method'=>'PATCH', 'class'=>'col-sm-10'])!!}
            {{ method_field('PATCH') }}
            @csrf     

            <div class="form-group">
                <label>Nombres</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $cancion->CANCC_Titulo }}"/>
                <input type="hidden" name="cancion" id="cancion" value="{{ $cancion->CANCP_Codigo }}"/>
            </div>
            
            <div class="form-group">
                <label>Contenido</label>
                <textarea name="contenido" id="contenido" class="form-control" rows="10">{{ html_entity_decode(html_entity_decode($cancion->CANCC_Letra)) }}</textarea>
            </div>

            <div class="form-group">
			
                <label>Cancioneros <a href="#" id="anadir_cancion_a_cancionero">(+)</a></label>
			
                <table class="table table-bordered table-hover" id="tbl_cancioneros">
                    <thead>
                      <tr class="text-center  bg-white">
                        <th scope="col">Item</th>
                        <th scope="col">Cancionero</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Orden</th>
                      </tr>
                    </thead>
                    <tbody>
					
                        @foreach($companiacancion as $item => $value)

                            <tr class="text-center">

                                <td scope="row">{{ $item + 1 }}</td>

                                <td scope="row">
                                    <select class="form-control" id="cancionero[]" name="cancionero[]">
                                        @foreach (getCompanias() as $compania)
                                            <option value="{{ $compania->COMPP_Codigo }}" 
                                                @if($value->COMPP_Codigo == $compania->COMPP_Codigo)
                                                            selected="selected"
                                                    @endif
                                            >{{ $compania->COMPC_Descripcion }}</option>
                                        @endforeach
                                    </select>  
                                </td>

                                <td scope="row">
                                    <select class="form-control" id="categoria[]" name="categoria[]">
                                        @foreach (getCategorias($value->COMPP_Codigo) as $categoria)
                                            <option value="{{ $categoria->CATEGP_Codigo }}"
                                                @if($value->CATEGP_Codigo == $categoria->CATEGP_Codigo)
                                                            selected="selected"
                                                    @endif											
                                            >{{ $categoria->CATEGC_Descripcion }}</option>
                                        @endforeach
                                    </select>                                
                                </td>

                                <td scope="row">
                                    <input type="text" name="orden[]" id="orden[]" class="form-control" value="{{ $value->CATEGCANCC_Orden }}" />
                                </td>

                            </tr>

                        @endforeach
						
                    </tbody>
                </table>
            </div>

            <div style="margin-top:5px;padding-top:10px;">
                {!!Form::submit('Editar',['class'=>'btn btn-info'])!!}
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