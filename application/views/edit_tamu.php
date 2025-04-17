<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Tamu</title>
    <link rel="stylesheet" href="<?= base_url('public/assets/styles.css') ?>">
    
</head>
<body>
    <h2>Halaman Edit Data Tamu</h2>

    <?php if ($this->session->flashdata('success')): ?>
        <p style="color: green;"><?= $this->session->flashdata('success'); ?></p>
    <?php endif; ?>
    <form method="post" action="<?= site_url('tamu/update/'.$tamu->id) ?>">
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?= $tamu->nama ?>" required><br><br>

        <label>Instansi:</label><br>
        <input type="text" name="instansi" value="<?= $tamu->instansi ?>" required><br><br>

        <label>Tujuan:</label><br>
        <input type="text" name="tujuan" value="<?= $tamu->Tujuan ?>" required><br><br>

        <label>Tanggal Kunjungan:</label><br>
        <input type="date" name="tanggal_kunjungan" value="<?= $tamu->tanggal_kunjungan ?>" required><br><br>

        <button type="submit">Simpan Perubahan</button>
        <a href="<?= site_url('tamu/admin') ?>" style="margin-left: 10px;">Kembali</a>
    </form>
    </div>
</body>
</html>
