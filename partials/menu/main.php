<!-- Ini menu Main -->
<?php

use classes\Mahasiswa;

$mahasiswas = $Mahasiswa->getAllMahasiswa();

if (@$_GET['aksi'] == 'hapus' && isset($_GET['id'])) {
    $MahasiswaDelete = new Mahasiswa($con);
    $MahasiswaDelete->id = $_GET['id'];
    $res = $MahasiswaDelete->delete();
    if ($res == true) {
        header("Location: /keamanan");
    }
}

?>
<a href="?menu=tambah">Tambah mahasiswa</a>
<table>
    <thead>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Tempat Lahir</th>
        <th>Tgl Lahir</th>
        <th>Alamat</th>
        <th>Prodi</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        <?php $i = 0;
        foreach ($mahasiswas as $mahasiswa) : ?>
            <tr>
                <td><?= $i -= -1 ?></td>
                <td><?= $mahasiswa->nim ?></td>
                <td><?= $mahasiswa->nama ?></td>
                <td><?= $mahasiswa->tmp_lahir ?></td>
                <td><?= $mahasiswa->tgl_lahir ?></td>
                <td><?= $mahasiswa->alamat ?></td>
                <td><?= $mahasiswa->prodi ?></td>
                <td>
                    <a href="?menu=edit&id=<?= $mahasiswa->id ?>">Edit</a> |
                    <a href="?aksi=hapus&id=<?= $mahasiswa->id ?>">Hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>