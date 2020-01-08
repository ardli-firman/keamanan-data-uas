<?php

use classes\Mahasiswa;

if (isset($_POST['addMahasiswa'])) {
    $MahasiswaAdd = new Mahasiswa($con);
    $MahasiswaAdd->nim = $_POST['nim'];
    $MahasiswaAdd->nama = $_POST['nama'];
    $MahasiswaAdd->tmp_lahir = $_POST['tmp_lahir'];
    $MahasiswaAdd->tgl_lahir = $_POST['tgl_lahir'];
    $MahasiswaAdd->alamat = $_POST['alamat'];
    $MahasiswaAdd->prodi = $_POST['prodi'];
    $res = $MahasiswaAdd->save('add');
    if ($res == true) {
        header("Location: /keamanan");
    }
}

?>

<form action="" method="POST">
    <label for="nim">NIM</label>
    <input type="text" name="nim" id="nim">
    <br>
    <label for="nama">Nama</label>
    <input type="text" name="nama" id="nama">
    <br>
    <label for="tmp_lahir">Tempat Lahir</label>
    <input type="text" name="tmp_lahir" id="tmp_lahir">
    <br>
    <label for="tgl_lahir">Tanggal Lahir</label>
    <input type="date" name="tgl_lahir" id="tgl_lahir">
    <br>
    <label for="alamat">Alamat</label>
    <textarea name="alamat" id="alamat" cols="30" rows="10"></textarea>
    <br>
    <label for="prodi">Prodi</label>
    <input type="text" name="prodi" id="prodi">
    <br>
    <button type="submit" name="addMahasiswa">Tambah</button>
</form>