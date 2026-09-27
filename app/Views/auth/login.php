<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-danger">
        <div class="container">
            <span class="navbar-brand mb-0 h1">CI4 · Tugas MVC CRUD</span>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card shadow-sm" style="max-width: 400px; margin: 0 auto;">
            <div class="card-body">
                <h4 class="card-title mb-3 text-center">Login Admin</h4>

                <?php if (session()->getFlashdata('gagal')): ?>
                    <div class="alert alert-danger">
                        <?= esc(session()->getFlashdata('gagal')) ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('pesan')): ?>
                    <div class="alert alert-info">
                        <?= esc(session()->getFlashdata('pesan')) ?>
                    </div>
                <?php endif; ?>

                <form action="<?= site_url('login/proses') ?>" method="post">

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-danger w-100">Login</button>

                </form>
            </div>
        </div>
    </div>

</body>
</html>