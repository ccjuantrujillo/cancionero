@extends('layouts.web')

@section('content')

    {!! Form::open( ['route' => 'cambiar_cancion', 'method' => 'POST'] ) !!}

        {!! Form::hidden('cancion_id', request()->cancion_id ) !!}

        <div style="float:left;text-align:left;vertical-align:top;font:18px arial, sans-serif;">
            <button name="accion" value="atras" type="submit" class="btn btn-link"> <<< </button>
        </div>

        <div style="float:right;text-align:right;vertical-align:top;font:18px arial, sans-serif;">
            <a href="#" id="mostrar_ocultar">A</a>
            <button name="accion" value="sgte" type="submit" class="btn btn-link"> >>> </button>
        </div>	

    {!! Form::close() !!}

    <p class="text-center">
        <strong>{{ $cancion->categoria_cancion->CATEGCANCC_Orden }}. 
            {{ strtoupper($cancion->CANCC_Titulo) }}
        </strong>
    </p>

    <div>
        {!! html_entity_decode(html_entity_decode($cancion->CANCC_Letra)) !!}
    </div>

@endsection

@section('scripts')
    <script src="{{asset('js/cliente/cancionero_detalle.js')}}"></script>
@endsection

