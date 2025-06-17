@extends('layouts.web')

@section('content')
    <div class="row">

        <div class="col-lg-8">

            <!-- Row -->
            <div class="row">
                <div class="col-lg-10 col-md-6 align-self-baseline">
                    <h4 class="mt-3"><strong>{{ $ult_lectura->descripcion }}</strong></h4>
                </div>
                <div class="col-lg-2 col-md-6 align-self-center">
                    <a href="#"><<<</a>
                    <a href="#">>>></a>
                </div>
            </div>
            <!-- EndRow -->

            <!-- Roww -->
            <div>
                <h4 class="mt-1">{{ $ult_lectura->tema }}</h4>		  
                <p>Publicado el <?php echo date("j F, Y", strtotime($ult_lectura->fecha));?></p>

                <!-- Post Content -->
                @foreach($ult_lectura->details as $lectura)
                    <blockquote class="blockquote">
                        <p class="mb-0"><b>{{ $lectura->type->descripcion }}:</b></p>
                        <footer class="blockquote-footer">{{ $lectura->titulo }}</footer>
                    </blockquote> 
                    <p>{!! html_entity_decode($lectura->descripcion) !!}</p>
                @endforeach
                <!--/ Post Content -->

            </div>  
            <!-- End Roww -->         

        </div>

        <!-- Aside -->
        <div class="col-md-4">

            <div class="card my-4">
                <h5 class="card-header">Misas recientes </h5>
                <div class="card-body">
                    @foreach ($five_misas as $misa)
                    <ul class="list-unstyle mb-0">
                        <li><a href=" {{ route('misa_detalle', encrypt( $misa->id )) }} " > {{ $misa->descripcion }} </a></li>
                    </ul>
                    @endforeach
                </div>
            </div>

            <div class="card my-4">
            <h5 class="card-header">Oraciones</h5>
                <div class="card-body">
                    <ul class="list-unstyle mb-0">
                    <li><a href="#">Santo Rosario</a></li>
                    </ul>
                </div>
            </div>

            <div class="card my-4">
                <h5 class="card-header">Acerca de mi</h5>
                <div class="card-body">
                    La Capilla Santa Rosa tuvo sus origenes en la epoca de los yanaconas del Ex Fundo Santa Rosa..... <a href="#">Ver mas</a> 
                </div>
            </div>  

        </div>
        <!-- End Aside -->

    </div>
@endsection

@section('scripts')

@endsection