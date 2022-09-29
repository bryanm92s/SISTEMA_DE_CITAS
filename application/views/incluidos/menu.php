<?php
/*
Este include contiene el menu lateral de todo el proyecto
*/
?>
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('principal');?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-clinic-medical"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo $titulo?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('principal');?>">
          <i class="fas fa-home"></i>
          <span>Inicio</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Menú de opciones
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Maestros</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">

            <!--Llamamos los controles-->



            <a class="collapse-item" href="<?php echo site_url('medicos');?>"><i class="fas fa-user-md"></i> Médicos</a>

            <a class="collapse-item" href="<?php echo site_url('ciudades');?>"><i class="fas fa-city"></i> Ciudades</a>

            <a class="collapse-item" href="<?php echo site_url('medicamentos');?>"><i class="fas fa-pills"></i> Medicamentos</a>

            <a class="collapse-item" href="<?php echo site_url('diagnosticos');?>"><i class="fas fa-stethoscope"></i> Diagnósticos</a>


            <a class="collapse-item" href="<?php echo site_url('presentacionesmedicamentos');?>">Presentacion medicamentos</a>

            <a class="collapse-item" href="<?php echo site_url('marcasmedicamentos');?>">Marcas de medicamentos</a>
            <a class="collapse-item" href="<?php echo site_url('profesiones');?>">Profesiones</a>
            <a class="collapse-item" href="<?php echo site_url('motivosconsulta');?>">Motivos de consulta</a>
            <a class="collapse-item" href="<?php echo site_url('especialidades');?>">Especialidades</a>

            
<!--
            <a class="collapse-item" href="<?php echo site_url('tiposdeclientes');?>">Tipos de clientes</a>
            <a class="collapse-item" href="<?php echo site_url('tiposdeusuarios');?>">Tipos de usuarios</a>
            <a class="collapse-item" href="<?php echo site_url('categoriasproductos');?>">Categorias de productos</a>

            <a class="collapse-item" href="<?php echo site_url('marcasproductos');?>">Marcas de productos</a>
            <a class="collapse-item" href="<?php echo site_url('presentacionesproductos');?>">Presentaciones de productos</a>

-->



          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-list"></i>
          <span>Informes</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">

            <a class="collapse-item" href="<?php echo site_url('citas');?>"><i class="fas fa-calendar-day"></i> Citas</a>

            <a class="collapse-item" href="<?php echo site_url('pacientes');?>"><i class="fas fa-user-injured"></i> Pacientes</a>

            <a class="collapse-item" href="<?php echo site_url('formulas');?>"><i class="fas fa-prescription-bottle-alt"></i> Fórmulas</a>


            <a class="collapse-item" href="<?php echo site_url('historiaclinica');?>"><i class="fas fa-clipboard-list"></i> Historia clínica</a>


            
            <!--<a class="collapse-item" href="<?php echo site_url('usuarios');?>"><i class="fas fa-user-friends"></i> Usuarios</a>-->

            <!--
            <a class="collapse-item" href="<?php echo site_url('clientes');?>">Clientes</a>
            <a class="collapse-item" href="<?php echo site_url('productos');?>">Productos</a>-->

          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
<!--       <div class="sidebar-heading">
        Addons
      </div>
 -->
      <!-- Nav Item - Pages Collapse Menu -->
     <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pedidos</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo site_url('pedidos/nuevo/');?>">Nuevo</a>
            <a class="collapse-item" href="<?php echo site_url('pedidos/listado/');?>">Listado</a>
          </div>
        </div>
      </li>-->

      <!-- Nav Item - Charts -->
<!--       <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>

      Nav Item - Tables
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>

 -->      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
