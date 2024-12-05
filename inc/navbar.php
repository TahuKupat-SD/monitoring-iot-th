  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <?php if(!isset($_GET['page']) || $_GET['page'] == "dashboard"){ ?>
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link" id="status" style="color:red">Offline</a>
      </li>
      <?php } ?>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="https://www.instagram.com/arda_lcfn/" class="nav-link">Contact</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->