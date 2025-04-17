<!DOCTYPE html>
<html>
<head>
    <title>Data Buku Tamu</title>
    <link rel="stylesheet" href="<?= base_url('public/assets/styles.css') ?>">

</head>
<body>
    <h2>Data Buku Tamu</h2>

    <?php if ($this->session->flashdata('success')): ?>
        <p style="color: green;"><?= $this->session->flashdata('success'); ?></p>
    <?php endif; ?>

    <form method="get" action="<?= site_url('tamu/admin') ?>">
        <label>Tanggal Awal:</label>
        <input type="date" name="tanggal_awal" value="<?= $this->input->get('tanggal_awal') ?>" required>
        <label>Tanggal Akhir:</label>
        <input type="date" name="tanggal_akhir" value="<?= $this->input->get('tanggal_akhir') ?>" required>
        <button type="submit">Filter</button>
        <a href="<?= site_url('tamu/reset_filter') ?>">Reset</a>
    </form>

    <br>
    <?php if (empty($tamu)): ?>
        <p style="font-style: italic; color: #666;">Tidak ada data tamu yang ditemukan.</p>
    <?php else: ?>
        <table border="1" cellpadding="10">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Instansi</th>
                <th>Tujuan</th>
                <th>Tanggal Kunjungan</th>
                <th>Aksi</th>
            </tr>
            <?php $no = 1; foreach($tamu as $t): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $t->nama ?></td>
                <td><?= $t->instansi ?></td>
                <td><?= $t->tujuan ?></td>
                <td><?= $t->tanggal_kunjungan ?></td>
                <td>
                    <a href="<?= site_url('tamu/edit/'.$t->id) ?>">Edit</a> |
                    <a href="<?= site_url('tamu/hapus/'.$t->id) ?>" onclick="return confirm('Yakin ingin menghapus data tamu terpilih?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>
