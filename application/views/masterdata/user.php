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
                            <a href="<?= site_url('MasterData/register_user') ?>"><button type="button" class="btn btn-block btn-primary"><i class="fas fa-folder-plus"></i> Tambah Data</button></a>
                        </div>
                    </div>
                    <div class="card card-solid">
                        <div class="card-body pb-0">
                            <div class="row d-flex align-items-stretch">
                                <?php foreach ($users as $val) { ?>
                                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                        <div class="card bg-light">
                                            <div class="card-header text-muted border-bottom-0">
                                                <?= $val['role']; ?>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 class="lead"><b><?= $val['name']; ?></b></h2>
                                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> <?= $val['email']; ?></li>
                                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> <?= $val['nama_fakultas']; ?></li>
                                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-clock"></i></span>Member since <?= date('d F Y', $user['date_created']); ?></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-5 text-center">
                                                        <img src="<?= base_url('assets/img/profile/' . $val['image']); ?>" alt="" class="img-circle img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-right">
                                                    <a href="<?= site_url('MasterData/delete_user/' . ($val['id_user'])); ?>" onclick="return confirm('Anda yakin akan menghapus data ini ?');" class="btn btn-sm bg-danger">
                                                        <i class="fas fa-fw fa-trash"></i>
                                                    </a>
                                                    <a href="<?= site_url('MasterData/update_register_user/' . md5($val['id_user'])) ?>" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-user"></i> Edit
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>