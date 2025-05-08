<?php

include("view/TampilMahasiswa.php");

// Check if there's a delete request
if (isset($_GET['id_hapus'])) {
    $proses = new ProsesMahasiswa();
    $proses->hapusData($_GET['id_hapus']);
    // Redirect to prevent resubmission
    header("Location: index.php");
    exit;
}

$tp = new TampilMahasiswa();
$data = $tp->tampil();
?>