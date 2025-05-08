<?php

include("presenter/ProsesMahasiswa.php");

// Instansiasi objek presenter
$proses = new ProsesMahasiswa();

// Periksa jenis action yang diterima
if (isset($_POST['action'])) {
    // Ambil data dari form
    $data = [
        'nim' => $_POST['nim'],
        'nama' => $_POST['nama'],
        'tempat' => $_POST['tempat'],
        'tl' => $_POST['tl'],
        'gender' => $_POST['gender'],
        'email' => $_POST['email'],
        'telepon' => $_POST['telepon']
    ];

    // Tentukan proses berdasarkan action
    if ($_POST['action'] == 'add') {
        // Proses tambah data
        $proses->tambahData($data);
    } elseif ($_POST['action'] == 'update' && isset($_POST['id'])) {
        // Proses update data
        $id = $_POST['id'];
        $proses->updateData($id, $data);
    }
}

// Redirect ke halaman utama
header("Location: index.php");
exit;
?>