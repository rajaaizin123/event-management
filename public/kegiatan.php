<?php

include '../config/db.php';
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
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>Beranda</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kegiatan.php" class="nav-link active">
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

  <!-- Content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3 class="mb-4">Daftar Kegiatan Mahasiswa</h3>
        <div class="row">

        <?php
        $query = mysqli_query($conn, "SELECT * FROM kegiatan ORDER BY tanggal_mulai DESC");
        if (mysqli_num_rows($query) > 0):
          while ($data = mysqli_fetch_array($query)):
            $gambar = 'uploads/comp.jpg'; // Jika kamu punya kolom gambar, bisa ubah logikanya
        ?>
          <div class="col-md-4 mb-4">
            <div class="card h-100 shadow">
              <img src="<?= $gambar ?>" class="card-img-top" alt="Kegiatan" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5 class="fw-semibold"><?= htmlspecialchars($data['judul']) ?></h5>
                <p class="card-text">
                  <?= nl2br(htmlspecialchars(substr($data['deskripsi'], 0, 100))) ?>...
                </p>
                <p class="card-text small text-muted">
                  <i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($data['lokasi']) ?><br>
                  <i class="far fa-calendar-alt"></i> 
                  <?= date('d M Y', strtotime($data['tanggal_mulai'])) ?> - 
                  <?= date('d M Y', strtotime($data['tanggal_selesai'])) ?>
                </p>
              </div>
              <div class="card-footer text-end">
                <a href="detail_kegiatan.php?id=<?= $data['kegiatan_id'] ?>" class="btn btn-info">
                  Lihat Detail
                </a>
              </div>
            </div>
          </div>
        <?php 
          endwhile;
        else: 
        ?>
          <div class="col-12">
            <div class="alert alert-info text-center" role="alert">
              Belum ada kegiatan yang tersedia saat ini.
            </div>
          </div>
        <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

<?php include '../includes/footer.php'; ?>
