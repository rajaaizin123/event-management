<?php
session_start();
include '../config/db.php';
include '../includes/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST['nama']);
    $nim = trim($_POST['nim']);
    $email = trim($_POST['email']);
    $pass = $_POST['password'];

    $stmt = $conn->prepare("INSERT INTO users (nama, nim, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama, $nim, $email, $pass);
    $result = $stmt->execute();

    if ($result) {
        header("Location: login.php");
        exit;
    } else {
        $error = "Daftar gagal. Coba lagi.";
    }
}
?>
<body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Daftar</b> Page</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan daftar akun baru</p>

                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>

                <form action="" method="POST">
                  <div class="input-group mb-3">
                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" />
                    <div class="input-group-text"><span class="bi bi-person"></span></div>
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" name="nim" class="form-control" placeholder="NIM" />
                    <div class="input-group-text"><span class="bi bi-person"></span></div>
                  </div>
                  <div class="input-group mb-3">
                      <input type="email" name="email" class="form-control" placeholder="Email" required>
                      <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                  </div>
                  <div class="input-group mb-3">
                      <input type="password" name="password" class="form-control" placeholder="Password" required>
                      <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                  </div>
                  <div class="row">
                      <div class="col-8">
                          <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="remember">
                              <label class="form-check-label" for="remember">Ingat Saya</label>
                          </div>
                      </div>
                      <div class="col-4">
                          <button type="submit" class="btn btn-primary btn-block w-100">Daftar</button>
                      </div>
                  </div>
                </form>

                <p class="mb-0">
                    <a href="login.php" class="text-center">Sudah punya akun</a>
                </p>
            </div>
        </div>
    </div>

    <!-- AdminLTE + Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

