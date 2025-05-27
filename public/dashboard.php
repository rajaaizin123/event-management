<?php 

include '../config/db.php'; 
include '../includes/functions.php';

if (!is_logged_in()){
  header("Location: login.php");
  exit;
}

$nama = $_SESSION['nama'];
$totalKegiatan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM kegiatan"))['total'];

include '../includes/header.php';

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Keluar <i class="fas fa-sign-out-alt"></i></a>
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
            <a href="kegiatan.php" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>Daftar Kegiatan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pendaftaran_saya.php" class="nav-link">
              <i class="nav-icon fas fa-check-circle"></i>
              <p>Kegiatan Saya</p>
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
        <h1 class="m-0">Selamat datang, <?= $nama ?></h1>
      </div>
    </div>
    <div class="content">
      <div class="container-fluid">
          <div class="row">
        <div class="col-md-3">
          <!-- Info Box 1 -->
          <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fas fa-calendar-alt"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Kegiatan Aktif</span>
              <span class="info-box-number"><?= $totalKegiatan ?></span>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <!-- Info Box 2 -->
          <div class="info-box">
            <span class="info-box-icon bg-primary"><i class="fas fa-check-circle"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Kegiatan Saya</span>
              <span class="info-box-number">5</span>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <!-- Info Box 3 -->
          <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="fas fa-certificate"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Sertifikat</span>
              <span class="info-box-number">2</span>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <!-- Info Box 4 -->
          <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="far fa-bell"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Notifikasi</span>
              <span class="info-box-number">3</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<?php include '../includes/footer.php'; ?>
