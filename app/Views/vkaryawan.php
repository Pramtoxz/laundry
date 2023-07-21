<?= $this->extend('layout/vmain') ?>
<?= $this->extend('layout/vmenu') ?>

<?= $this->section('isi') ?>

<div class="row">
    <div class="col-sm-12">
        <h3> Data Karyawan </h3>
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
                <table class="table table-bordered table-striped" id="datakaryawan">
                    <thead>
                        <th> No </th>
                        <th> ID Karyawan </th>
                        <th> Nama Karyawan </th>
                        <th> Alamat </th>
                        <th> No Telepon </th>
                        <th> Jenis Kelamin </th>
                        <th> Action </th>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($data as $row) : $no++ ?>
                        <tr>
                            <td> <?= $no; ?> </td>
                            <td> <?= $row['kodekaryawan']; ?> </td>
                            <td> <?= $row['namakaryawan']; ?> </td>
                            <td> <?= $row['alamatkaryawan']; ?> </td>
                            <td> <?= $row['notelpkaryawan']; ?> </td>
                            <td> <?= $row['jeniskelamin']; ?> </td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm btn-edit" data-id="<?= $row['id']; ?>"
                                    data-kode="<?= $row['kodekaryawan']; ?>" data-nama="<?= $row['namakaryawan']; ?>"
                                    data-alamat="<?= $row['alamatkaryawan']; ?>"
                                    data-notelepon="<?= $row['notelpkaryawan']; ?>"
                                    data-jk="<?= $row['jeniskelamin']; ?>">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm " id="tombol-delete-karyawan"
                                    onclick="hapusData('<?= $row['id'] ?>')">
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
        <form action="<?= site_url('karyawan/save') ?>" method="post">

            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-10">
                                <label>Kode Karyawan </label>
                                <input type="text" class="form-control" name="kodekaryawan" placeholder="kode Karyawan">
                            </div>
                            <div class="col-md-10">
                                <label>Nama Karyawan </label>
                                <input type="text" class="form-control" name="namakaryawan" placeholder="nama Karyawan">
                            </div>

                            <div class="col-md-10">
                                <label>Jenis Kelamin</label>
                                <br>
                                <input type="radio" name="jeniskelamin" value="Laki-Laki"> Laki-Laki &nbsp;
                                <input type="radio" name="jeniskelamin" value="Perempuan"> Perempuan
                            </div>

                            <div class="col-md-6">
                                <label>Alamat </label>
                                <input type="text" class="form-control" name="alamatkaryawan"
                                    placeholder="alamat karyawan">
                            </div>

                            <div class="col-md-6">
                                <label>No Telepon </label>
                                <input type="text" class="form-control" name="notelpkaryawan" placeholder="No telepon">
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
        <form action="<?= site_url('karyawan/edit') ?>" method="post">
            <div class="modal fade" id="editkaryawan" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-6">
                                <label>Kode Karyawan </label>
                                <input type="text" readonly class="form-control kodekaryawan" name="kode">
                                <input type="hidden" readonly class="form-control id" name="id">

                            </div>

                            <div class="col-md-10">
                                <label>Nama Karyawan </label>
                                <input type="text" class="form-control namakaryawan" name="nama"
                                    placeholder="nama karyawan">
                            </div>

                            <div class="col-md-10">
                                <label>Jenis Kelamin</label>
                                <br>
                                <input type="checkbox" name="jk" value="Laki-Laki"> Laki-Laki &nbsp;
                                <input type="checkbox" name="jk" value="Perempuan"> Perempuan
                            </div>

                            <div class="col-md-6">
                                <label>Alamat karyawan </label>
                                <input type="text" class="form-control alamatkaryawan" name="alamat">
                            </div>

                            <div class="col-md-6">
                                <label>No Telepon</label>
                                <input type="text" class="form-control notelpkaryawan" name="nohp">
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
        <form action="<?= site_url('karyawan/delete') ?>" method="post">
            <div class="modal fade" id="modalDeleteKaryawan" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Karyawan</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h3>Anda Yakin hapus?</h3>
                            <div class="modal-footer">
                                <input type="hidden" name="id" id="idkar">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">ya</button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
        <!-- akhir delete -->



        <?= $this->endSection('') ?>