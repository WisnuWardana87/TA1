<?php

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">
    <thead>
        <tr>
            <td style="background-color:#44749D">Nama Mahasiswa</td>
            <td style="background-color:#44749D">Jenis Prestasi</td>
            <td style="background-color:#44749D">Tingkat Prestasi</td>
            <td style="background-color:#44749D">Jenis Juara</td>
            <td style="background-color:#44749D">Tanggal Mulai</td>
            <td style="background-color:#44749D">Tanggal Selesai</td>
            <td style="background-color:#44749D">Nama Kegiatan</td>
            <td style="background-color:#44749D">Kota</td>
            <td style="background-color:#44749D">Jumlah Dana</td>
            <td style="background-color:#44749D">Nama Pembimbing</td>
            <td style="background-color:#44749D">Tahun</td>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($exportdata as $val) : ?>
            <tr>
                <td><?= $val['name'] ?></td>
                <td><?= $val['nama_jenis'] ?></td>
                <td><?= $val['nama_tingkat'] ?></td>
                <td><?= $val['nama_jenis_juara'] ?></td>
                <td><?= $val['tgl_mulai'] ?></td>
                <td><?= $val['tgl_selesai'] ?></td>
                <td><?= $val['nama_kegiatan'] ?></td>
                <td><?= $val['kota'] ?></td>
                <td><?= $val['jml_dana'] ?></td>
                <td><?= $val['nama_pembimbing'] ?></td>
                <td><?= $val['tahun'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>