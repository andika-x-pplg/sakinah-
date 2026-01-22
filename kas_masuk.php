<?php 
include 'config/app.php';
if(isset($_POST['simpan'])){
    query("INSERT INTO tabel_transaksi VALUES(NULL,'$_POST[id_murid]','$_POST[tanggal]','Masuk','$_POST[jumlah]','Kas Masuk')");
}
$murid = query("SELECT * FROM tabel_murid");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kas Masuk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h3>Kas Masuk</h3>
    <form method="post">
        <select name="id_murid" class="form-control mb-2">
            <?php while($m=mysqli_fetch_assoc($murid)) : ?>
                <option value="<?= $m['id_murid']; ?>"><?= $m['nama']; ?></option>
            <?php endwhile; ?>
        </select>
        <input type="date" name="tanggal" class="form-control mb-2" required>
        <input type="number" name="jumlah" class="form-control mb-2" required>
        <button name="simpan" class="btn btn-success">Simpan</button>
        <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>