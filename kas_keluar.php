<?php 
include 'config/app.php';
if(isset($_POST['simpan'])){
    if($_POST['jumlah'] <= getSaldo()){
        query("INSERT INTO tabel_transaksi VALUES(NULL,NULL,'$_POST[tanggal]','Keluar','$_POST[jumlah]','Kas Keluar')");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kas Keluar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h3>Kas Keluar</h3>
    <form method="post">
        <input type="date" name="tanggal" class="form-control mb-2" required>
        <input type="number" name="jumlah" class="form-control mb-2" required>
        <button type="submit" name="simpan" class="btn btn-danger">Simpan</button>
        <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>