<!-- /.content-wrapper -->
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
                        <form role="form" id="quickForm" action="<?= base_url('user/change_password'); ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Current Password</label>
                                    <input type="password" name="current_password" class="form-control" id="current_password">
                                </div>
                                <small class="text-danger"><?= form_error('current_password'); ?></small>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">New Password</label>
                                    <input type="password" name="new_password1" class="form-control" id="new_password1">
                                </div>
                                <small class="text-danger"><?= form_error('new_password1'); ?></small>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Repeat Password</label>
                                    <input type="password" name="new_password2" class="form-control" id="new_password2">
                                </div>
                                <small class="text-danger"><?= form_error('new_password2'); ?></small>
                                <div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                    </div>

                </div>
                <!-- /.card-body -->
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->

        <!--/.col (right) -->
    </section>
</div>