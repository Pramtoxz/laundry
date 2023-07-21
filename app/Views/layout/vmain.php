<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laundry Kevin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/dist/css/adminlte.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?= base_url() ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light navbar-lightblue">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <a href="<?= site_url('Login/logout') ?>" class="btn btn-secondary"><i
                        class="fas fa-sign-out-alt"></i>Logout</a>
            </ul>

            <!-- Right navbar links -->

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?= $this->rendersection('vmenu') ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1></h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <?= $this->rendersection('isi') ?>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.1.0 Laundry
            </div>
            <strong>Byy: <a href="https://adminlte.io">Tobi Andrean J </a></strong> 
        </footer> -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="<?= base_url() ?>/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>/assets/dist/js/demo.js"></script>
    <!-- Page specific script -->
    <!-- DataTables -->
    <script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
    $(function() {
        bsCustomFileInput.init();
    });
    </script>

    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    </script>

    <script>
    function hapusData(id) {

        $('#idkar').val(id);
        $('#modalDeleteKaryawan').modal('show');
    }

    function hapusKategori(id) {
        $('#idkat').val(id);
        $('#modalDeleteKategori').modal('show');
    }
    </script>


    <script>
    // awal edit karyawan

    $('.btn-edit').on('click', function() {

        const kode = $(this).data('kode');
        const nama = $(this).data('nama');
        const jk = $(this).data('jk');
        const alamat = $(this).data('alamat');
        const notelepon = $(this).data('notelepon');


        $('.kodekaryawan').val(kode);
        $('.namakaryawan').val(nama);
        $('.jeniskelamin').val(jk);
        $('.alamatkaryawan').val(alamat);
        $('.notelpkaryawan').val(notelepon);
        $('#editkaryawan').modal('show');
    });


    $(document).ready(function() {
        $('#datakaryawan').DataTable();
    });
    </script>

    <!-- akhir edit karyawan -->

    <!-- //  awal tombol edit kategori -->

    <script>
    $('.btn-edit').on('click', function() {
        const id = $(this).data('id');
        const kode = $(this).data('kode');
        const nama = $(this).data('nama');
        const harga = $(this).data('harga');

        $('.id').val(id);
        $('.kode').val(kode);
        $('.nama').val(nama);
        $('.harga').val(harga);
        $('#editkategori').modal('show');
    });


    $(document).ready(function() {
        $('#datakategori').DataTable();
    });
    </script>
    <!-- // akhir tombol edit kategori -->

    <!-- awal delete konsumen -->
    <script>
    $('.tombol-delete').on('click', function() {
        const id = $(this).data('id_del');

        $('.delkodekonsumen').val(id);
        $('#deletekonsumen').modal('show');
    });


    //  akhir delete konsumen 

    // awaal edit konsumen
    $('.btn-edit').on('click', function() {
        const id = $(this).data('id');
        const nama = $(this).data('nama');
        const alamat = $(this).data('alamat');
        const notelepon = $(this).data('notelepon');


        $('.kodekonsumen').val(id);
        $('.namakonsumen').val(nama);
        $('.alamatkonsumen').val(alamat);
        $('.notelpkonsumen').val(notelepon);
        $('#editkonsumen').modal('show');
    });


    $(document).ready(function() {
        $('#datakonsumen').DataTable();
    });
    </script>


    <!-- akhir edit konsumen -->


    <!-- awal delete user -->
    <script>
    $('.tombol-delete').on('click', function() {
        const id = $(this).data('id_del');

        $('.deliduser').val(id);
        $('#deleteUser').modal('show');
    });

    // akhir delet user

    // awal edit user
    $('.btn-edit').on('click', function() {
        const nama = $(this).data('nama');
        const username = $(this).data('username');
        const password = $(this).data('password');
        const level = $(this).data('level');


        $('.namauser').val(nama);
        $('.username').val(username);
        $('.password').val(password);
        $('.level').val(level);
        $('#editUser').modal('show');
    });


    $(document).ready(function() {
        $('#datauser').DataTable();
    });
    </script>

    <!-- akhir edit user -->

    <!-- awal delete kategori -->
    <script>
    $('.tombol-delete').on('click', function() {
        const id = $(this).data('id_del');

        $('.delid').val(id);
        $('#deleteKategori').modal('show');
    });

    // akhir delet kategori

    $('.btn-edit').on('click', function() {
        const id = $(this).data('id');
        const kode = $(this).data('kode');
        const nama = $(this).data('nama');
        const harga = $(this).data('harga');


        $('.id').val(id);
        $('.kode').val(kode);
        $('.nama').val(nama);
        $('.harga').val(harga);
        $('#editkategori').modal('show');
    });


    $(document).ready(function() {
        $('#datakategori').DataTable();
    });

    $('.tombol-hapus').on('click', function() {
        const id = $(this).data('id_del');

        $('.delidtransaksi').val(id);
        $('#deleteTransaksi').modal('show');
    });
    </script>

    <!-- akhir edit kategori -->

    <script>
    $('.tombol-status').on('click', function() {
        const id_s = $(this).data('id_status');
        $('.stidtransaksi').val(id_s);
        $('#statustransaksi').modal('show');
    });
    </script>


</body>

</html>