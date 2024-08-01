@extends('layouts.web')

@section('content')

    <div class="row">
        <div class="col text-center">
            <strong><?php echo strtoupper($misa->MISAC_Descripcion);?></strong><br>
            <strong><?php echo $misa->MISAC_Fecha->format('d/m/Y');?></strong>
        </div>
        
        <div style="float:right;text-align:center;vertical-align:top;">
            <a href="#" target="_blank"><img src="{{ asset('images/pdf_icon.png') }}" alt="Exportar PDF"/></a>
        </div>		
    </div>

    @php $descripcion = ""; @endphp

    @foreach($misa->misa_cancion as $detalle)

        @if ($descripcion != $detalle->rito->RITOC_DescripcionCorta)
            <h6>{{ strtoupper($detalle->rito->RITOC_DescripcionCorta) }}:</h6>
        @endif

        <div class='row'>
            <div class='col-lg col-sm col'>
                <a href="/cancionero-detalle-misa/{{ $detalle->categoria_cancion->cancion->CANCP_Codigo }}/3">
                    {{ strtoupper($detalle->categoria_cancion->cancion->CANCC_Titulo ) }} 
                    ({{ $detalle->categoria_cancion->CATEGCANCC_Orden }})</a>
            </div>
        </div>

        @php $descripcion = $detalle->rito->RITOC_DescripcionCorta; @endphp

    @endforeach

@endsection