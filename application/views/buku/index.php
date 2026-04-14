<div class="container-fluid">
<h2 class="h3 mb-4 text-gray-900">Data Buku</h2>

<a href="<?= site_url('buku/tambah'); ?>" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Tambah
</a>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">

<table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
<thead class="thead-dark">
    <tr>
        <th>No</th>
        <th>Kode Buku</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Kategori</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>
</thead>

<tbody>
<?php if (!empty($buku)) : ?>
    <?php $no = 1; foreach($buku as $b): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $b->kode_buku; ?></td>
            <td><?= $b->judul_buku; ?></td>
            <td><?= $b->penulis; ?></td>
            <td><?= $b->nama_kategori; ?></td>
            <td><?= $b->stok; ?></td>
            <td>
                <a href="<?= site_url('buku/edit/'.$b->kode_buku); ?>" 
                   class="btn btn-warning btn-sm">
                   Edit
                </a>

                <a href="<?= site_url('buku/hapus/'.$b->kode_buku); ?>" 
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                   Hapus
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else : ?>
    <tr>
        <td colspan="7" class="text-center">Data buku kosong</td>
    </tr>
<?php endif; ?>
</tbody>

</table>

        </div>
    </div>
</div>
</div>