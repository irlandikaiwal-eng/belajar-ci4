<?php
/**
 * Header layout — dipakai semua halaman dengan: <?= view('layout/header') ?>
 * Helper url (site_url/base_url) sudah dimuat dari BaseController.
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($judul ?? 'Aplikasi Latihan CI4') ?> · Latihan CI4</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

<nav class="navbar">
    <div class="navbar-inner">
        <a class="brand" href="<?= site_url('/') ?>">CI4 · Latihan</a>
        <a href="<?= site_url('latihan1') ?>">Latihan 1</a>
        <a href="<?= site_url('mahasiswa') ?>">Data Mahasiswa</a>
        <a href="<?= site_url('scrum') ?>">SCRUM (Latihan 4)</a>

        <span class="spacer"></span>

        <?php if (session()->get('isLogin')): ?>
            <span class="user">Login sebagai <?= esc(session()->get('nama_lengkap') ?? session()->get('username')) ?></span>
            <a href="<?= site_url('logout') ?>">Logout</a>
        <?php else: ?>
            <a href="<?= site_url('login') ?>">Login</a>
        <?php endif; ?>
    </div>
</nav>

<main class="container">
    <?= view('layout/pesan') ?>