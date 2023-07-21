<?= $this->extend('layout/vmain') ?>
<?= $this->extend('layout/vmenu') ?>

<?= $this->section('isi') ?>

<div class="row">
    <div class="col-sm-12">
        <h3> Data Konsumen </h3>
        <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php elseif (session()->getFlashdata('sukses')) :  ?>
        <div class="alert alert-success"><?= session()->getFlashdata('sukses') ?></div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-sm btn-primary" data-target="#addModal" data-toggle="modal"> Tambah
                </button>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped" id="datakonsumen">
                    <thead>
                        <th> No </th>
                        <th> ID Konsumen </th>
                        <th> Nama Konsumen </th>
                        <th> Alamat </th>
                        <th> No Telepon </th>
                        <th> Action </th>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($data as $row) : $no++ ?>
                        <tr>
                            <td> <?= $no; ?> </td>
                            <td> <?= $row['kodekonsumen']; ?> </td>
                            <td> <?= $row['namakonsumen']; ?> </td>
                            <td> <?= $row['alamatkonsumen']; ?> </td>
                            <td> <?= $row['notelpkonsumen']; ?> </td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm btn-edit"
                                    data-id="<?=
                                                                                                        $row['kodekonsumen']; ?>" data-nama="<?= $row['namakonsumen']; ?>"
                                    data-alamat="<?= $row['alamatkonsumen']; ?>"
                                    data-notelepon="<?= $row['notelpkonsumen']; ?>">
                                    <i class="fa fa-tags"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm tombol-delete"
                                    data-id_del="<?= $row['kodekonsumen']; ?>">
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
        <form action="<?= site_url('konsumen/save') ?>" method="post">

            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-10">
                                <label>Kode Konsumen </label>
                                <input type="text" class="form-control" name="kodekonsumen" placeholder="kode Konsumen">
                            </div>
                            <div class="col-md-10">
                                <label>Nama Konsumen </label>
                                <input type="text" class="form-control" name="namakonsumen" placeholder="nama Konsumen">
                            </div>

                            <div class="col-md-6">
                                <label>Alamat </label>
                                <input type="text" class="form-control" name="alamatkonsumen"
                                    placeholder="alamat konsumen">
                            </div>

                            <div class="col-md-6">
                                <label>No Telepon </label>
                                <input type="text" class="form-control" name="notelpkonsumen" placeholder="No telepon">
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
        <form action="<?= site_url('konsumen/edit') ?>" method="post">
            <div class="modal fade" id="editkonsumen" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-6">
                                <label>Id Konsumen </label>
                                <input type="text" readonly class="form-control kodekonsumen" name="kodekonsumen">
                            </div>

                            <div class="col-md-10">
                                <label>Nama Konsumen </label>
                                <input type="text" class="form-control namakonsumen" name="namakonsumen"
                                    placeholder="nama konsumen">
                            </div>

                            <div class="col-md-6">
                                <label>Alamat konsumen </label>
                                <input type="text" class="form-control alamatkonsumen" name="alamatkonsumen">
                            </div>

                            <div class="col-md-6">
                                <label>No Telepon</label>
                                <input type="text" class="form-control notelpkonsumen" name="notelpkonsumen">
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
        <form action="<?= site_url('konsumen/delete') ?>" method="post">
            <div class="modal fade" id="deletekonsumen" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Konsumen</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h3>Anda Yakin hapus?</h3>
                            <div class="modal-footer">
                                <input type="hidden" name="kodekonsumen" class="delkodekonsumen">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">ya</button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
        <!-- akhir delete -->



        <?= $this->endSection('') ?>