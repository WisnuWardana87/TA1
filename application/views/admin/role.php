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
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <?= $this->session->flashdata('message'); ?>
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Role</th>
                                        <th colspan="3">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($role as $val) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td><?= $val['role']; ?></td>
                                            <td class="text-center"><a href="<?= base_url('Admin/roleAccess/') . $val['id']; ?>">
                                                    <div class="btn btn-sm btn-success"><i class="fas fa-fw fa-lock"></i></div>
                                                </a></td>
                                            <td class="text-center"><a href="<?= site_url('Admin/update_register_role/' . md5($val['id'])) ?>">
                                                    <div class="btn btn-sm btn-primary"><i class="fas fa-fw fa-edit"></i></div>
                                                </a></td>
                                            <td class="text-center"><a href="<?= site_url('Admin/delete_role/' . ($val['id'])); ?>" onclick="return confirm('Anda yakin akan menghapus data ini ?');">
                                                    <div class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></div>
                                                </a></td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php } ?>
                                </tbody>
                            </table>
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
</div>
<!-- /.content -->

<!-- Modal -->

<!-- Button trigger modal -->


<!-- Modal -->

<!-- /.Modal -->