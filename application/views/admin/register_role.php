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
                        <form role="form" id="quickForm" action="<?= site_url('Menu/save_register_role'); ?>" method="POST">
                            <input type="hidden" name="id" value="<?= (isset($id['id'])) ? md5($id['id']) : ''; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Role</label>
                                    <input type="text" name="role" class="form-control" id="role" placeholder="Masukan role" value="<?= (isset($id['role'])) ? ($id['role']) : ''; ?>">
                                </div>
                                <small class="text-danger"><?= form_error('menu'); ?></small>
                                <div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
</div>