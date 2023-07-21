<?= $this->extend('layout/vmain') ?>
<?= $this->extend('layout/vmenu') ?>

<?= $this->section('isi') ?>

<div class="col-sm-12">
    <div class="card m-b-60">
    <div class="card-body">
        <p class="card-text">

<h3> Data kategori </h3>
<?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php elseif (session()->getFlashdata('sukses')) :  ?>
            <div class="alert alert-success"><?= session()->getFlashdata('sukses') ?></div>
        <?php endif; ?>
    <button typr="button" class ="btn btn-sm btn-primary" data-target="#addModal" data-toggle="modal"> Tambah </button>

 <div class="card-body">
              <table id="datakategori" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th> No </th>          
                <th> Kode </th>
                <th> Nama </th>
                <th> Jenis </th>
                <th> Harga </th>              
                <th> Action </th>
                </tr>
                </thead>
              <tbody>
                        <?php $no = 0;
                        foreach ($data as $row) : $no++ ?>
                            <tr>
                                <td> <?= $no; ?> </td>
                             
                                <td> <?= $row['kode']; ?> </td>
                                <td> <?= $row['nama']; ?> </td>
                                <td> <?= $row['jenis']; ?> </td>
                                <td> <?= $row['harga']; ?> </td>
                                <td>
                                    
                                    <button type="button" class="btn btn-info btn-sm btn-edit" data-id="<?= $row['id']; ?>" data-kode="<?= $row['kode']; ?>" data-nama="<?= $row['nama']; ?>" data-harga="<?= $row['harga']; ?>" >
                                        <i class="fa fa-tags"></i>
                                    </button>

                                    <button type="button" class="btn btn-danger btn-sm " id="tombol-delete-kategori" onclick="hapusKategori('<?= $row['id'] ?>')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
              </tbody>            
</table>
</div>
</p>   
    </div>
</div>
</div>
</div>

<!-- Modal Tambah -->
<form action="<?php echo base_url('kategori/save'); ?>" method="post">

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="col-md-10">
             <label>Kode kategori </label>
             <input type="text" class="form-control" name="kode" placeholder="">
       </div>
       <div class="col-md-10">
             <label>Nama</label>
             <input type="text" class="form-control" name="nama">
       </div>
       <div class="col-md-10">
             <label>Jenis </label>
             <input type="text" class="form-control" name="jenis">
       </div>
       <div class="col-md-10">
             <label>Harga</label>
             <input type="text" class="form-control" name="harga">
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
<!-- akhir form tambah -->

 <!-- Form Edit -->
        <form action="<?= site_url('kategori/edit') ?>" method="post">
            <div class="modal fade" id="editkategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                                   
                            <div class="col-md-10">
                                <label>kode Kategori </label>
                                <input type="text" class="form-control kode" name="kode" placeholder="">
                                <input type="hidden" class="form-control id" name="id" placeholder="">
                            </div>

                            <div class="col-md-6">
                                <label>Nama </label>
                                <input type="text" class="form-control nama" name="nama">
                            </div>

                            <div class="col-md-6">
                                <label>Jenis  </label>
                                <input type="text" class="form-control nama" name="jenis">
                            </div>

                            <div class="col-md-6">
                                <label>Harga </label>
                                <input type="text" class="form-control harga" name="harga">
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
        <form action="<?= site_url('kategori/delete') ?>" method="post">
            <div class="modal fade" id="modalDeleteKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Kategori</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h3>Anda Yakin hapus?</h3>
                            <div class="modal-footer">
                                <input type="hidden" name="id" id="idkat" >
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">ya</button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
        <!-- akhir delete -->



<?=$this->endSection('') ?>