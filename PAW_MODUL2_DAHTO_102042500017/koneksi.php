<?php
    $host = "localhost";
    $user = "root";
    $password = "2006Dahto0808";
    $database = "paw_modul2_showroom";

$conn = mysqli_connect('127.0.0.1', 'root', '2006Dahto0808', 'paw_modul2_showroom');
mysqli_set_charset($conn, 'utf8mb4');

if ($conn) {
    echo 'Koneksi berhasil.';
} else {
    echo 'Koneksi gagal.';
}
?>