      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="../index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="/img/adminlte/AdminLTELogo.png"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">CANCIONERO</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false"
            >
              <li class="nav-header">PRINCIPAL</li>
              <li class="nav-item">
                <a href="../docs/introduction.html" class="nav-link">
                  <i class="nav-icon bi bi-download"></i>
                  <p>Lecturas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../docs/layout.html" class="nav-link">
                  <i class="nav-icon bi bi-grip-horizontal"></i>
                  <p>Misas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../docs/color-mode.html" class="nav-link">
                  <i class="nav-icon bi bi-star-half"></i>
                  <p>Canciones</p>
                </a>
              </li>
              <li class="nav-header">CONFIGURACIÓN</li>
              <li class="nav-item">
                <a href="../docs/how-to-contribute.html" class="nav-link">
                  <i class="nav-icon bi bi-hand-thumbs-up-fill"></i>
                  <p>Tiempos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../docs/faq.html" class="nav-link">
                  <i class="nav-icon bi bi-question-circle-fill"></i>
                  <p>Categorias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../docs/license.html" class="nav-link">
                  <i class="nav-icon bi bi-patch-check-fill"></i>
                  <p>Colecciones</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../docs/license.html" class="nav-link">
                  <i class="nav-icon bi bi-patch-check-fill"></i>
                  <p>Usuarios</p>
                </a>
              </li>     
              
              @can('admin.web.inicio')
                <li class="nav-item">
                  <a href="{{ route('admin.web.inicio') }}" class="nav-link">
                    <i class="nav-icon bi bi-patch-check-fill"></i>
                    <p>Inicio</p>
                  </a>
                </li> 
              @endcan   
              
              @can('admin.web.quienes')
                <li class="nav-item">
                  <a href="{{ route('admin.web.quienes') }}" class="nav-link">
                    <i class="nav-icon bi bi-patch-check-fill"></i>
                    <p>Quines</p>
                  </a>
                </li>
              @endcan      
              
              @can('admin.web.nosotros')
                <li class="nav-item">
                  <a href="{{ route('admin.web.nosotros') }}" class="nav-link">
                    <i class="nav-icon bi bi-patch-check-fill"></i>
                    <p>Nosotros</p>
                  </a>
                </li>    
              @endcan 
              
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>

