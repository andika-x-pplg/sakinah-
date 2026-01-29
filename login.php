<?php
session_start();
include 'config/connect.php';
if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = $_POST['password'];
    $q = mysqli_query($db, "SELECT * FROM user WHERE username='$u' AND password='$p'");
    if(mysqli_num_rows($q) == 1){
        $d = mysqli_fetch_assoc($q);
        $_SESSION['login'] =true;
        $_SESSION['role']=$d['role'];
        header("Location:dashboard.php");
        exit();
    } else {
        $error = true;
    }    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <form method="post" class="border p-4 rounded">
        <h4>Login Kas Kelas</h4>
        <?php if(isset($error)) : ?>
            <div class="alert alert-danger">Login gagal</div>
        <?php endif; ?>
        <input name="username" class="form-control mb-2" placeholder="Username" required>
        <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
        <button name="login" class="btn btn-primary w-100">Login</button>
    </form>
</body>
</html>
