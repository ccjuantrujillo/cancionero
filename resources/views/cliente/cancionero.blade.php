@extends('layouts.web')

@section('content')

    <form method="post" action ="{{ route('buscar_cancion') }}">
      @csrf
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar cancion" id="busqueda" name="busqueda" autocomplete="off">
    </form> 

    @php $categoria_ini = 0; @endphp

    @foreach ($canciones as $cancion)

      @if ($cancion->CATEGP_Codigo != $categoria_ini)
        <h6 class='text-left'><strong>{{ strtoupper($cancion->categoria->CATEGC_DescripcionCorta) }}</strong></h6>
        @php $categoria_ini = $cancion->CATEGP_Codigo; @endphp
      @endif

      <div class="row">
          <div class="col-lg col-sm col">
            <a href="{{ route('cancionero_detalle', encrypt($cancion->CANCP_Codigo)) }}"> {{ $cancion->CATEGCANCC_Orden. '. ' .$cancion->cancion->CANCC_Titulo }} </a>
          </div>
      </div>	

    @endforeach			

    </div>

@endsection