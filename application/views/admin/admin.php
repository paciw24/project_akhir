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
            <div class="profile" onclick="menu()" style="cursor: pointer;">
                <span class="me-3"><?= $this->session->userdata('nama') ?></span>
                <img src="<?= base_url('assets/img/avatar.png') ?>" width="40px" height="40px">
            </div>
            <div class="menu shadow">
                <h3><?= $this->session->userdata('nama') ?><br><span><?= $this->session->userdata('username') ?></span></h3>
                <ul>
                    <li>
                        <ion-icon name="person-circle-outline"></ion-icon></i><a href="<?= base_url('admin/profile') ?>">Ubah Profil</a>
                    </li>
                    <li><i class='bx bx-log-out nav_icon'></i><a href="<?= base_url('logout') ?>">Logout</a></li>
                </ul>
            </div>
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
                    <a href="<?= base_url('admin/member') ?>" class="nav_link active"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Member</span> </a>
                    <a href="<?= base_url('admin/paket') ?>" class="nav_link">
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
                    <p>Pengaturan Admin</p>
                    <form action="<?= base_url('admin/user') ?>" method="post">
                        <div class="input-group" style="width: 400px!important;">
                            <input type="text" class="form-control" placeholder="Search" name="keyword" autocomplete="off" autofocus>
                            <input class="btn btn-edit" type="submit" name="submit">
                        </div>
                    </form>
                    <div class="">
                        <button class="add_new" id="myBtn" data-bs-toggle="modal" data-bs-target="#ModalTambah">+ Tambah Data</button>
                    </div>
                </div>
                <thead class="bg-pink">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nama Pengguna</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telp</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($user as $us) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $us['nama'] ?></td>
                            <td><?= $us['username'] ?></td>
                            <td><?= $us['email'] ?></td>
                            <td><?= $us['notelp'] ?></td>
                            <td>
                                <a class="btn btn-sm btn-edit" href="<?= base_url('admin/user/ubah/' . $us['id_user']) ?>" id="btnEdit">Edit</a>
                                <a onclick="HapusMenu(<?= $us['id_user'] ?>);" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-between align-items-center">
                <span class="text-pink1 text-capitalize mb-3">Menampilkan 1 dari <?= $total_rows ?> data</span>
                <?= $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>
    <!--Container Main end-->

    <!-- Modal Tambah -->
    <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content" style=" border:none!important;">
                <div class="modal-header" style="background: #FF758F;">
                    <h1 class="modal-title fs-5 text-uppercase fw-bold" style="color: #fff;" id="exampleModalLabel">Tambah Member</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/user/tambah') ?>" method="post">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Nama Pengguna</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="telp" class="form-label">Telp</label>
                            <input type="text" class="form-control" id="telp" name="telp" placeholder="Masukkan Telp" required>
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
    <script>
        function menu() {
            const menuToggle = document.querySelector('.menu');
            const profileToggle = document.querySelector('.profile');
            menuToggle.classList.toggle('active');
            profileToggle.classList.toggle('active');
        }
    </script>
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
                'Berhasil Dihapus!',
                'Data yang terhapus tidak bisa dikembalikan.',
                'success'
            )
        <?php } ?>

        function HapusMenu(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "<?= base_url('admin/user/hapusUser') ?>/" + id;
                }
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