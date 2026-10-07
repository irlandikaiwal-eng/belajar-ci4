<?= view('layout/header') ?>

<h1><?= esc($judul) ?></h1>
<p class="subjudul"><?= esc($subjudul) ?></p>
<p>
    <strong>Nama:</strong> <?= esc($identitas['nama']) ?><br>
    <strong>NIM:</strong> <?= esc($identitas['nim']) ?>
</p>

<?php // ------------------------------------------------------------------
      // RINGKASAN PROGRES — dihitung dari data backlog di controller
      // ------------------------------------------------------------------ ?>
<div class="card">
    <h2 style="margin-top:0">Ringkasan Backlog</h2>
    <p>
        <strong><?= esc($ringkasan['selesai']) ?></strong> dari
        <strong><?= esc($ringkasan['total']) ?></strong> item backlog sudah <em>Done</em>
        (<?= esc($ringkasan['progress']) ?>%).
    </p>
    <div class="progres-wrap">
        <div class="progres-bar" style="width: <?= esc($ringkasan['progress']) ?>%"></div>
    </div>
    <table style="margin-top:14px">
        <tr>
            <th>Prioritas</th><th>Arti</th><th>Jumlah item</th>
        </tr>
        <tr>
            <td><span class="badge badge-p0">P0</span></td>
            <td>Wajib — produk tidak berguna bila belum ada (login, CRUD)</td>
            <td><?= esc($ringkasan['p0']) ?></td>
        </tr>
        <tr>
            <td><span class="badge badge-p1">P1</span></td>
            <td>Penting — menambah nilai, dikerjakan setelah P0</td>
            <td><?= esc($ringkasan['p1']) ?></td>
        </tr>
        <tr>
            <td><span class="badge badge-p2">P2</span></td>
            <td>Nice-to-have — dikerjakan bila sprint masih longgar</td>
            <td><?= esc($ringkasan['p2']) ?></td>
        </tr>
    </table>
</div>

<?php // ------------------------------------------------------------------
      // PERAN
      // ------------------------------------------------------------------ ?>
