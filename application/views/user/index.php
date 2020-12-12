<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-lg-8 mt-2">
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-12 col-sm-6 col-md-4">
            <?= $this->session->flashdata('message'); ?>
        </div>
        <div class="card-body pb-0">
            <div class="row d-flex align-items-stretch">
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                    <div class="card bg-light">
                        <div class="card-header text-muted border-bottom-0">
                            <h1><?= $title ?></h1>
                        </div>
                        <div class="card-body pt-0 ">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b><?= $user['name']; ?></b></h2>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> <?= $user['email']; ?></li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-clock"></i></span> Member since <?= date('d F Y', $user['date_created']); ?></li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" alt="" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        </di>
                    </div>
                </div>
            </div>
    </section>
</div>