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
                            <a><button type="button" class="btn btn-block btn-primary tombolTambahData" data-toggle="modal" data-target="#dataJurusan"><i class="fas fa-folder-plus"></i> Tambah Data</button></a>
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
                                        <th>Nama Jurusan</th>
                                        <th>Nama Fakultas</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($jurusan as $val) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td><?= $val['nama_jurusan']; ?></td>
                                            <td><?= $val['nama_fakultas']; ?></td>
                                            <td class="text-center"><a>
                                                    <div class="btn btn-sm btn-primary tampilJurusanUbah" data-toggle="modal" data-target="#dataJurusan" data-id="<?= $val['id_jurusan']; ?>"><i class="fas fa-fw fa-edit"></i></div>
                                                </a></td>
                                            <td class="text-center"><a href="<?= site_url('MasterData/delete_jurusan/' . ($val['id_jurusan'])); ?>" onclick="return confirm('Anda yakin akan menghapus data ini ?');">
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
<div class="modal fade" id="dataJurusan" tabindex="-1" aria-labelledby="dataJurusanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataJurusanLabel">Tambah Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('MasterData/daftar_jurusan'); ?>" method="post">
                    <input type="hidden" name="id_jurusan" id="id_jurusan">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Jurusan</label>
                        <input type="text" name="nama_jurusan" class="form-control" id="nama_jurusan" placeholder="Masukan Nama Jurusan">
                    </div>
                    <div class="form-group">
                        <label>Nama Fakultas</label>
                        <select class="form-control" name="id_fakultas" id="id_fakultas">
                            <?php
                            foreach ($nama_fakultas as $val) { ?>
                                <option value="<?= $val['id_fakultas']; ?>"><?= $val['nama_fakultas']; ?></option>
                            <?php } ?>
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
        $('#nama_jurusan').val("");
        $('#dataJurusanLabel').html('Tambah Data Jurusan');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });
    $('.tampilJurusanUbah').on('click', function() {
        $('#dataJurusanLabel').html('Edit Data Jurusan');
        $('.modal-footer button[type=submit]').html('Edit Data');
        $('.modal-body form').attr('action', '<?= base_url('MasterData/save_update_jurusan') ?>');

        const id_jurusan = $(this).data('id');

        $.ajax({
            url: '<?= base_url('MasterData/getUbahjurusan') ?>',
            data: {
                id_jurusan: id_jurusan
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id_jurusan').val(data.id_jurusan);
                $('#nama_jurusan').val(data.nama_jurusan);
                $('#id_fakultas').val(data.id_fakultas);

            }
        });
    });
</script>