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
                        <form role="form" id="quickForm" action="<?= site_url('PrestasiFTK/save_register_user'); ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id_user" value="<?= (isset($id_user['id_user'])) ? md5($id_user['id_user']) : ''; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Masukan Nama User" value="<?= (isset($id_user['name'])) ? ($id_user['name']) : ''; ?>">
                                </div>
                                <small class="text-danger"><?= form_error('name'); ?></small>
                            </div>


                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" name="email" class="form-control" id="email" placeholder="Masukan Email User" value="<?= (isset($id_user['email'])) ? ($id_user['email']) : ''; ?>">
                                </div>
                                <small class="text-danger"><?= form_error('email'); ?></small>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Masukan Foto</label>

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">New Password</label>
                                    <input type="password" name="new_password1" class="form-control" id="new_password1">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Fakultas</label>
                                    <select class="form-control" name="id_fakultas">
                                        <?php
                                        foreach ($nama_fakultas as $val) { ?>
                                            <option value="<?= $val['id_fakultas']; ?>"><?= $val['nama_fakultas']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control" name="role_id">
                                        <?php
                                        foreach ($role as $val) { ?>
                                            <option value="<?= $val['id']; ?>"><?= $val['role']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                    <label class="form-check-label" for="is_active">
                                        Acvtive?
                                    </label>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>