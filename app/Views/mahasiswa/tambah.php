<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-danger">
        <div class="container">
            <span class="navbar-brand mb-0 h1">CI4 · Tugas MVC CRUD</span>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="card shadow-sm" style="max-width: 600px; margin: 0 auto;">
            <div class="card-body">
                <h4 class="card-title mb-1">Tambah Data Mahasiswa</h4>
                <p class="text-muted small mb-3">
                    Tugas Create — data akan disimpan lewat <code>insert()</code>
                </p>

                <?php if (session()->getFlashdata('validasi')): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php foreach (session()->getFlashdata('validasi') as $err): ?>
                                <li><?= esc($err) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form action="<?= site_url('mahasiswa/simpan') ?>" method="post">

                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input
                            type="text"
                            name="nim"
                            class="form-control"
                            value="<?= old('nim') ?>"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input
                            type="text"
                            name="nama"
                            class="form-control"
                            value="<?= old('nama') ?>"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea
                            name="alamat"
                            class="form-control"
                            rows="4"
                            required
                        ><?= old('alamat') ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-danger">Simpan</button>
                    <a href="<?= site_url('mahasiswa') ?>" class="btn btn-outline-secondary ms-2">
                        Batal
                    </a>

                </form>
            </div>
        </div>

        <p class="text-center text-muted small mt-4">
            Praktikum Pemrograman Web Berbasis Framework · Dibangun dengan CodeIgniter <?= \CodeIgniter\CodeIgniter::CI_VERSION ?>
        </p>
    </div>

</body>
</html>