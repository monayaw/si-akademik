<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2 class="mb-0">Detail Mahasiswa</h2>
            </div>
            <div class="card-body">
                <p>
                    <strong>NIM:</strong>
                    <?= $mahasiswa['nim']; ?>
                </p>

                <p>
                    <strong>Nama:</strong>
                    <?= $mahasiswa['nama']; ?>
                </p>
                <p>
                    <strong>Program Studi:</strong>
                    <?= $mahasiswa['prodi']; ?>
                </p>

                <a href="si-akademik/public/mahasiswa" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</body>

</html>