<div class="card">
    <h2 style="margin-top:0">Tiga Peran dalam SCRUM</h2>
    <table>
        <tr><th style="width:22%">Peran</th><th>Tanggung jawab</th><th style="width:28%">Anggota tim (isi sendiri)</th></tr>
        <?php foreach ($peran as $p): ?>
            <tr>
                <td><strong><?= esc($p['peran']) ?></strong></td>
                <td><?= esc($p['tugas']) ?></td>
                <td><?= esc($p['anggota']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p class="hint">
        Di proyek kuliah satu orang boleh merangkap peran, tetapi tuliskan dengan jelas siapa memegang peran apa.
    </p>
</div>

<?php // ------------------------------------------------------------------
      // PRODUCT BACKLOG
      // ------------------------------------------------------------------ ?>
<div class="card">
    <h2 style="margin-top:0">1. Product Backlog (dokumen hidup)</h2>
    <p class="hint">
        Format user story: <em>Sebagai &lt;peran&gt;, saya ingin &lt;fitur&gt;, agar &lt;manfaat&gt;</em> ·
        Estimasi: S (&le; 1 hari), M (2-3 hari), L (seminggu+ &rarr; pecah lagi).
    </p>
    <table>
        <tr>
            <th style="width:70px">ID</th>
            <th>User Story</th>
            <th style="width:80px">Prioritas</th>
            <th style="width:80px">Estimasi</th>
            <th style="width:80px">Sprint</th>
            <th style="width:80px">Status</th>
            <th style="width:28%">Bukti / implementasi</th>
        </tr>
        <?php foreach ($backlog as $item): ?>
            <tr>
                <td><strong><?= esc($item['id']) ?></strong></td>
                <td><?= esc($item['story']) ?></td>
                <td><span class="badge badge-<?= esc(strtolower($item['prioritas'])) ?>"><?= esc($item['prioritas']) ?></span></td>
                <td><?= esc($item['estimasi']) ?></td>
                <td><?= $item['sprint'] ? 'Sprint ' . esc($item['sprint']) : '<span class="hint">belum</span>' ?></td>
                <td><span class="status status-<?= $item['status'] === 'Done' ? 'done' : 'todo' ?>"><?= esc($item['status']) ?></span></td>
                <td class="hint"><?= esc($item['bukti']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php // ------------------------------------------------------------------
      // SPRINT BACKLOG
      // ------------------------------------------------------------------ ?>
<div class="card">
    <h2 style="margin-top:0">2. Sprint Backlog — <?= esc($sprint['nama']) ?></h2>
    <table>
        <tr><th style="width:22%">Periode</th><td><?= esc($sprint['periode']) ?></td></tr>
        <tr><th>Tujuan Sprint</th><td><strong><?= esc($sprint['tujuan']) ?></strong></td></tr>
        <tr><th>Jumlah item</th><td><?= esc(count($sprintKe1)) ?> item dipilih dari Product Backlog</td></tr>
    </table>
    <table style="margin-top:14px">
        <tr><th style="width:70px">ID</th><th>Item yang dikerjakan Sprint ini</th><th style="width:80px">Prioritas</th><th style="width:80px">Estimasi</th></tr>
        <?php foreach ($sprintKe1 as $item): ?>
            <tr>
                <td><strong><?= esc($item['id']) ?></strong></td>
                <td><?= esc($item['story']) ?></td>
                <td><span class="badge badge-<?= esc(strtolower($item['prioritas'])) ?>"><?= esc($item['prioritas']) ?></span></td>
                <td><?= esc($item['estimasi']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p class="hint">Sprint Backlog tidak diubah selama Sprint berjalan; perubahan kebutuhan masuk ke Product Backlog.</p>
</div>

<?php // ------------------------------------------------------------------
      // PAPAN SPRINT
      // ------------------------------------------------------------------ ?>
<div class="card">
    <h2 style="margin-top:0">Papan Sprint (To Do | In Progress | Done)</h2>
    <div class="papan">
        <div class="kolom kolom-todo">
            <h3>To Do (<?= esc(count($papan['todo'])) ?>)</h3>
            <?php if (empty($papan['todo'])): ?>
                <p class="hint">Tidak ada item tersisa.</p>
            <?php else: ?>
                <?php foreach ($papan['todo'] as $kartu): ?>
                    <div class="kartu-item"><strong><?= esc($kartu['id']) ?></strong><br><?= esc($kartu['teks']) ?></div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="kolom kolom-progress">
            <h3>In Progress (<?= esc(count($papan['progress'])) ?>)</h3>
            <?php if (empty($papan['progress'])): ?>
                <p class="hint">Tidak ada item yang sedang dikerjakan.</p>
            <?php else: ?>
                <?php foreach ($papan['progress'] as $kartu): ?>
                    <div class="kartu-item"><strong><?= esc($kartu['id']) ?></strong><br><?= esc($kartu['teks']) ?></div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="kolom kolom-done">
            <h3>Done (<?= esc(count($papan['done'])) ?>)</h3>
            <?php foreach ($papan['done'] as $kartu): ?>
                <div class="kartu-item"><strong><?= esc($kartu['id']) ?></strong><br><?= esc($kartu['teks']) ?></div>
            <?php endforeach; ?>
        </div>
    </div>
    <p class="hint">Papan boleh dibuat di Trello, GitLab Board, atau spreadsheet — yang penting transparan dan diperbarui harian.</p>
</div>

<?php // ------------------------------------------------------------------
      // DEFINITION OF DONE
      // ------------------------------------------------------------------ ?>
<div class="card">
    <h2 style="margin-top:0">Definition of Done (DoD) — kesepakatan tim</h2>
    <ol>
        <?php foreach ($dod as $kriteria): ?>
            <li><?= esc($kriteria) ?></li>
        <?php endforeach; ?>
    </ol>
</div>

<?php // ------------------------------------------------------------------
      // EVENT SCRUM
      // ------------------------------------------------------------------ ?>
<div class="card">
    <h2 style="margin-top:0">Empat Event SCRUM</h2>
    <table>
        <tr><th style="width:22%">Event</th><th style="width:26%">Waktu</th><th>Keluaran</th></tr>
        <?php foreach ($event as $e): ?>
            <tr>
                <td><strong><?= esc($e['event']) ?></strong></td>
                <td><?= esc($e['waktu']) ?></td>
                <td><?= esc($e['keluaran']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php // ------------------------------------------------------------------
      // REVIEW & RETROSPEKTIF
      // ------------------------------------------------------------------ ?>
<div class="card">
    <h2 style="margin-top:0">Sprint Review &amp; Retrospective — contoh terisi</h2>

    <h3>Sprint Review</h3>
    <ul>
        <?php foreach ($catatan['review'] as $baris): ?>
            <li><?= esc($baris) ?></li>
        <?php endforeach; ?>
    </ul>

    <h3>Sprint Retrospective</h3>
    <table>
        <tr><th style="width:22%">Start</th><td><ul style="margin:0 0 0 18px"><?php foreach ($catatan['retro']['start'] as $r): ?><li><?= esc($r) ?></li><?php endforeach; ?></ul></td></tr>
        <tr><th>Stop</th><td><ul style="margin:0 0 0 18px"><?php foreach ($catatan['retro']['stop'] as $r): ?><li><?= esc($r) ?></li><?php endforeach; ?></ul></td></tr>
        <tr><th>Continue</th><td><ul style="margin:0 0 0 18px"><?php foreach ($catatan['retro']['continue'] as $r): ?><li><?= esc($r) ?></li><?php endforeach; ?></ul></td></tr>
    </table>
</div>

<?php // ------------------------------------------------------------------
      // PETUNJUK TUGAS
      // ------------------------------------------------------------------ ?>
<div class="card">
    <h2 style="margin-top:0">Tugas Latihan 4 (Post Test 2.1)</h2>
    <ol>
        <li>Buka <code>app/Controllers/Scrum.php</code>.</li>
        <li>Ganti <strong>Product Backlog</strong> dengan minimal 8 user story proyek Anda sendiri (ID, cerita, prioritas P0/P1/P2, estimasi S/M/L).</li>
        <li>Pilih 3-5 item untuk Sprint 1, isi <strong>tujuan Sprint</strong> dan <strong>Sprint Backlog</strong>.</li>
        <li>Perbarui <strong>papan sprint</strong> sesuai kondisi nyata tim Anda.</li>
        <li>Sesuaikan <strong>DoD</strong> dan isi <strong>Sprint Review &amp; Retrospective</strong> setelah sprint selesai.</li>
        <li>Muat ulang halaman ini, lalu kumpulkan bukti (screenshot/PDF) sebagai Post Test 2.1.</li>
    </ol>
    <p class="hint">
        Template kosong siap isi ada di <code>docs/template-scrum.md</code>;
        langkah soal lengkap ada di <code>docs/latihan-4.md</code>;
        contoh terisi (untuk dosen/pembanding) ada di bagian <em>Contoh terisi</em> kedua berkas itu.
    </p>
    <p style="margin-top:16px">
        <a class="btn btn-secondary" href="<?= site_url('/') ?>">Kembali ke daftar latihan</a>
        <a class="btn" href="<?= site_url('mahasiswa') ?>">Buka produk (aplikasi biodata)</a>
    </p>
</div>

<?= view('layout/footer') ?>