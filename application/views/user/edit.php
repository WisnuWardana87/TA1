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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <?= form_open_multipart('user/edit'); ?>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                            <small class="text-danger"><?= form_error('name'); ?></small>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Picture</label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-goup row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Edit</button>
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


    <!-- Main content -->
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->