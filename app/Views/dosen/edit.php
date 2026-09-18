<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Dosen</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h1 class="text-center mb-4">Politeknik Negeri Jember</h1>

        <h2 class="mb-4">Edit Data Dosen</h2>

        <form action="/si-akademik/public/dosen/update?id=<?= $dosen['id']; ?>" method="POST">

            <div class="mb-3">
                <label class="form-label">NIDN</label>
                <input
                    type="text"
                    name="nidn"
                    class="form-control"
                    value="<?= htmlspecialchars($dosen['nidn']); ?>"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input
                    type="text"
                    name="nama"
                    class="form-control"
                    value="<?= htmlspecialchars($dosen['nama']); ?>"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Bidang Keahlian</label>
                <input
                    type="text"
                    name="bidang_keahlian"
                    class="form-control"
                    value="<?= htmlspecialchars($dosen['bidang_keahlian']); ?>"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>

            <a href="/si-akademik/public/dosen" class="btn btn-secondary">
                Batal
            </a>

        </form>

    </div>

</body>

</html>