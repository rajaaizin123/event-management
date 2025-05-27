<?php
session_start();
include '../config/db.php';
include '../includes/header.php';

$user_id = $_SESSION['user_id'] ?? null;
if (!$user_id) {
  header("Location: login.php");
  exit;
}

$query = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$user_id'");
$user = mysqli_fetch_assoc($query);

// Ekstrak angkatan dari 2 digit awal NIM
$angkatan = substr($user['nim'], 0, 2);

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
            <a href="profile.php" class="nav-link active">
              <i class="nav-icon fas fa-user"></i>
              <p>Profil</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

<div class="content-wrapper">
  <!-- Content Header -->
  <section class="content-header">
    <div class="container-fluid">
      <h1>Profil Mahasiswa</h1>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- Profile Info -->
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="uploads/user2.jpg "
                     alt="User profile picture">
              </div>

              <h3 class="profile-username text-center"><?= htmlspecialchars($user['nama']) ?></h3>

              <p class="text-muted text-center">Teknik Informatika</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>NIM</b> <a class="float-right"><?= htmlspecialchars($user['nim']) ?></a>
                </li>
                 <li class="list-group-item">
                  <b>Angkatan</b> <a class="float-right">20<?= htmlspecialchars($angkatan) ?></a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Tabs (Activity / Timeline / Settings) -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-3 font-weight-semibold">
              <ul class="nav nav-pills">
                <li class="nav-item">Ubah Data Profile</li>
              </ul>
            </div><!-- /.card-header -->

            <div class="card-body">
                <!-- Settings Tab -->
                  <form class="form-horizontal" action="update_profile.php" method="POST">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="nama" value="<?= htmlspecialchars($user['nama']) ?>" placeholder="Nama lengkap">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" name="email" value="<?= htmlspecialchars($user['email']) ?>" placeholder="Email aktif">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputSkills" class="col-sm-2 col-form-label">Keahlian</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputSkills" name="skills" placeholder="Contoh: HTML, CSS, Java">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-2 col-form-label">Pengalaman</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="inputExperience" name="pengalaman" placeholder="Pengalaman organisasi atau proyek..."></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                      </div>
                    </div>
                  </form>
            </div><!-- /.card-body -->
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include '../includes/footer.php'; ?> <!-- Footer layout AdminLTE -->
