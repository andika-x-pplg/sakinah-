<?php
session_start();
include 'config/app.php';
$kas_wajib = 20000;

$q = query("SELECT tabel_murid.id_murid, nama, IFNULL(SUM(jumlah),0) as total 
            FROM tabel_murid
            LEFT JOIN tabel_transaksi 
              ON tabel_murid.id_murid = tabel_transaksi.id_murid
              AND jenis='Masuk' 
              AND MONTH(tanggal) = MONTH(CURDATE())
            GROUP BY tabel_murid.id_murid");

if (!$q) {
    die("Query error: " . mysqli_error($db));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Status Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h3>Status Pembayaran Bulanan</h3>
    <table class="table table-bordered">
        <tr>
            <th>Nama Murid</th>
            <th>Total Bayar</th>
            <th>Status</th>
        </tr>
        <?php while($m = mysqli_fetch_assoc($q)): 
            if ($m['total'] == 0) { $s = "Belum Bayar"; $w = "danger"; }
            elseif ($m['total'] < $kas_wajib) { $s = "Sebagian"; $w = "warning"; }
            else { $s = "Lunas"; $w = "success"; }
        ?>
        <tr>
            <td><?= htmlspecialchars($m['nama']); ?></td>
            <td>Rp <?= number_format($m['total']); ?></td>
            <td><span class="badge bg-<?= $w; ?>"><?= $s; ?></span></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
