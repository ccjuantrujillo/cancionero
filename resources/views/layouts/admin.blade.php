<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!--title>{{ config('app.name', 'Catalogo de Productos') }}</title-->
  
  <title>Cancionero Parroquial Misionero</title>
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!--  Datatables estilos-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    
    <!-- SEARCH FORM -->
    {!!Form::open(['route'=>'selecciona_compania.user','method'=>'POST','class'=>'form-inline ml-3'])!!}
    <div class="input-group input-group-sm">
        <input type="hidden" name="ruta_actual" id="ruta_actual" value="{{ Request::path() }}">
        <select name="compania" id="compania" class="form-control form-control-sm" onchange="submit();">
          <?php 
          $companias = getCompanias();
          foreach($companias as $value){
            echo "<option value='".$value->COMPP_Codigo."' ".($value->COMPP_Codigo == session('compania') ?' selected="selected"':'')." >".$value->COMPC_Descripcion."</option>";
          }
          ?>           
      </select>
    </div>
    {!!Form::close()!!}
    <!--/ SEARCH FORM -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Salir') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
      </li>
  
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li>

    </ul>
  </nav>

   <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('misas') }}" class="brand-link" style="background-color: rgba(128,4,4,0.7)">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">CANCIONERO</span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar" style="background-color: rgba(128,4,4,0.7)">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            {{ Auth::user()->name }} ({{Auth::user()->ROLP_Codigo == App\User::ROL_USER ? 'Usuario' : 'Admin'}})</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @php
          $menu = App\Models\Menu::where("MENU_Codigo_Padre",0)->get();
          @endphp

          @foreach( $menu as $value )

            @if ( $value->MENU_Codigo == App\Models\Menu::ID_CONFIGURACION &&  
                      Auth::user()->ROLP_Codigo == App\User::ROL_USER)
              @continue
            @endif

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  {{ strtoupper($value->MENU_Titulo) }}
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

              <?php
              $menuhijo = App\Models\Menu::where("MENU_Codigo_Padre",$value->MENU_Codigo)->orderBy('MENU_OrderBy', 'asc')->get();
              foreach($menuhijo as $valuehijo){
                ?>
                  <ul class="nav nav-treeview">
                    <li class="nav-item {{ Route::is($valuehijo->MENU_Url) ? 'active' : '' }}">
                      <a href="{{ route($valuehijo->MENU_Url) }}" class="nav-link">
                        <i class="far nav-icon"></i>
                        <p>{{ $valuehijo->MENU_Titulo }}</p>
                      </a>
                    </li>
                  </ul>  
                <?php
              }
              ?>
            </li>
          @endforeach

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

    <div class="content-wrapper" id="app">
        @yield('content')       
    </div>   

</div>

  <!-- REQUIRED SCRIPTS -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<script src="{{asset('dist/js/demo.js')}}"></script>
<script src="{{asset('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!--script src="{{asset('dist/js/pages/dashboard2.js')}}"></script-->
<script src="{{asset('js/app.js')}}"></script>

@yield('scripts')

</body> 
</html>