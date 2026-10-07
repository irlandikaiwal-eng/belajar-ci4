<?php
/**
 * Menampilkan pesan dari flashdata (library Session, materi Pertemuan 3):
 *   - 'pesan'    : notifikasi sukses  -> with('pesan', '...')
 *   - 'gagal'    : notifikasi gagal   -> with('gagal', '...')
 *   - 'validasi' : daftar error validasi -> with('validasi', $this->validator->getErrors())
 *
 * Flashdata = pesan sekali pakai: otomatis hilang setelah dibaca.
 */
?>
<?php if (session()->getFlashdata('pesan')): ?>
    <div class="alert alert-sukses">
        <?= esc(session()->getFlashdata('pesan')) ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('gagal')): ?>
    <div class="alert alert-gagal">
        <?= esc(session()->getFlashdata('gagal')) ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('validasi')): ?>
    <div class="alert alert-gagal">
        <strong>Periksa kembali isian berikut:</strong>
        <ul>
            <?php foreach ((array) session()->getFlashdata('validasi') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>