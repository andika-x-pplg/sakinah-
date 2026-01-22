<?php
include 'connect.php';
function query($q)
{
    global $db;
    return mysqli_query($db, $q);
}
function getSaldo(){
    global $db;
    $m = mysqli_fetch_assoc(mysqli_query($db, "SELECT SUM(jumlah) t FROM tabel_transaksi WHERE jenis='Masuk'"))['t'];
    $k = mysqli_fetch_assoc(mysqli_query($db, "SELECT SUM(jumlah) t FROM tabel_transaksi WHERE jenis='Keluar'"))['t'];
    return ($m??0) - ($k??0);
}
?>