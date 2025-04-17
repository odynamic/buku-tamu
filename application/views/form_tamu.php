<!DOCTYPE html>
<html>
<head>
    <title>Formulir Buku Tamu</title>
    <link rel="stylesheet" href="<?= base_url('public/assets/styles.css') ?>">
</head>
<body>
<div class="container">
    <?php if ($this->session->flashdata('success')): ?>
        <p style="color: green;"><?= $this->session->flashdata('success'); ?></p>
    <?php endif; ?>

    <h2>Formulir Buku Tamu</h2>
    <form method="POST" action="<?= site_url('tamu/simpan') ?>">
        <label for="nama">Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label for="instansi">Instansi:</label><br>
        <input type="text" name="instansi" required><br><br>

        <label for="tujuan">Tujuan:</label><br>
        <textarea name="tujuan" required></textarea><br><br>

        <label for="tanggal_kunjungan">Tanggal Kunjungan:</label><br>
        <input type="date" name="tanggal_kunjungan" required><br><br>

        <button type="submit">Simpan</button>
    </form>
    </div>
</body>
</html>
