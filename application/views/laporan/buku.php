<div class="container-fluid">
    <h3> Laporan Buku</h3>
    <form method="get">
    <input type="text" name="penulis" placeholder="Cari Penulis" value="<?= $penulis; ?>">
    <input type="text" name="penerbit" placeholder="Cari Penerbit" value="<?= $penerbit; ?>">
        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
        <a href="<?= site_url('laporan/buku'); ?>" class="btn btn-secondary btn-sm">Reset</a>
    </form>

    <br>
    <a href="<?= site_url('buku/cetak_buku?penulis='. $penulis.'&penerbit='. $penerbit  ); ?>"
    target="_blank" class="btn btn-primary btn-sm">Cetak PDF</a>

    <table class="table table-bordered mt-3">
    <tr>
        <th>No</th>
        <th>Kode Buku</th>
        <th>Judul Buku</th>
        <th>Penulis</th>
        <th>Penerbit</th>
        <th>Tahun</th>
    </tr>
    <?php $no=1; foreach($data as $d): ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $d->kode_buku; ?></td>
        <td><?= $d->judul_buku; ?></td>
        <td><?= $d->penulis; ?></td>
        <td><?= $d->penerbit; ?></td>
        <td><?= $d->tahun; ?></td>
    </tr>
    <?php endforeach; ?>
    </table>
    </div> 