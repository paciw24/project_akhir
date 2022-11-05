<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD | BERKAH LAUNDRY</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/logo.png') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
</head>

<body id="body-pd" class="bg-light">
    <header class="header position-relative bg-white shadow-sm" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="d-flex align-items-center">
            <span class="me-3"><?= $this->session->userdata('nama') ?></span>
            <div class="avatar" data-label="FR"></div>
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo">
                    <img class="nav_logo-icon" src="<?= base_url('assets/img/logo.png') ?>" alt="" srcset=""><span class="nav_logo-name">Berkah Laundry</span>
                </a>
                <div class="nav_list">
                    <a href="<?= base_url('admin/dasboard') ?>" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                    <a href="<?= base_url('admin/user') ?>" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Admin</span> </a>
                    <a href="<?= base_url('admin/member') ?>" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Member</span> </a>
                    <a href="<?= base_url('admin/paket') ?>" class="nav_link active">
                        <ion-icon name="briefcase-outline" class="nav_icon"></ion-icon><span class="nav_name">Paket</span>
                    </a>
                    <a href="<?= base_url('admin/transaksi') ?>" class="nav_link">
                        <ion-icon name="cart-outline" class="nav_icon"></ion-icon> <span class="nav_name">Transaksi</span>
                    </a>
                </div>
            </div>
            <a href="<?= base_url('logout') ?>" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sign Out</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <div class="card px-3 shadow-sm">
            <table class="table table-striped table-hover">
                <div class="table_header">
                    <p>Pengaturan Member</p>
                    <div class="">
                        <input type="text" id="cari" name="cari" placeholder="Cari">
                        <button class="add_new" id="myBtn" data-bs-toggle="modal" data-bs-target="#ModalTambah">+ Tambah Data</button>
                    </div>
                </div>
                <thead class="bg-pink">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Nama Paket</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($paket as $pt) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $pt->jenis ?></td>
                            <td><?= $pt->nama_paket?></td>
                            <td><?= $pt->harga?></td>
                            <td>
                                <a class="btn btn-sm btn-edit" href="<?= base_url('admin/paket/ubah/' . $pt->id_paket) ?>" id="btnEdit">Edit</a>
                                <a onclick="HapusMenu();" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--Container Main end-->

    <!-- Modal Tambah -->
    <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content" style=" border:none!important;">
                <div class="modal-header" style="background: #FF758F;">
                    <h1 class="modal-title fs-5 text-uppercase fw-bold" style="color: #fff;" id="exampleModalLabel">Tambah Paket</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/paket/tambah') ?>" method="post">
                        <div class="mb-3">
                            <label for="jenis" class="form-label">jenis</label>
                            <select class="form-select" aria-label="jenis" name="jenis" id="jenis">
                                <option selected>Pilih Jenis</option>
                                <option value="kiloan">kiloan</option>
                                <option value="selimut">Selimut</option>
                                <option value="bed_cover">Bed Cover</option>
                                <option value="kaos">Kaos</option>
                                <option value="lain">lain</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama_paket" class="form-label">Nama Paket</label>
                            <input type="text" class="form-control" id="nmpaket" name="nmpaket" placeholder="Masukan Nama Paket" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="Harga" placeholder="Harga" required>
                        </div>
                        <div class="mb-3 d-flex justify-content-end">
                            <button class="add_new" data-bs-dismiss="modal">Simpan</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer" style="background: #FF758F; height:60px">
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Tambah End -->
    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript">
        <?php if ($this->session->flashdata('success')) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil Disimpan',
                showConfirmButton: false,
                timer: 2000
            })
        <?php } ?>
        <?php if ($this->session->flashdata('delete')) { ?>
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        <?php } ?>
        function HapusMenu() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                <?php foreach ($paket as $pt) { ?>
                    window.location.href = "<?= base_url('admin/paket/hapusPaket/' . $pt->id_paket) ?>";
                <?php } ?>
            })
        }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
    <!-- Javascript End -->
</body>

</html>