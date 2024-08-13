@extends('layouts.web')

@section('content')

<div class="container">

    {!! Form::open( ['route' => 'cambiar_cancion_misa', 'method' => 'POST'] ) !!}

        {!! Form::hidden('categoriacancion_id', request()->categoriacancion_id ) !!}

        <!--div style="float:left;text-align:left;vertical-align:top;font:18px arial, sans-serif;">
            <button name="accion" value="atras" type="submit"> <<< </button>
        </div>

        <div style="float:right;text-align:right;vertical-align:top;font:18px arial, sans-serif;">
            <a href="#" id="mostrar_ocultar">A</a>&nbsp;
            <button name="accion" value="sgte" type="submit"> >>> </button>
        </div-->	

    {!! Form::close() !!}    

    <p class="text-center">
        <strong>{{ $cancion->categoria_cancion_misa[0]->CATEGCANCC_Orden }}. 
            {{ strtoupper($cancion->CANCC_Titulo) }}
        </strong>
    </p>

    <div>
        {!! html_entity_decode(html_entity_decode($cancion->CANCC_Letra)) !!}
    </div>

</div>

@endsection

@section('scripts')
    <script src="{{asset('js/cliente/cancionero_detalle_misa.js')}}"></script>
@endsection