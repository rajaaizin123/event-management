<?php 

include '../../config/db.php'; 
include '../../includes/functions.php';

if (!is_admin()){
  header("Location: ../login.php");
  exit;
}

$nama = $_SESSION['admin'];

include '../../includes/header.php';

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">Keluar <i class="fas fa-sign-out-alt"></i></a>
      </li>
    </ul>
  </nav>

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      <i class="ml-3 fas fa-university elevation-1"></i>
      <span class="brand-text font-weight-semibold">Kegiatan Kampus</span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>Beranda</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="peserta.php" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>Peserta</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="profile.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Profil</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h1 class="m-0">Selamat datang, Admin <?= $nama ?></h1>
      </div>
    </div>
  </div>

</div>

<?php include '../../includes/footer.php'; ?>
