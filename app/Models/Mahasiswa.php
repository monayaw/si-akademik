<?php

class Mahasiswa
{
    private $id;
    private $nim;
    private $nama;
    private $prodi;
    private $dosen_id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNim()
    {
        return $this->nim;
    }

    public function setNim($nim)
    {
        if (!is_numeric($nim)) {
            throw new Exception("NIM harus berupa angka.");
        }

        $this->nim = $nim;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function setNama($nama)
    {
        if (trim($nama) === '') {
            throw new Exception("Nama mahasiswa tidak boleh kosong.");
        }

        $this->nama = $nama;
    }

    public function getProdi()
    {
        return $this->prodi;
    }

    public function setProdi($prodi)
    {
        $this->prodi = $prodi;
    }

    public function getDosenId()
    {
        return $this->dosen_id;
    }

    public function setDosenId($dosen_id)
    {
        $this->dosen_id = $dosen_id;
    }
}