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
                    <a href="<?= base_url('admin/paket') ?>" class="nav_link">
                        <ion-icon name="briefcase-outline" class="nav_icon"></ion-icon><span class="nav_name">Paket</span>
                    </a>
                    <a href="<?= base_url('admin/transaksi') ?>" class="nav_link active">
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
                    <p>Pengaturan Transaksi</p>
                    <div class="">
                        <input type="text" id="cari" name="cari" placeholder="Cari">
                        <button class="add_new">+ Tambah Data</button>
                    </div>
                </div>
                <thead class="bg-pink">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Invoice</th>
                        <th scope="col">Nama Member</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status</th>
                        <th scope="col">Dibayar</th>
                        <th scope="col">Bukti</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($transaksi as $tr) { ?>
                        <tr>
                            <td class="align-middle"><?= $no++ ?></td>
                            <td class="align-middle"><?= $tr->kode_invoice ?></td>
                            <td class="align-middle"><?= $tr->NAMA_MEMBER ?></td>
                            <td class="align-middle"><?= $tr->tgl ?></td>
                            <td class="align-middle">
                                <?php
                                if ($tr->status == "baru") {
                                    echo "<span class='btn-baru'>Baru</span>";
                                } elseif ($tr->status == "proses") {
                                    echo "<span class='btn-proses'>Proses</span>";
                                } elseif ($tr->status == "selesai") {
                                    echo "<span class='btn-selesai'>Selesai</span>";
                                } else {
                                    echo "<span class='btn-diambil'>Diambil</span>";
                                }
                                ?>
                            </td>
                            <td class="align-middle">
                                <?php
                                if ($tr->dibayar == "belum_dibayar") {
                                    echo "<span class='btn-diambil'>Belum Dibayar</span>";
                                } else {
                                    echo "<span class='btn-baru'>Dibayar</span>";
                                }
                                ?>
                            </td>
                            <td class="align-middle">
                                <a href="<?= base_url('assets/img/logo.png') ?>" target="_blank">
                                    <img src="<?= base_url('assets/img/logo.png') ?>" class="img-bukti" alt="Gambar Bukti">
                                </a>
                            </td>
                            <td class="align-middle">
                                <a class="btn btn-sm btn-edit" href="<?= base_url('admin/transaksi/detail/' . $tr->id_transaksi) ?>" id="btnEdit">Lihat Detail</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--Container Main end-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        <?php if ($this->session->flashdata('success')) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil Disimpan',
                showConfirmButton: false,
                timer: 2000
            })
        <?php } ?>
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>

</html>