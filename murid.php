<?php
include 'config/app.php';

// INISIALISASI VARIABLE EDIT
$edit = false;

// SIMPAN DATA (CREATE)
if (isset($_POST['simpan'])) {
    query("INSERT INTO tabel_murid VALUES(
        NULL,
        '$_POST[nama]',
        '$_POST[kelas]',
        'Aktif'
    )");
}

// UPDATE DATA
if (isset($_POST['update'])) {
    query("UPDATE tabel_murid SET
        nama = '$_POST[nama]',
        kelas = '$_POST[kelas]',
        status = '$_POST[status]'
        WHERE id_murid = '$_POST[id_murid]'
    ");

    // TAMBAHKAN INI agar setelah update data langsung kembali ke halaman murid.php
    header('Location: murid.php');
    exit;
}

// HAPUS DATA
if (isset($_GET['hapus'])) {
    query("DELETE FROM tabel_murid WHERE id_murid = '$_GET[hapus]'");
}

// AMBIL DATA EDIT
if (isset($_GET['edit'])) {
    $edit = mysqli_fetch_assoc(
        query("SELECT * FROM tabel_murid WHERE id_murid = '$_GET[edit]'")
    );
}

// TAMPIL DATA
$data = query("SELECT * FROM tabel_murid");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Murid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">
    
    <h3>Data Murid</h3>

    <!-- FORM TAMBAH / EDIT -->
    <form method="POST" class="mb-3">
        <input type="hidden" name="id_murid" value="<?= $edit['id_murid'] ?? '' ?>">

        <input name="nama" class="form-control mb-2" 
            placeholder="Nama Murid"
            value="<?= $edit['nama'] ?? '' ?>" required>

        <input name="kelas" class="form-control mb-2"
            placeholder="Kelas"
            value="<?= $edit['kelas'] ?? '' ?>" required>

        <?php if ($edit) : ?>
            <select name="status" class="form-control mb-2">
                <option <?= $edit['status'] == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                <option <?= $edit['status'] == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
            </select>
            <button name="update" class="btn btn-warning">Update</button>
            <a href="murid.php" class="btn btn-secondary">Batal</a>
        <?php else : ?>
            <button name="simpan" class="btn btn-primary">Simpan</button>
        <?php endif; ?>
    </form>

    <!-- TABEL DATA -->
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php while ($m = mysqli_fetch_assoc($data)) : ?>
            <tr>
                <td><?= $m['nama'] ?></td>
                <td><?= $m['kelas'] ?></td>
                <td><?= $m['status'] ?></td>
                <td>
                    <a href="?edit=<?= $m['id_murid']; ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="?hapus=<?= $m['id_murid']; ?>" onclick="return confirm('Yakin Hapus Data Ini?')" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table> 
    <a href="dashboard.php" class="btn btn-secondary">Kembali ke Dashboard</a>
</body>
</html>