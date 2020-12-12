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
                            <a><button type="button" class="btn btn-block btn-primary tombolTambahData" data-toggle="modal" data-target="#dataProdi"><i class="fas fa-folder-plus"></i> Tambah Data</button></a>
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
                                        <th>Nama Prodi</th>
                                        <th>Nama Jurusan</th>
                                        <th>Jenjang</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($prodi as $val) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td><?= $val['nama_prodi']; ?></td>
                                            <td><?= $val['nama_jurusan']; ?></td>
                                            <td><?= $val['jenjang']; ?></td>
                                            <td class="text-center"><a>
                                                    <div class="btn btn-sm btn-primary tampilProdiUbah" data-toggle="modal" data-target="#dataProdi" data-id="<?= $val['id_prodi']; ?>"><i class="fas fa-fw fa-edit"></i></div>
                                                </a></td>
                                            <td class="text-center"><a href="<?= site_url('MasterData/delete_prodi/' . ($val['id_prodi'])); ?>" onclick="return confirm('Anda yakin akan menghapus data ini ?');">
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
<div class="modal fade" id="dataProdi" tabindex="-1" aria-labelledby="dataProdiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataProdiLabel">Tambah Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('MasterData/daftar_prodi'); ?>" method="post">
                    <input type="hidden" name="id_prodi" id="id_prodi">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Prodi</label>
                        <input type="text" name="nama_prodi" class="form-control" id="nama_prodi" placeholder="Masukan Nama Prodi">
                    </div>
                    <div class="form-group">
                        <label>Nama Jurusan</label>
                        <select class="form-control" name="id_jurusan" id="id_jurusan">
                            <?php
                            foreach ($nama_jurusan as $val) { ?>
                                <option value="<?= $val['id_jurusan']; ?>"><?= $val['nama_jurusan']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jenjang</label>
                        <select class="form-control" name="jenjang" id="jenjang">
                            <option>D3</option>
                            <option>S1</option>
                        </select>
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
        $('#nama_prodi').val("");
        $('#dataProdiLabel').html('Tambah Data Prodi');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });
    $('.tampilProdiUbah').on('click', function() {
        $('#dataProdiLabel').html('Edit Data Prodi');
        $('.modal-footer button[type=submit]').html('Edit Data');
        $('.modal-body form').attr('action', '<?= base_url('MasterData/save_update_prodi') ?>');

        const id_prodi = $(this).data('id');

        $.ajax({
            url: '<?= base_url('MasterData/getUbahProdi') ?>',
            data: {
                id_prodi: id_prodi
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id_prodi').val(data.id_prodi);
                $('#nama_prodi').val(data.nama_prodi);
                $('#id_jurusan').val(data.id_jurusan);
                $('#jenjang').val(data.jenjang);

            }
        });
    });
</script>