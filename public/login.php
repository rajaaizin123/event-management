<?php 
include '../config/db.php'; 
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$pass'");
    $row = mysqli_fetch_assoc($result);

    $role = $row['role'];
    if ($row) {
        switch ($role) {
            case 'admin':
                $_SESSION['admin'] = $row['nama'];
                var_dump($_SESSION);
                header("Location: admin/dashboard_admin.php");
                break;
            
            case 'mahasiswa':
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['nama'] = $row['nama'];
                header("Location: dashboard.php");
                break;
            default:
                echo "Session tidak dikenali.\n";
                break;
        }
        //$_SESSION['user_id'] = $row['user_id'];
        //$_SESSION['nama'] = $row['nama'];
        //header("Location: dashboard.php");
        exit; // penting agar script berhenti setelah redirect
    } else {
        $error = "Login gagal. Coba lagi.";
    }
}
    include "../includes/header.php";
?>
<body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Login</b> Page</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Masukkan email dan password Anda</p>

                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>

                <form action="" method="POST">
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
                            <button type="submit" class="btn btn-primary btn-block w-100">Masuk</button>
                        </div>
                    </div>
                </form>

                <p class="mb-1 mt-3">
                    <a href="#">Lupa password?</a>
                </p>
                <p class="mb-0">
                    <a href="register.php" class="text-center">Daftar akun baru</a>
                </p>
            </div>
        </div>
    </div>

    <!-- AdminLTE + Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>