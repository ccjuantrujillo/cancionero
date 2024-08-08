@extends('layouts.web')

@section('content')

<div class="text-center"><H5><STRONG>MISAS Y LITURGIAS</STRONG></H5></div>

	@foreach($rango as $anio)

		<h5><strong>{{ $anio }}</strong></h5>

		@foreach ($usuariomisas as $usuariomisa)

			@if ($usuariomisa->misa->MISAC_Fecha->year == $anio)

				<div class="row">
					<div class="col-lg-2 col-md-2 col-5">{{ $usuariomisa->misa->MISAC_Fecha->format('d/m/Y') }}</a></div>
					<div class="col-lg-10 col-md-10 col-7">
						<a href="{{ route('misa_detalle', encrypt($usuariomisa->misa->MISAP_Codigo) ) }}"
	
							>{{ $usuariomisa->misa->MISAC_Descripcion }}</a>
					</div>
				</div>

			@endif

		@endforeach

	@endforeach

</div>

@endsection