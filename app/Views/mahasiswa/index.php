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

        <h1 class="text-center mb-4">Politeknik Negeri Jember</h1>

        <h2 class="mb-4">Daftar Mahasiswa</h2>

        <div class="table-responsive">

            <table class="table table-bordered table-striped">

                <thead class="table-dark">
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Program Studi</th>
                        <th>Dosen Pembimbing</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($mahasiswa as $mhs): ?>

                        <tr>

                            <td>
                                <?= htmlspecialchars($mhs['nim']); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($mhs['nama']); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($mhs['prodi']); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($mhs['nama_dosen'] ?? 'Belum ada dosen'); ?>
                            </td>

                            <td>
                                <a href="/si-akademik/public/mahasiswa/detail?nim=<?= $mhs['nim']; ?>"
                                    class="btn btn-primary btn-sm">
                                    Detail
                                </a>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>
</body>

</html>