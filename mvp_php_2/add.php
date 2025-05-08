<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include("view/KontrakView.php");
include("presenter/ProsesMahasiswa.php");

class TambahMahasiswa implements KontrakView
{
    private $prosesmahasiswa; // Presenter yang dapat berinteraksi langsung dengan view
    private $tpl;

    function __construct()
    {
        //konstruktor
        $this->prosesmahasiswa = new ProsesMahasiswa();
    }

    function tampil()
    {
        // Membaca template form.html
        $this->tpl = new Template("templates/form.html");
        
        // Set judul form
        $this->tpl->replace("DATA_JUDUL", "Tambah Data Mahasiswa");
        
        // Mode tambah data
        $this->tpl->replace("DATA_ID", "");
        $this->tpl->replace("DATA_NIM", "");
        $this->tpl->replace("DATA_NAMA", "");
        $this->tpl->replace("DATA_TEMPAT", "");
        $this->tpl->replace("DATA_TL", "");
        $this->tpl->replace("DATA_LAKI", "");
        $this->tpl->replace("DATA_PEREMPUAN", "");
        $this->tpl->replace("DATA_EMAIL", "");
        $this->tpl->replace("DATA_TELP", "");
        $this->tpl->replace("DATA_ACTION", "add");

        // Menampilkan ke layar
        $this->tpl->write();
    }
}

$form = new TambahMahasiswa();
$form->tampil();
?>