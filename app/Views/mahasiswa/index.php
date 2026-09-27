<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-danger">
    <div class="container d-flex justify-content-between align-items-center">
        <span class="navbar-brand mb-0 h1">CI4 · Tugas MVC CRUD</span>
        <span class="text-white small">
            Halo, <?= esc(session()->get('username')) ?> —
            <a href="<?= site_url('logout') ?>" class="text-white">Logout</a>
        </span>
    </div>
    </nav>

    <div class="container mt-4">

        <?php if (session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success">
                <?= esc(session()->getFlashdata('pesan')) ?>
            </div>
        <?php endif; ?>

        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title mb-1">Biodata Mahasiswa</h4>
                <p class="text-muted small mb-3">
                    CRUD lengkap — <code>findAll()</code>, <code>insert()</code>, <code>update()</code>, <code>delete()</code>
                </p>

                <a href="<?= site_url('mahasiswa/tambah') ?>" class="btn btn-danger mb-3">
                    + Tambah Data
                </a>
                <span class="text-muted small ms-2">
                    Jumlah data: <?= count($mahasiswa) ?> baris
                </span>

                <table class="table table-bordered table-hover align-middle mt-2">
                    <thead class="table-light">
                        <tr>
                            <th width="60">No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th width="160">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($mahasiswa as $row): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($row['nim']) ?></td>
                            <td><?= esc($row['nama']) ?></td>
                            <td><?= esc($row['alamat']) ?></td>
                            <td>
                                <a href="<?= site_url('mahasiswa/edit/' . $row['id']) ?>" class="btn btn-sm btn-dark">
                                    Edit
                                </a>
                                <a
                                    href="<?= site_url('mahasiswa/hapus/' . $row['id']) ?>"
                                    class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Yakin hapus data ini?')"
                                >
                                    Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <p class="text-center text-muted small mt-4">
            Praktikum Pemrograman Web Berbasis Framework · Dibangun dengan CodeIgniter <?= \CodeIgniter\CodeIgniter::CI_VERSION ?>
        </p>

    </div>

</body>
</html>