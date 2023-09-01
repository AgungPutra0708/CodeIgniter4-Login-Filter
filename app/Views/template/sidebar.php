<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #AEE8BE"> <!-- Sidebar Background-->
  <!-- Sidebar - Brand -->
  <!-- Garis Pemisah -->
  <hr class="sidebar-divider warnaijogaris mt-3">


  <!-- Heading Dashboard-->
  <div class="sidebar-heading warnaabu">
    Dashboard
  </div>
  <!-- Nav Item - Dashboard -->
  <?php 
    $name="Dashboard"; 
    if ($name == $title) {
      echo " <li class='nav-item active'>";
    }else{
      echo " <li class='nav-item'>";
    }
  ?>
  <a class="nav-link" href="<?= base_url('dashboard'); ?>">
    <i class="fas fa-home warnaabu"></i>
    <span class="warnaabu"><?= $name ?></span></a>
  </li>
    <!-- Heading User-->
    <div class="sidebar-heading warnaabu">
      USER
    </div>
    <?php 
    $name="User"; 
    if ($name == $title) {
      echo " <li class='nav-item active'>";
    }else{
      echo " <li class='nav-item'>";
    }
  ?>
    <a class="nav-link" href="<?= base_url('users'); ?>">
    <i class="fas fa-user warnaabu"></i>
    <span class="warnaabu"><?= $name ?></span></a>
  </li>
    <!-- Nav Item - Users -->
    <div class="sidebar-heading warnaabu">
      EMPLOYEE
    </div>
    <?php 
    $name="Employee"; 
    if ($name == $title) {
      echo " <li class='nav-item active'>";
    }else{
      echo " <li class='nav-item'>";
    }
  ?>
    <a class="nav-link" href="<?= base_url('employee'); ?>">
    <i class="fas fa-users warnaabu"></i>
    <span class="warnaabu"><?= $name ?></span></a>
  </li>
    <!-- Nav Item - Inventory -->
    <!-- Divider -->
    <hr class="sidebar-divider warnaijogaris">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-fw fa-sign-out-alt warnaabu"></i>
        <span class="warnaabu">Keluar</span>
      </a>
    </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->