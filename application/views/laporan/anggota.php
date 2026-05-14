<div class="container-fluid">
    <h3> Laporan Anggota</h3>
    <form method="get">
        <input type="month" name="bulan" value="<?= $bulan; ?>">
        <input type="text" name="nama" placeholder="Nama Anggota" value="<?= $nama; ?>">
        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
        <a href="<?= site_url('laporan/anggota'); ?>" class="btn btn-secondary btn-sm">Reset</a>
    </form>

    <br>
    <a href="<?= site_url('anggota/cetak_anggota?bulan='. $bulan.'&nama='. $nama); ?>"
    target="_blank" class="btn btn-primary btn-sm">Cetak PDF</a>

    <table class="table table-bordered mt-3">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>Email</th>
        <th>Tanggal Daftar</th>
    </tr>
    <?php $no=1; foreach($data as $d): ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $d->nama; ?></td>
        <td><?= $d->alamat; ?></td>
        <td><?= $d->telepon; ?></td>
        <td><?= $d->email; ?></td>
        <td><?= $d->tanggal_daftar; ?></td>
    </tr>
    <?php endforeach; ?>
    </table>
</div> 