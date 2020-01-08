<?php
@$id = $_GET['id'];

use classes\Mahasiswa;

$MahasiswaEditView = new Mahasiswa($con);
$MahasiswaEditView->id = $id;
$mahasiswa = $MahasiswaEditView->getMahasiswaById();

if (isset($_POST['editMahasiswa'])) {
    $MahasiswaEdit = new Mahasiswa($con);
    $MahasiswaEdit->id = $_POST['id'];
    $MahasiswaEdit->nim = $_POST['nim'];
    $MahasiswaEdit->nama = $_POST['nama'];
    $MahasiswaEdit->tmp_lahir = $_POST['tmp_lahir'];
    $MahasiswaEdit->tgl_lahir = $_POST['tgl_lahir'];
    $MahasiswaEdit->alamat = $_POST['alamat'];
    $MahasiswaEdit->prodi = $_POST['prodi'];
    $res = $MahasiswaEdit->save();
    if ($res == true) {
        header("Location: /keamanan");
    }
}

?>

<form action="" method="POST">
    <input type="hidden" name="id" value="<?= $mahasiswa->id ?>">
    <label for="nim">nim</label>
    <input type="text" name="nim" value="<?= $mahasiswa->nim ?>">
    <br>
    <label for="nama">Nama</label>
    <input type="text" name="nama" id="nama" value="<?= $mahasiswa->nama ?>">
    <br>
    <label for="tmp_lahir">Tempat Lahir</label>
    <input type="text" name="tmp_lahir" id="tmp_lahir" value="<?= $mahasiswa->tmp_lahir ?>">
    <br>
    <label for="tgl_lahir">Tanggal Lahir</label>
    <input type="date" name="tgl_lahir" id="tgl_lahir" value="<?= $mahasiswa->tgl_lahir ?>">
    <br>
    <label for="alamat">Alamat</label>
    <textarea name="alamat" id="alamat" cols="30" rows="10"><?= $mahasiswa->alamat ?></textarea>
    <br>
    <label for="prodi">Prodi</label>
    <input type="text" name="prodi" id="prodi" value="<?= $mahasiswa->prodi ?>">
    <br>
    <button type="submit" name="editMahasiswa">Edit</button>
</form>