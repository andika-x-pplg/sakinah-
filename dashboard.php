<?php
session_start();
if (!isset($_SESSION['login'])) 
    header("Location: login.php");
include 'config/app.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h3>Dashboard (<?= $_SESSION['role']; ?>)</h3>
    <div class="alert alert-info">Saldo: Rp <?= number_format(getSaldo()); ?></div>
    <a href="status_pembayaran.php" class="btn btn-warning">Status Pembauyaran</a>

    <?php if($_SESSION['role'] == 'bendahara') : ?>
    <a href="murid.php" class="btn btn-primary">Data Murid</a>
    <a href="kas_masuk.php" class="btn btn-success">Kas Masuk</a>
        <a href="kas_keluar.php" class="btn btn-danger">Kas Keluar</a>
    <?php endif; ?>

        <a href="laporan.php" class="btn btn-secondary">Laporan</a>
        <a href="logout.php" class="btn btn-dark">Logout</a>
</body>

</html>