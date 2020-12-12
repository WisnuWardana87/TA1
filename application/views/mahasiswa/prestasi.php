<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-header">
                        <div class="card-tools">
                            <a href="<?= site_url('Mahasiswa/register_prestasi') ?>"><button type="button" class="btn btn-block btn-primary"><i class="fas fa-folder-plus"></i> Tambah Data</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Kota Kegiatan</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Keterangan Prestasi</th>
                                        <th>Nama Pembimbing</th>
                                        <th>Tahun</th>
                                        <th colspan="3">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($prestasi as $val) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++ ?></td>
                                            <td><?= $val['nama_kegiatan']; ?></td>
                                            <td><?= $val['kota']; ?></td>
                                            <td><?= $val['name']; ?></td>
                                            <td><?= $val['ket_prestasi']; ?></td>
                                            <td><?= $val['nama_pembimbing']; ?></td>
                                            <td><?= $val['tahun']; ?></td>
                                            <td class="text-center"><a href="<?php echo base_url(); ?>index.php/Mahasiswa/detail/<?php echo $val['id_prestasi']; ?>">
                                                    <div class="btn btn-sm btn-success"><i class="fas fa-fw fa-search-plus"></i></div>
                                                </a></td>
                                            <td class="text-center"><a href="<?= site_url('Mahasiswa/update_register_prestasi/' . md5($val['id_prestasi'])) ?>">
                                                    <div class="btn btn-sm btn-primary"><i class="fas fa-fw fa-edit"></i></div>
                                                </a></td>
                                            <td class="text-center"><a href="<?= site_url('Mahasiswa/delete_prestasi/' . ($val['id_prestasi'])); ?>" onclick="return confirm('Anda yakin akan menghapus data ini ?');">
                                                    <div class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></div>
                                                </a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</div>
<!-- /.content -->


<!-- Button trigger modal -->

<!-- Modal -->