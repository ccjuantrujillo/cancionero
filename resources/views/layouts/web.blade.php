<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">  
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="description" CONTENT="Cancionero Parroquial Misionero">
  <meta NAME="Distribution" CONTENT="Global">
  <meta NAME="Robots" CONTENT="All">

  <title>Cancionero Parroquial Misionero</title>
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!--link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}"-->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> 
</head>
<body>

  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-dark bg-primary">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item {{ Route::is('lecturas') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ route('lecturas') }}">Lecturas</a>
              </li>			
              <li class="nav-item {{ Route::is('cancionero', 'cancionero_detalle') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ route('cancionero') }}">Cancionero</a>
              </li>	
              @if(getUserData()->usuario_id != 0)
                <li class="nav-item {{ Route::is('misas', 'misa_detalle') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('misas') }}">Misas</a>
                </li>
              @endif
              <li class="nav-item {{ Route::is('login') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ route('login') }}">Ingresar</a>
              </li>              
            </ul>
        </div>        
    </div>
    <!--End Navbar-->
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- SEARCH FORM -->
    @if(getUserData()->usuario_id != 0)
      {!!Form::open(['route'=>'selecciona_compania.user','method'=>'POST','class'=>'form-inline ml-3'])!!}
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <form id="frmChangeSession">
              <input type="hidden" name="ruta_actual" id="ruta_actual" value="{{ Request::path() }}">
              <select name="compania" id="compania" class="form-control form-control-sm" onchange="submit();"> 
                @foreach (getCompanias() as $compania)
                  <option value="{{ $compania->COMPP_Codigo }}"
                    {{ $compania->COMPP_Codigo == session('compania') ?' selected="selected"':'' }}
                    >{{ $compania->COMPC_Descripcion }}</option>   
                @endforeach
              </select>
              <input type="hidden" name="caja_activa" id="caja_activa" value=""/>
            </form>
          </li>
        </ul>
      {!!Form::close()!!}
    @endif
    <!--/ SEARCH FORM -->

  </nav>
  <!--/ End Navbar-->

  <!--Pagina de contenido-->
  <section class="container-fluid">
    <div class="container">
       @yield('content')  
    </div>
  </section>
  <!--/Pagina de contenido-->

  @yield('modals')
  
  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>