<?php

namespace App\Controllers;

/**
 * Scrum — halaman praktikum SCRUM (materi Pertemuan 4).
 *
 * Halaman ini adalah "dokumen hidup" versi aplikasi:
 *   - Product Backlog  : semua kebutuhan produk, diurutkan prioritas
 *   - Sprint Backlog   : item yang dipilih untuk Sprint berjalan
 *   - Papan Sprint     : To Do | In Progress | Done
 *   - Definition of Done, Sprint Review, dan Sprint Retrospective
 *
 * TUGAS MAHASISWA (Latihan 4):
 *   Data di bawah ini adalah CONTOH untuk aplikasi biodata.
 *   Ganti isinya dengan backlog proyek Anda sendiri, lalu buka /scrum
 *   untuk melihat hasilnya — sekaligus bukti Post Test 2.1.
 *
 * Catatan: seluruh data disiapkan di controller (controller menyiapkan data,
 * view hanya menampilkan) — pola yang sama seperti Latihan 1-3.
 */
class Scrum extends BaseController
{
    public function index(): string
    {
        // -----------------------------------------------------------------
        // 1. PRODUCT BACKLOG — daftar SEMUA kebutuhan, ditulis sebagai user story
        //    Format: Sebagai <peran>, saya ingin <fitur>, agar <manfaat>
        //    Prioritas: P0 wajib · P1 penting · P2 nice-to-have
        //    Estimasi : S (<= 1 hari) · M (2-3 hari) · L (seminggu+ -> pecah lagi)
        // -----------------------------------------------------------------
        
        $backlog = [
            [
                'id' => 'PB-01',
                'story' => 'Sebagai admin, saya ingin login ke sistem, agar hanya pengguna yang berwenang dapat mengakses data mahasiswa.',
                'prioritas' => 'P0',
                'estimasi' => 'M',
                'sprint' => 1,
                'status' => 'Done',
                'bukti' => 'Halaman login berhasil digunakan untuk masuk sebagai admin.'
            ],
            [
                'id' => 'PB-02',
                'story' => 'Sebagai admin, saya ingin melihat daftar mahasiswa, agar data mudah diperiksa.',
                'prioritas' => 'P0',
                'estimasi' => 'S',
                'sprint' => 1,
                'status' => 'Done',
                'bukti' => 'Halaman daftar mahasiswa menampilkan data dari database.'
            ],
            [
                'id' => 'PB-03',
                'story' => 'Sebagai admin, saya ingin menambahkan data mahasiswa, agar data baru dapat tersimpan.',
                'prioritas' => 'P0',
                'estimasi' => 'M',
                'sprint' => 1,
                'status' => 'Done',
                'bukti' => 'Form tambah data berhasil menyimpan mahasiswa ke database.'
            ],
            [
                'id' => 'PB-04',
                'story' => 'Sebagai admin, saya ingin mengubah data mahasiswa, agar kesalahan data dapat diperbaiki.',
                'prioritas' => 'P0',
                'estimasi' => 'M',
                'sprint' => 1,
                'status' => 'Done',
                'bukti' => 'Form Edit berhasil mengubah data dan menampilkan pesan "Data berhasil diubah".'
            ],
            [
                'id' => 'PB-05',
                'story' => 'Sebagai admin, saya ingin menghapus data mahasiswa, agar data yang tidak diperlukan dapat dihapus.',
                'prioritas' => 'P0',
                'estimasi' => 'S',
                'sprint' => 1,
                'status' => 'Done',
                'bukti' => 'Tombol Hapus tersedia dan data dapat dihapus dari daftar mahasiswa.'
            ],
            [
                'id' => 'PB-06',
                'story' => 'Sebagai admin, saya ingin mencari mahasiswa berdasarkan NIM atau nama, agar data mudah ditemukan.',
                'prioritas' => 'P1',
                'estimasi' => 'M',
                'sprint' => 2,
                'status' => 'To Do',
                'bukti' => 'Belum diimplementasikan.'
            ],
            [
                'id' => 'PB-07',
                'story' => 'Sebagai admin, saya ingin melihat detail mahasiswa, agar informasi biodata dapat diperiksa lebih lengkap.',
                'prioritas' => 'P2',
                'estimasi' => 'S',
                'sprint' => 2,
                'status' => 'To Do',
                'bukti' => 'Belum diimplementasikan.'
            ],
            [
                'id' => 'PB-08',
                'story' => 'Sebagai admin, saya ingin mencetak data mahasiswa, agar data dapat digunakan sebagai laporan.',
                'prioritas' => 'P2',
                'estimasi' => 'M',
                'sprint' => 2,
                'status' => 'To Do',
                'bukti' => 'Belum diimplementasikan.'
            ],
        ];
    

        $sprint = [
            'nama' => 'Sprint 1',
            'periode' => '1 minggu',
            'tujuan' => 'Aplikasi biodata mahasiswa dapat melakukan login dan mengelola data mahasiswa melalui fitur melihat, menambahkan, mengubah, dan menghapus data dengan benar.',
        ];

        // -----------------------------------------------------------------
        // 2. PAPAN SPRINT (To Do | In Progress | Done)
        // -----------------------------------------------------------------
    
        $papan = [
            'todo' => [],
            'progress' => [],
            'done' => [
                [
                    'id' => 'PB-01',
                    'teks' => 'Login ke sistem'
                ],
                [
                    'id' => 'PB-02',
                    'teks' => 'Melihat daftar mahasiswa'
                ],
                [
                    'id' => 'PB-03',
                    'teks' => 'Menambahkan data mahasiswa'
                ],
                [
                    'id' => 'PB-04',
                    'teks' => 'Mengubah data mahasiswa'
                ],
                [
                    'id' => 'PB-05',
                    'teks' => 'Menghapus data mahasiswa'
                ]
            ]
        ];

        // -----------------------------------------------------------------
        // 3. DEFINITION OF DONE (DoD) — kesepakatan tim
        // -----------------------------------------------------------------
        $dod = [
            'Fitur berjalan di CodeIgniter 4 tanpa error (diuji di browser).',
            'Input pengguna divalidasi di sisi server; pesan kesalahan jelas dan isian tidak hilang.',
            'Semua output data dibungkus esc() (aman dari XSS).',
            'Setiap aksi CRUD memberi umpan balik sukses/gagal (flashdata).',
            'Sudah diuji memakai daftar periksa dan buktinya (screenshot) tersimpan.',
            'Kode ter-push ke Git dengan pesan commit yang jelas.',
            'Dapat didemonstrasikan di Sprint Review (bukan sekadar "kode sudah ditulis").',
        ];

        // -----------------------------------------------------------------
        // 4. PERAN TIM (di proyek kuliah satu orang boleh merangkap)
        // -----------------------------------------------------------------
        $peran = [
            [
                'peran' => 'Product Owner',
                'tugas' => 'Menyusun dan menentukan prioritas Product Backlog.',
                'anggota' => 'Ihwal Irlandika'
            ],
            [
                'peran' => 'Scrum Master',
                'tugas' => 'Mengatur proses Sprint dan memastikan pekerjaan berjalan sesuai rencana.',
                'anggota' => 'Ihwal Irlandika'
            ],
            [
                'peran' => 'Developer Team',
                'tugas' => 'Mengembangkan, menguji, dan mendemokan aplikasi.',
                'anggota' => 'Ihwal Irlandika'
            ],
        ];

        // -----------------------------------------------------------------
        // 5. AGENDA EVENT SCRUM (versi kuliah, Sprint = 1 minggu)
        // -----------------------------------------------------------------
        $event = [
            ['event' => 'Sprint Planning', 'waktu' => 'Awal minggu (setelah kelas)', 'keluaran' => 'Tujuan Sprint + Sprint Backlog + penanggung jawab tiap item'],
            ['event' => 'Daily Scrum', 'waktu' => 'Setiap hari, maks 15 menit', 'keluaran' => 'Kemarin apa · hari ini apa · hambatan apa (sinkronisasi, bukan laporan ke atasan)'],
            ['event' => 'Sprint Review', 'waktu' => 'Akhir minggu / saat kelas', 'keluaran' => 'Demo Increment ke PO, kumpulkan umpan balik, perbarui backlog'],
            ['event' => 'Sprint Retrospective', 'waktu' => 'Setelah Review (± 20 menit)', 'keluaran' => 'Perbaikan cara kerja tim: Start / Stop / Continue'],
        ];

        // -----------------------------------------------------------------
        // 6. CATATAN REVIEW & RETROSPEKTIF SPRINT 1 (contoh terisi)
        // -----------------------------------------------------------------
        $catatan = [
            'review' => [
                'Demo: fitur login berhasil digunakan untuk masuk ke sistem sebagai admin.',
                'Demo: fitur melihat, menambahkan, mengubah, dan menghapus data mahasiswa berhasil dilakukan.',
                'Pengujian fitur Edit/Update berhasil, ditandai dengan pesan "Data berhasil diubah" dan perubahan data tampil pada tabel.',
                'PB-06 sampai PB-08 tetap berada di Product Backlog untuk dikerjakan pada sprint berikutnya.',
            ],
            'retro' => [
                'start' => [
                    'Menulis kriteria penerimaan sebelum coding.',
                    'Melakukan pengujian setiap fitur setelah selesai dibuat.'
                ],
                'stop' => [
                    'Menunda pengujian sampai akhir sprint.',
                    'Mengerjakan fitur di luar Sprint Backlog.'
                ],
                'continue' => [
                    'Memperbarui Sprint Board sesuai kondisi pekerjaan.',
                    'Melakukan commit Git setelah perubahan fitur selesai.'
                ],
            ],
        ];

        // -----------------------------------------------------------------
        // 7. RINGKASAN PROGRES (dihitung dari data backlog)
        // -----------------------------------------------------------------
        $total     = count($backlog);
        $selesai   = count(array_filter($backlog, static fn (array $i): bool => $i['status'] === 'Done'));
        $sprintKe1 = array_values(array_filter($backlog, static fn (array $i): bool => $i['sprint'] === 1));

        $identitas = [
            'nama' => 'Ihwal Irlandika',
            'nim'  => '20240410510019',
        ];
        $data = [
            'judul'    => 'Latihan 4 — SCRUM: Konsep, Peran & Artefak',
            'subjudul' => 'Post Test 2.1 — menyusun list pengerjaan web dengan SCRUM (Sprint 1 minggu)',
            'identitas' => $identitas,
            'backlog'  => $backlog,
            'sprint'   => $sprint,
            'sprintKe1' => $sprintKe1,
            'papan'    => $papan,
            'dod'      => $dod,
            'peran'    => $peran,
            'event'    => $event,
            'catatan'  => $catatan,
            'ringkasan' => [
                'total'    => $total,
                'selesai'  => $selesai,
                'progress' => $total > 0 ? (int) round($selesai / $total * 100) : 0,
                'p0'       => count(array_filter($backlog, static fn (array $i): bool => $i['prioritas'] === 'P0')),
                'p1'       => count(array_filter($backlog, static fn (array $i): bool => $i['prioritas'] === 'P1')),
                'p2'       => count(array_filter($backlog, static fn (array $i): bool => $i['prioritas'] === 'P2')),
            ],
        ];

        return view('scrum/index', $data);
    }
}