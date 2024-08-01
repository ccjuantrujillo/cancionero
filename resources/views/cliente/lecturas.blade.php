@extends('layouts.web')

@section('content')

<div class="row">

  <div class="col-lg-8">
  
	  <div class="row">
      <div class="col-lg-10 col-md-6 align-self-baseline">
        <h4 class="mt-3"><strong>{{ $misa->MISAC_Descripcion }}</strong></h4>
      </div>
			<div class="col-lg-2 col-md-6 align-self-center">
				<a href="lecturas.php?dia=<?php echo date("Ymd",strtotime('2024-07-21'."- 1 days"));?>"><<<</a>
				<a href="lecturas.php?dia=<?php echo date("Ymd",strtotime('2024-07-21'."+ 1 days"));?>">>>></a>
		  </div>
    </div>

    <div>

      <h4 class="mt-1">Venid a un lugar desierto a descansar</h4>		  
      <p>Publicado el <?php echo date("j F, Y", strtotime($misa->MISAC_Fecha));?></p>

        <!-- Post Content -->
        @foreach($misa->lecturas as $lectura)

          <blockquote class="blockquote">
            <p class="mb-0"><b>{{ $lectura->tipo_lectura->TIPOLECC_Descripcion }}:</b></p>
            <footer class="blockquote-footer">{{ $lectura->LECTC_Titulo }}</footer>
          </blockquote> 

          <p>{!! html_entity_decode($lectura->LECTC_Descripcion) !!}</p>

        @endforeach
        <!--/ Post Content -->

    </div>

  </div>

  <!-- Aside -->
  <div class="col-md-4">

    <div class="card my-4">
      <h5 class="card-header">Misas recientes </h5>
      <div class="card-body">
        <ul class="list-unstyle mb-0">
        <li><a href="#">Misa 1</a></li>
        </ul>
      </div>
    </div>

    <div class="card my-4">
      <h5 class="card-header">Oraciones</h5>
      <div class="card-body">
        <ul class="list-unstyle mb-0">
        <li><a href="#">Santo Rosario</a></li>
        <li><a href="#">Blog</a></li>
        </ul>
      </div>
    </div>

    <div class="card my-4">
      <h5 class="card-header">Formacion</h5>
      <div class="card-body">
        <ul class="list-unstyle mb-0">
        <li><a href="#">Fundamentos de la fe</a></li>
          <li><a href="#">La oraci&oacute;n</a> </li>
        </ul>
      </div>
    </div>

  </div>
  <!--/ Aside -->

</div>				

@endsection