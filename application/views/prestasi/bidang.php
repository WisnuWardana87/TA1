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
                            <a><button type="button" class="btn btn-block btn-primary tombolTambahData" data-toggle="modal" data-target="#dataBidang"><i class="fas fa-folder-plus"></i> Tambah Data</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Bidang Prestasi</th>
                                        <th>Keterangan Bidang Prestasi</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($bidang as $val) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++ ?></td>
                                            <td><?= $val['nama_bidang']; ?></td>
                                            <td><?= $val['ket_bidang']; ?></td>
                                            <td class="text-center"><a>
                                                    <div class="btn btn-sm btn-primary tampilProdiUbah" data-toggle="modal" data-target="#dataBidang" data-id="<?= $val['id_bidang']; ?>"><i class="fas fa-fw fa-edit"></i></div>
                                                </a></td>
                                            <td class="text-center"><a href="<?= site_url('Prestasi/delete_bidang/' . ($val['id_bidang'])); ?>" onclick="return confirm('Anda yakin akan menghapus data ini ?');">
                                                    <div class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></div>
                                                </a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Modal -->
<div class="modal fade" id="dataBidang" tabindex="-1" aria-labelledby="dataBidangLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataBidangLabel">Tambah Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Prestasi/daftar_bidang'); ?>" method="post">
                    <input type="hidden" name="id_bidang" id="id_bidang">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Bidang Prestasi</label>
                        <input type="text" name="nama_bidang" class="form-control" id="nama_bidang" placeholder="Masukan Nama Bidang Prestasi">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Keterang Bidang Prestasi</label>
                        <input type="text" name="ket_bidang" class="form-control" id="ket_bidang" placeholder="Masukan Keterangan Bidang Prestasi">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('.tombolTambahData').on('click', function() {
        $('#nama_bidang').val("");
        $('#ket_bidang').val("");
        $('#dataBidangLabel').html('Tambah Data Bidang Prestasi');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });
    $('.tampilProdiUbah').on('click', function() {
        $('#dataBidangLabel').html('Edit Data Bidang Prestasi');
        $('.modal-footer button[type=submit]').html('Edit Data');
        $('.modal-body form').attr('action', '<?= base_url('Prestasi/save_update_bidang') ?>');

        const id_bidang = $(this).data('id');

        $.ajax({
            url: '<?= base_url('Prestasi/getUbahBidang') ?>',
            data: {
                id_bidang: id_bidang
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id_bidang').val(data.id_bidang);
                $('#nama_bidang').val(data.nama_bidang);
                $('#ket_bidang').val(data.ket_bidang);
            }
        });
    });
</script>