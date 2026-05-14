<!DOCTYPE html>
<html>
    <title>Cetak Laporan Anggota</title>

    <style>
        body{font-family: Arial;}
        h3{text-align: center;}
        table{
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td{
            border: 1px solid black;
        }
        th, td{
            padding: 8px;
            text-align: center;  
        }

        @media print{
            button{display: none;}
        }
        </style>
    </head>
<body>
    <h3> Laporan Anggota</h3>
    <?php if($bulan): ?>
        <p>Bulan: <?= $bulan; ?></p>
    <?php endif; ?>
    <?php if($nama): ?>
        <p>Nama: <?= $nama; ?></p>
    <?php endif; ?>
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
    <br><br>

    <p style="text-align:right;">
        Tangerang, <?=date('d-m-y'); ?><br><br><br>
        (Admin)
    </p>
    <script>
        window.print();
        </script>
    </body>
    </html>