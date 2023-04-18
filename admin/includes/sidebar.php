<aside class="main-sidebar sidebar-dark-olive elevation-4">
    <!-- Brand Logo -->
    <a href="../index.php" class="brand-link">
      
      <span class="brand-text font-weight-light">ICEMedical<span class="text-olive">Admin</span></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
            <a href="dashboard.php" class="nav-link <?php if($pg==1){echo 'active';}?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Dashboard
                </p>
            </a>
            </li>
            <li class="nav-item">
                <a href="clients.php" class="nav-link <?php if($pg==2){echo 'active';}?>">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                    Clients
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="orders.php" class="nav-link <?php if($pg==3){echo 'active';}?>">
                    <i class="nav-icon fas fa-briefcase"></i>
                    <p>
                    Orders
                    </p>
                </a>
            </li>
            
                    
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>