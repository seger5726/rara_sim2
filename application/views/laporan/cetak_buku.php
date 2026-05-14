<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Buku</title>

    <style>
        body{
            font-family: Arial;
        }

        h3{
            text-align: center;
        }

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
            button{
                display: none;
            }
        }
    </style>
</head>

<body>

    <h3>Laporan Buku</h3>

    <?php if($penulis): ?>
        <p>Penulis: <?= $penulis; ?></p>
    <?php endif; ?>

    <?php if($penerbit): ?>
        <p>Penerbit: <?= $penerbit; ?></p>
    <?php endif; ?>

    <table>
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

    <br><br>

    <p style="text-align:right;">
        Tangerang, <?= date('d-m-Y'); ?><br><br><br>
        (Admin)
    </p>

    <script>
        window.print();
    </script>

</body>
</html>