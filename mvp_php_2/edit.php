<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include("view/KontrakView.php");
include("presenter/ProsesMahasiswa.php");

class EditMahasiswa implements KontrakView
{
    private $prosesmahasiswa; // Presenter yang dapat berinteraksi langsung dengan view
    private $tpl;
    private $data;
    private $id;

    function __construct($id)
    {
        //konstruktor
        $this->prosesmahasiswa = new ProsesMahasiswa();
        $this->id = $id;
        
        // Ambil data mahasiswa berdasarkan ID
        $this->data = $this->prosesmahasiswa->getDataById($this->id);
    }

    function tampil()
    {
        // Membaca template form.html
        $this->tpl = new Template("templates/form.html");
        
        // Set judul form
        $this->tpl->replace("DATA_JUDUL", "Edit Data Mahasiswa");
        
        // Set nilai form untuk mode edit
        $this->tpl->replace("DATA_ID", $this->id);
        $this->tpl->replace("DATA_NIM", $this->data['nim']);
        $this->tpl->replace("DATA_NAMA", $this->data['nama']);
        $this->tpl->replace("DATA_TEMPAT", $this->data['tempat']);
        $this->tpl->replace("DATA_TL", $this->data['tl']);
        
        // Set radio button gender
        $laki = ($this->data['gender'] == 'Laki-laki') ? 'checked' : '';
        $perempuan = ($this->data['gender'] == 'Perempuan') ? 'checked' : '';
        $this->tpl->replace("DATA_LAKI", $laki);
        $this->tpl->replace("DATA_PEREMPUAN", $perempuan);
        
        $this->tpl->replace("DATA_EMAIL", $this->data['email']);
        $this->tpl->replace("DATA_TELP", $this->data['telepon']);
        $this->tpl->replace("DATA_ACTION", "update");

        // Menampilkan ke layar
        $this->tpl->write();
    }
}

// Validasi ID parameter
if (isset($_GET['id'])) {
    $form = new EditMahasiswa($_GET['id']);
    $form->tampil();
} else {
    // Redirect ke halaman utama jika tidak ada ID
    header("Location: index.php");
    exit;
}
?>