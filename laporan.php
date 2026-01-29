<?php
include 'config/app.php';
$data = query("SELECT * FROM tabel_transaksi");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h3>Laporan Kas</h3>
    <table class="table table-bordered">
        <tr>
            <th>Tanggal</th>
            <th>Jenis</th>
            <th>Jumlah</th>
        </tr>
        <?php while($d = mysqli_fetch_assoc($data)) : ?>
        <tr>
            <td><?= htmlspecialchars($d['tanggal']); ?></td>
            <td><?= htmlspecialchars($d['jenis']); ?></td>
            <td>Rp <?= number_format($d['jumlah']); ?></td>
        </tr>
        <?php endwhile; ?>
        </table>
    <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
</body>
</html>