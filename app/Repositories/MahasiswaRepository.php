<?php

class MahasiswaRepository
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getAll()
    {
        $pdo = $this->database->getConnection();

        $sql = "SELECT mahasiswa.*, dosen.nama AS nama_dosen
                FROM mahasiswa
                LEFT JOIN dosen
                ON mahasiswa.dosen_id = dosen.id
                ORDER BY mahasiswa.nama ASC";

        $stmt = $pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByNim($nim)
    {
        $pdo = $this->database->getConnection();

        $stmt = $pdo->prepare(
            "SELECT mahasiswa.*, dosen.nama AS nama_dosen
             FROM mahasiswa
             LEFT JOIN dosen
             ON mahasiswa.dosen_id = dosen.id
             WHERE mahasiswa.nim = :nim"
        );

        $stmt->execute([
            'nim' => $nim
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(Mahasiswa $mahasiswa)
    {
        $pdo = $this->database->getConnection();

        $stmt = $pdo->prepare(
            "INSERT INTO mahasiswa
            (nim, nama, prodi, dosen_id)
            VALUES (:nim, :nama, :prodi, :dosen_id)"
        );

        return $stmt->execute([
            'nim' => $mahasiswa->getNim(),
            'nama' => $mahasiswa->getNama(),
            'prodi' => $mahasiswa->getProdi(),
            'dosen_id' => $mahasiswa->getDosenId()
        ]);
    }

    public function update(Mahasiswa $mahasiswa)
    {
        $pdo = $this->database->getConnection();

        $stmt = $pdo->prepare(
            "UPDATE mahasiswa
             SET nim = :nim,
                 nama = :nama,
                 prodi = :prodi,
                 dosen_id = :dosen_id
             WHERE id = :id"
        );

        return $stmt->execute([
            'id' => $mahasiswa->getId(),
            'nim' => $mahasiswa->getNim(),
            'nama' => $mahasiswa->getNama(),
            'prodi' => $mahasiswa->getProdi(),
            'dosen_id' => $mahasiswa->getDosenId()
        ]);
    }

    public function delete($id)
    {
        $pdo = $this->database->getConnection();

        $stmt = $pdo->prepare(
            "DELETE FROM mahasiswa WHERE id = :id"
        );

        return $stmt->execute([
            'id' => $id
        ]);
    }
}