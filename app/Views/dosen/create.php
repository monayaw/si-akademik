<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Dosen</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h1 class="mb-4">Tambah Dosen</h1>

        <form action="/si-akademik/public/dosen/store" method="POST">

            <div class="mb-3">
                <label class="form-label">NIDN</label>

                <input type="text" name="nidn" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama</label>

                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Bidang Keahlian</label>

                <input type="text" name="bidang_keahlian" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">
                Simpan
            </button>

            <a href="/si-akademik/public/dosen" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</body>

</html>