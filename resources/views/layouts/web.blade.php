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

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-dark bg-primary">
    <div class="container">
        <div class="navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item {{ Route::is('lecturas') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ route('lecturas') }}">Lecturas</a>
              </li>			
              <li class="nav-item {{ Route::is('cancionero', 'cancionero_detalle') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ route('cancionero') }}">Cancionero</a>
              </li>	
              <li class="nav-item {{ Route::is('misas', 'misa_detalle') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ route('misas') }}">Misas</a>
              </li>
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

    <!--/ SEARCH FORM -->

  </nav>
  <!--/ End Navbar-->

  <!--Pagina de contenido-->
  <div class="container">
       @yield('content')  
  </div>
  <!--/Pagina de contenido-->



  @yield('modals')
  
  @yield('scripts')
  
</body>
</html>