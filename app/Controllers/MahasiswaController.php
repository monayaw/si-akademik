<?php

require_once __DIR__ . '/../Models/Mahasiswa.php';
require_once __DIR__ . '/../Repositories/MahasiswaRepository.php';

class MahasiswaController
{
    private $repository;

    public function __construct(MahasiswaRepository $repository)
    {
        $this->repository = $repository;
    }

    // Tampil data
    public function index()
    {
        $mahasiswa = $this->repository->getAll();

        require_once __DIR__ . '/../Views/mahasiswa/index.php';
    }

    // Detail data
    public function detail()
    {
        $nim = $_GET['nim'] ?? '';

        $mahasiswa = $this->repository->getByNim($nim);

        require_once __DIR__ . '/../Views/mahasiswa/detail.php';
    }

    // Tambah data
    public function store()
    {
        try {

            $mahasiswa = new Mahasiswa();

            $mahasiswa->setNim($_POST['nim']);
            $mahasiswa->setNama($_POST['nama']);
            $mahasiswa->setProdi($_POST['prodi']);
            $mahasiswa->setDosenId($_POST['dosen_id'] ?? null);

            $this->repository->create($mahasiswa);

            header('Location: /si-akademik/public/mahasiswa');
            exit;

        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }

    // Ubah data
    public function update()
    {
        try {

            $mahasiswa = new Mahasiswa();

            $mahasiswa->setId($_POST['id']);
            $mahasiswa->setNim($_POST['nim']);
            $mahasiswa->setNama($_POST['nama']);
            $mahasiswa->setProdi($_POST['prodi']);
            $mahasiswa->setDosenId($_POST['dosen_id'] ?? null);

            $this->repository->update($mahasiswa);

            header('Location: /si-akademik/public/mahasiswa');
            exit;

        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }

    // Hapus data
    public function delete()
    {
        $id = $_GET['id'] ?? null;

        $this->repository->delete($id);

        header('Location: /si-akademik/public/mahasiswa');
        exit;
    }
}