<!DOCTYPE html>
<html>

<head>
    <title>Data Dosen</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class=" container mt-5">
        <h1 class="text-center mb-4">Politeknik Negeri Jember</h1>
        <h2 class="mb-4">Daftar Dosen</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>NIDN</th>
                        <th>Nama</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($dosen as $dsn): ?>
                        <tr>
                            <td><?= $dsn['nidn']; ?></td>
                            <td><?= $dsn['nama']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <a href="?url=mahasiswa" class="btn btn-primary">
            Data Mahasiswa
        </a>
    </div>
</body>

</html>