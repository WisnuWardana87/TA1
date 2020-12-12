<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <?= $title ?>
                    </h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <?php foreach ($detail_prestasi as $val) { ?>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                        </div>
                        <div class="col-12 col-sm-6">
                            <h2 class="text-center">Prestasi Mahasiswa Universitas Pendidikan Ganesha</h2>
                            <div class="row mb-5"></div>
                            <h4>
                                <p><?= $val['name']; ?></p>
                            </h4>

                            <hr>

                            <h4>
                                <p><?= $val['nama_jenis']; ?></p>
                            </h4>

                            <hr>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="col-12">
                                <img width='375' height='321' style="display: block; margin: auto;" src="<?= base_url('media/images/' . $val['file_prestasi']); ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">

                            <h4>
                                <p><?= $val['nama_tingkat']; ?></p>
                            </h4>

                            <hr>


                            <h4>
                                <p><?= $val['nama_jenis_juara']; ?></p>
                            </h4>

                            <hr>


                            <h4>
                                <p><?= $val['tgl_mulai']; ?></p>
                            </h4>

                            <hr>


                            <h4>
                                <p><?= $val['tgl_selesai']; ?></p>
                            </h4>

                            <hr>

                            <h4>
                                <p><?= $val['nama_kegiatan']; ?></p>
                            </h4>

                            <hr>

                            <h4>
                                <p><?= $val['kota']; ?></p>
                            </h4>

                            <hr>

                            <h4>
                                <p>Rp. <?= $val['jml_dana']; ?></p>
                            </h4>

                            <hr>

                            <h4>
                                <p><?= $val['ket_prestasi']; ?></p>
                            </h4>

                            <hr>

                            <h4>
                                <p><?= $val['nama_pembimbing']; ?></p>
                            </h4>

                            <hr>

                            <h4>
                                <p><?= $val['tahun']; ?></p>
                            </h4>

                            <hr>

                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
</div>