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
                            <a><button type="button" class="btn btn-block btn-primary tombolTambahData" data-toggle="modal" data-target="#dataPembimbing"><i class="fas fa-folder-plus"></i> Tambah Data</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <?= $this->session->flashdata('message'); ?>
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>NIP Pembimbing</th>
                                        <th>Nama Pembimbing</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pembimbing as $val) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td><?= $val['nip_pembimbing']; ?></td>
                                            <td><?= $val['nama_pembimbing']; ?></td>
                                            <td class="text-center">
                                                <div class="btn btn-sm btn-primary tampilPembimbingUbah" data-toggle="modal" data-target="#dataPembimbing" data-id="<?= $val['id_pembimbing']; ?>"><i class="fas fa-fw fa-edit"></i></div>
                                                </a>
                                            </td>
                                            <td class="text-center"><a href="<?= site_url('MasterData/delete_pembimbing/' . ($val['id_pembimbing'])); ?>" onclick="return confirm('Anda yakin akan menghapus data ini ?');">
                                                    <div class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></div>
                                                </a></td>
                                        </tr>
                                        <?php $no++; ?>
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
<div class="modal fade" id="dataPembimbing" tabindex="-1" aria-labelledby="dataPembimbingLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataPembimbingLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('MasterData/daftar_pembimbing'); ?>" method="post">
                    <input type="hidden" name="id_pembimbing" id="id_pembimbing">
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIP Pembimbing</label>
                        <input type="text" name="nip_pembimbing" class="form-control" id="nip_pembimbing" placeholder="Masukan NIP Pembimbing" value="<?= (isset($id_pembimbing['nip_pembimbing'])) ? ($id_pembimbing['nip_pembimbing']) : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Pembimbing</label>
                        <input type="text" name="nama_pembimbing" class="form-control" id="nama_pembimbing" placeholder="Masukan Nama Pembimbing" value="<?= (isset($id_pembimbing['nama_pembimbing'])) ? ($id_pembimbing['nama_pembimbing']) : ''; ?>">
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
        $('#nip_pembimbing').val("");
        $('#nama_pembimbing').val("");
        $('#dataPembimbingLabel').html('Tambah Data Pembimbing');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });
    $('.tampilPembimbingUbah').on('click', function() {
        $('#dataPembimbingLabel').html('Edit Data Pembimbing');
        $('.modal-footer button[type=submit]').html('Edit Data');
        $('.modal-body form').attr('action', '<?= base_url('MasterData/save_update_pembimbing') ?>');

        const id_pembimbing = $(this).data('id');

        $.ajax({
            url: '<?= base_url('MasterData/getUbahPembimbing') ?>',
            data: {
                id_pembimbing: id_pembimbing
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id_pembimbing').val(data.id_pembimbing);
                $('#nip_pembimbing').val(data.nip_pembimbing);
                $('#nama_pembimbing').val(data.nama_pembimbing);
            }
        });
    });
</script>