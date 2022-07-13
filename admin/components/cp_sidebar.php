 <!-- Sidebar -->

 <?php include_once "scripts_php/sc_admin_check.php"; ?>

 <ul class="navbar-nav sidebar accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
         <div class="mx-3">Hortus Siccus</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="index.php">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Páginas
     </div>

     <?php
        if ($_SESSION["role"] == 2) { ?>

         <!-- Nav Item - Charts -->
         <li class="nav-item">
             <a class="nav-link" href="users.php">
                 <i class="fas fa-fw fa-chart-area"></i>
                 <span>Gerir Utilizadores</span></a>
         </li>

     <?php }
        ?>

     <!-- Nav Item - Tables -->
     <li class="nav-item">
         <a class="nav-link" href="eventos.php">
             <i class="fas fa-fw fa-table"></i>
             <span>Gerir Eventos</span></a>
     </li>

     <!-- Nav Item - Tables -->
     <li class="nav-item">
         <a class="nav-link" href="desafios.php">
             <i class="fas fa-fw fa-table"></i>
             <span>Gerir Desafios</span></a>
     </li>

     <!-- Nav Item - Tables -->
     <li class="nav-item">
         <a class="nav-link" href="desafios.php">
             <i class="fas fa-fw fa-table"></i>
             <span>Novo Registo</span></a>
     </li>
     
     <!-- Nav Item - Tables -->
     <li class="nav-item">
         <a class="nav-link" href="desafios.php">
             <i class="fas fa-fw fa-table"></i>
             <span>Gerir Registos</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->