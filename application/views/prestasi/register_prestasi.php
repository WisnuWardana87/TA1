<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><?= $title ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" id="quickForm" action="<?= site_url('Mahasiswa/save_register_prestasi'); ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id_prestasi" value="<?= (isset($id_prestasi['id_prestasi'])) ? md5($id_prestasi['id_prestasi']) : ''; ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Jenis Prestasi</label>
                                                <select class="form-control" name="id_jenis">
                                                    <?php
                                                    foreach ($nama_jenis as $val) { ?>
                                                        <option value="<?= $val['id_jenis']; ?>"><?= $val['nama_jenis']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Tingkat Prestasi</label>
                                                <select class="form-control" name="id_tingkat">
                                                    <?php
                                                    foreach ($nama_tingkat as $val) { ?>
                                                        <option value="<?= $val['id_tingkat']; ?>"><?= $val['nama_tingkat']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Jenis Juara</label>
                                                <select class="form-control" name="id_jenis_juara">
                                                    <?php
                                                    foreach ($nama_jenis_juara as $val) { ?>
                                                        <option value="<?= $val['id_jenis_juara']; ?>"><?= $val['nama_jenis_juara']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tanggal Mulai</label>
                                                <input type="date" name="tgl_mulai" class="form-control" id="tgl_mulai" placeholder="Masukan Tanggal Mulai" value="<?= (isset($id_prestasi['tgl_mulai'])) ? ($id_prestasi['tgl_mulai']) : ''; ?>">
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tanggal Selesai</label>
                                                <input type="date" name="tgl_selesai" class="form-control" id="tgl_selesai" placeholder="Masukan Tanggal Selesai" value="<?= (isset($id_prestasi['tgl_selesai'])) ? ($id_prestasi['tgl_selesai']) : ''; ?>">
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Kegiatan</label>
                                                <input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan" placeholder="Masukan Nama Kegiatan" value="<?= (isset($id_prestasi['nama_kegiatan'])) ? ($id_prestasi['nama_kegiatan']) : ''; ?>">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">

                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Kota Kegiatan</label>
                                                <input type="text" name="kota" class="form-control" id="kota" placeholder="Masukan Kota Kegiatan" value="<?= (isset($id_prestasi['kota'])) ? ($id_prestasi['kota']) : ''; ?>">
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Jumlah Dana</label>
                                                <input type="text" name="jml_dana" class="form-control" id="jml_dana" placeholder="Masukan Jumlah Dana Kegiatan" value="<?= (isset($id_prestasi['jml_dana'])) ? ($id_prestasi['jml_dana']) : ''; ?>">
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Nama Mahasiswa</label>
                                                <select class="form-control" name="name">
                                                    <?php
                                                    foreach ($name as $val) { ?>
                                                        <option value="<?= $val['name']; ?>"><?= $val['name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Keterangan Prestasi</label>
                                                <input type="text" name="ket_prestasi" class="form-control" id="ket_prestasi" placeholder="Masukan Keterangan Prestasi" value="<?= (isset($id_prestasi['ket_prestasi'])) ? ($id_prestasi['ket_prestasi']) : ''; ?>">
                                            </div>
                                        </div>



                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Masukan Foto</label>

                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="file_prestasi" name="file_prestasi">
                                                    <label class="custom-file-label" for="file_prestasi">Choose file</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Nama Pembimbing</label>
                                                <select class="form-control" name="id_pembimbing">
                                                    <?php
                                                    foreach ($nama_pembimbing as $val) { ?>
                                                        <option value="<?= $val['id_pembimbing']; ?>"><?= $val['nama_pembimbing']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tahun</label>
                                                <input type="text" name="tahun" class="form-control" id="tahun" placeholder="Masukan Tahun Kegiatan" value="<?= (isset($id_prestasi['tahun'])) ? ($id_prestasi['tahun']) : ''; ?>">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- /.card -->