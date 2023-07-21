<?= $this->extend('layout/vmain') ?>
<?= $this->extend('layout/vmenu') ?>

<?= $this->section('isi') ?>
<div class="row">
    <div class="col-sm-12">
        <h3>Transaksi Laundry </h3>
        <div class="card">
            <form method="POST" name="form_transaksi" action="<?= base_url('Transaksi/edit') ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Tanggal Transaksi</label>
                                <input type="hidden" value="" name="notransasksi">
                                <input type="date" name="tanggaltransaksi"
                                    value="<?= $datatransaksi['tanggaltransaksi'] ?>" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Tanggal Selesai</label>
                                <input type="date" name="tanggalselesai" value="<?= $datatransaksi['tanggalselesai'] ?>"
                                    class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nama Konsumen</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="hidden" id="idkon" value="<?= $datatransaksi['kodekonsumen'] ?>" readonly
                                    name="idkonsumen" class="form-control">
                                <input type="text" id="namakon" value="<?= $datatransaksi['namakonsumen'] ?>" readonly
                                    class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <button type="button" data-toggle="modal" data-target="#modaldatakonsumen"
                                    class="btn btn-primary">Cari Konsumen</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="hidden" id="idkat" value="<?= $datatransaksi['kode_detail'] ?>"
                                    name="idkategori" class="form-control">
                                <input type="text" id="namakat" value="<?= $datatransaksi['nama'] ?>"
                                    class="form-control">
                                <input type="text" id="namakat" value="<?= $datatransaksi['jenis'] ?>"
                                    class="form-control">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" placeholder="Harga/Kilo" id="hargakat"
                                    value="<?= $datatransaksi['harga_detail'] ?>" name="hargakategori"
                                    class="form-control">
                            </div>
                            <div class="col-sm-3">
                                <button type="button" data-toggle="modal" data-target="#modaldatakategori"
                                    class="btn btn-primary">Pilih Kategori</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Berat</label>
                        <div class="row">
                            <div class="col-sm-3">
                                <input type="text" name="berat" id="berat" value="<?= $datatransaksi['berat_detail'] ?>"
                                    class="form-control" onkeyup="cari_biaya()">
                            </div>
                            <div class="col-sm-1">
                                <p class="form-control">/kilo</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Total Biaya</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" value="<?= $datatransaksi['total'] ?>" readonly name="total"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
                </div>


            </form>

        </div>
    </div>
</div>

<script>
function pilihkonsumen(id, nama) {
    $('#idkon').val(id);
    $('#namakon').val(nama);
    $('#modaldatakonsumen').modal('hide');
}

function pilihkategori(id, nama, harga) {
    $('#idkat').val(id);
    $('#namakat').val(nama);
    $('#hargakat').val(harga);
    $('#modaldatakategori').modal('hide');
}

function cari_biaya() {
  var harga_kategori = parseInt(document.form_transaksi.hargakategori.value);
  var berat = parseInt(document.form_transaksi.berat.value);

  var total = harga_kategori * berat;

  // Menetapkan hasil ke elemen total dalam form
  document.form_transaksi.total.value = total;
}

</script>

<div class="modal fade" id="modaldatakonsumen">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Konsumen</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                <table id="datakonsumen" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Konsumen</th>
                            <th>Nama Konsumen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($data_konsumen as $d) :
                            $no++; ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $d['kodekonsumen']; ?></td>
                            <td><?php echo $d['namakonsumen']; ?></td>
                            <td>
                                <button type="button" class="btn btn-primary"
                                    onclick="return pilihkonsumen('<?php echo $d['kodekonsumen'] ?>','<?php echo $d['namakonsumen'] ?>')">
                                    Pilih
                                </button>
                            </td>
                        </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modaldatakategori">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                <table id="datakategori" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Kategori</th>
                            <th>Kategori</th>
                            <th>Jenis</th>
                            <th>Harga Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($data_kategori as $d) :
                            $no++; ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $d['id']; ?></td>
                            <td><?php echo $d['kode']; ?></td>
                            <td><?php echo $d['nama']; ?></td>
                            <td><?php echo $d['jenis']; ?></td>
                            <td><?php echo $d['harga']; ?></td>
                            <td>
                                <button type="button" class="btn btn-primary"
                                    onclick="return pilihkategori('<?php echo $d['id'] ?>','<?php echo $d['kode'] ?>','<?php echo $d['nama'] ?>','<?php echo $d['jenis'] ?>','<?php echo $d['harga'] ?>')">
                                    Pilih
                                </button>
                            </td>
                        </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection('') ?>