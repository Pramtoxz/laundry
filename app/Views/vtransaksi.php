<?= $this->extend('layout/vmain') ?>
<?= $this->extend('layout/vmenu') ?>

<?= $this->section('isi') ?>

<div class="row">
    <div class="col-sm-12">
        <h3> Data Transaksi Laundry </h3>
        <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php elseif (session()->getFlashdata('sukses')) :  ?>
        <div class="alert alert-success"><?= session()->getFlashdata('sukses') ?></div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">
                <a class="btn btn-sm btn-primary" href="<?= base_url('transaksi/tambah_transaksi') ?>"> <i
                        class="fa fa-plus-circle" aria-hidden="true"></i> Tambah </a>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped table-sm" id="datatransaksi">
                    <thead>
                        <th> No </th>
                        <th>No. Transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th> Nama Konsumen </th>
                        <th> Nama Kategori </th>
                        <th> Jenis Kategori</th>
                        <th> Harga Perkilo</th>
                        <th> Berat</th>
                        <th> Total Biaya</th>
                        <th> Tanggal Selesai</th>
                        <th> Status </th>
                        <th> Action </th>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 0;
                        $total1=0 ;
                        foreach ($transaksi->getResultArray() as $row) : 
                            $no++;
                        $total1 = $row['berat_detail'] * $row['harga_detail']; 

                        ?>
                        <tr>
                            <td> <?= $no; ?> </td>
                            <td> <?= $row['notransaksi'] ?> </td>
                            <td> <?= $row['tanggaltransaksi']; ?> </td>
                            <td> <?= $row['namakonsumen']; ?> </td>
                            <td> <?= $row['nama']; ?> </td>
                            <td> <?= $row['jenis']; ?> </td>
                            <td> <?= $row['harga_detail']; ?> </td>
                            <td> <?= $row['berat_detail']; ?> </td>
                            <td> <?= $total1; ?> </td>
                            <td> <?= $row['tanggalselesai']; ?> </td>
                            <td>
                                <?php
                                    if ($row['status'] == 1) { ?>
                                <p class="btn btn-xs btn-warning">Proses</p>
                                <?php } else if ($row['status'] == 2) { ?>
                                <p class="btn btn-xs btn-danger">Belum Bayar</p>
                                <?php    } else { ?>
                                <p class="btn btn-xs btn-success">Selesai</p>
                                <?php     } ?>



                            <td>
                                <button type="button" <?php if ($row['status'] == 'Selesai') echo 'disabled'; ?>
                                    class="btn btn-success btn-sm tombol-status"
                                    data-id_status="<?= $row['idtransaksi']; ?>">
                                    <i class="fas fa-exchange-alt"></i>
                                </button>

                                <a class="btn btn-info btn-sm btn-edit"
                                    href="<?= base_url('transaksi/edit_transaksi/' . $row['idtransaksi'] . '') ?>">
                                    <i class="fa fa-edit"></i>
                                </a>                              
                                <button type="button" class="btn btn-danger btn-sm tombol-hapus"
                                    data-id_del="<?= $row['idtransaksi']; ?>">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <a href="<?= base_url('Transaksi/CetakFaktur/'. $row['idtransaksi']) ?>" target="_blank" class="btn btn-sm btn-secondary"><i class="fas fa-print"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- delete -->
<form action="<?= base_url('transaksi/delete') ?>" method="post">
    <div class="modal fade" id="deleteTransaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>Yakin hapus?</h3>
                    <div class="modal-footer">
                        <input type="hidden" name="idtransaksi" class="delidtransaksi">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">ya</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- akhir delete -->

<form action="<?= base_url('transaksi/edit') ?>" method="post">
    <div class="modal fade" id="edittransaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-6">
                        <label>Tanggal Transaksi </label>
                        <input type="text" readonly class="form-control tanggaltransaksi" name="tanggaltransaksi">
                    </div>

                    <div class="col-md-10">
                        <label>tanggal selesai </label>
                        <input type="text" class="form-control tanggalselesai" name="tanggalselesai"
                            placeholder="nama konsumen">
                    </div>

                    <div class="col-md-6">
                        <label>Nama Konsumen </label>
                        <input type="text" class="form-control namakonsumen" name="namakonsumen">
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

<form action="<?= base_url('transaksi/edit_status_transaksi') ?>" method="post">
    <div class="modal fade" id="statustransaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Status Transaksi</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                            <input type="radio" value="1" id="radioPrimary1" name="status" checked="">
                            <label for="radioPrimary1">Proses
                            </label>
                        </div>

                        <div class="icheck-primary d-inline">
                            <input type="radio" value="2" id="radioPrimary2" name="status">
                            <label for="radioPrimary2">Belum Dibayar
                            </label>
                        </div>
                        <div class="icheck-primary d-inline">
                            <input type="radio" value="3" id="radioPrimary3" name="status">
                            <label for="radioPrimary3">Sudah Dibayar
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="idtransaksi" class="stidtransaksi">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<?= $this->endSection('') ?>