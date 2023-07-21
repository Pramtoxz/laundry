<?= $this->extend('layout/vmain') ?>
<?= $this->extend('layout/vmenu') ?>

<?= $this->section('isi') ?>

<div class="row">
    <div class="col-sm-12">
        <h3> Data User </h3>
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-sm btn-primary" data-target="#addModal" data-toggle="modal"> Tambah </button>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped" id="datauser">
                    <thead>
                        <th> NO </th>
                        <th> Nama User </th>
                        <th> Username </th>
                        <th> Level </th>
                        <th> Action </th>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($data as $row) : $no++ ?>
                            <tr>
                                <td> <?= $no; ?> </td>
                                <td> <?= $row['namauser']; ?> </td>
                                <td> <?= $row['username']; ?> </td>
                                <td> <?= $row['level']; ?> </td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm btn-edit"  data-nama="<?= $row['namauser']; ?>" data-username="<?= $row['username']; ?>" data-password="<?= $row['password']; ?>" data-level="<?= $row['level']; ?>">
                                        <i class="fa fa-tags"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm tombol-delete" data-id_del="<?= $row['iduser']; ?>">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- modal save -->
        <form action="<?= site_url('user/save') ?>" method="post">

            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-10">
                                <label>Nama User </label>
                                <input type="text" class="form-control" name="namauser" placeholder="nama user">
                            </div>

                            <div class="col-md-6">
                                <label>Username </label>
                                <input type="text" class="form-control" name="username" placeholder="username">
                            </div>

                            <div class="col-md-6">
                                <label>Password </label>
                                <input type="password" class="form-control" name="password" placeholder="password">
                            </div>

                            <div class="col-md-6">
                                <label>Level </label>
                                <select name="level" class="form-control">
                                    <?php foreach ($datalevel as $row) { ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['level'] ?></option>
                                    <?php  } ?>


                                </select>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Akhir modal save -->

        <!-- Form Edit -->
        <form action="<?= site_url('user/edit') ?>" method="post">
            <div class="modal fade" id="editUser" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            

                            <div class="col-md-6">
                                <label>Nama User </label>
                                <input type="text" readonly class="form-control namauser" name="namauser">
                            </div>

                            <div class="col-md-10">
                                <label>Username </label>
                                <input type="text" readonly class="form-control username" name="username" placeholder="user name">
                            </div>

                            <div class="col-md-10">
                                <label>Password </label>
                                <input type="password" class="form-control password" name="password" placeholder="user name">
                            </div>

                            <div class="col-md-6">
                                <label>Level </label>
                                <select name="level" class="form-control level">
                                    <?php foreach ($datalevel as $row) { ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['level'] ?></option>
                                    <?php  } ?>


                                </select>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- akhir form edit -->

        <!-- delete -->
        <form action="<?= site_url('user/delete') ?>" method="post">
            <div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">HAPUS DATA USER</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h3>Anda Yakin hapus?</h3>
                            <div class="modal-footer">
                                <input type="hidden" name="iduser" class="deliduser">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">ya</button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
        <!-- akhir delete -->


        <?= $this->endSection('') ?>