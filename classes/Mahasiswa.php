<?php

namespace classes;

use PDO;
use PDOException;

class Mahasiswa
{
    private $con;
    public $id;
    public $nim;
    public $nama;
    public $tmp_lahir;
    public $tgl_lahir;
    public $alamat;
    public $prodi;
    // public $foto;

    public function __construct(PDO $con)
    {
        $this->con = $con;
    }

    public function getAllMahasiswa()
    {
        try {
            $res = $this->con->query("SELECT * FROM mahasiswa")->fetchAll();
            return $res;
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function getMahasiswaById()
    {
        try {
            $res = $this->con->query("SELECT * FROM mahasiswa WHERE id = '{$this->id}'")->fetch();
            return $this->doDecrypt($res);
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function save($do = 'save')
    {
        $this->doEncrypt();
        if ($do == 'save') {
            try {
                $result = $this->con->query("UPDATE `mahasiswa` SET `nim`='{$this->nim}',`nama`='{$this->nama}',`tmp_lahir`='{$this->tmp_lahir}',`tgl_lahir`='{$this->tgl_lahir}',`alamat`='{$this->alamat}',`prodi`='{$this->prodi}' WHERE id='{$this->id}'");
                return $result->execute();
            } catch (PDOException $th) {
                return $th->getMessage();
            }
        } else if ($do == 'add') {
            try {
                $query = "INSERT INTO `mahasiswa`(`nim`, `nama`, `tmp_lahir`, `tgl_lahir`, `alamat`, `prodi`) VALUES ('{$this->nim}','{$this->nama}','{$this->tmp_lahir}','{$this->tgl_lahir}','{$this->alamat}','{$this->prodi}')";
                $res = $this->con->query($query);
                return $res;
            } catch (PDOException $th) {
                return $th->getMessage();
            }
        }
    }

    public function delete()
    {
        try {
            $stmt = $this->con->query("DELETE FROM mahasiswa WHERE id = '{$this->id}'");
            return $stmt->execute();
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    public function doEncrypt()
    {
        foreach ($this as $key => $value) {
            if ($key != 'con' && $key != 'id') {
                $this->{$key} = base64_encode($value);
            }
        }
    }

    public function doDecrypt($res)
    {
        foreach ($res as $key => $value) {
            if ($key == 'id') {
                $this->{$key} = $value;
            } else {
                $this->{$key} = base64_decode($value);
            }
        }
        return $this;
    }
}
