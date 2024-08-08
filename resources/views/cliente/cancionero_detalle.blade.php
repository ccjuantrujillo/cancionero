@extends('layouts.web')

@section('content')

<div class="container">

    {!! Form::open(['route' => 'lecturas', 'method' => 'POST']) !!}

        <div style="float:left;text-align:left;vertical-align:top;font:18px arial, sans-serif;">
            <a href="#" id="atras" onclick="javascript:submit();"><<<</a>
        </div>

        <div style="float:right;text-align:right;vertical-align:top;font:18px arial, sans-serif;">
            <a href="#" id="mostrar_ocultar">A</a>&nbsp;
            <a href="#" id="sgte" onclick="javascript:submit();">>>></a>
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

</div>

@endsection

@section('scripts')
    <script src="{{asset('js/cliente/cancionero_detalle.js')}}"></script>
@endsection