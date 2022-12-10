<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD | BERKAH LAUNDRY</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/logo.png') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/member.css') ?>">
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
                    <li><i class='bx bx-log-out nav_icon'></i><a href="<?= base_url('member/logout') ?>">Logout</a></li>
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
                    <a href="<?= base_url('member/dashboard') ?>" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                    <a href="<?= base_url('member/layanan') ?>" class="nav_link">
                        <ion-icon name="layers-outline"></ion-icon> <span class="nav_name">Layanan</span>
                    </a>
                    <a href="<?= base_url('member/pesanan') ?>" class="nav_link active">
                        <ion-icon name="cart-outline" class="nav_icon"></ion-icon> <span class="nav_name">Pesanan Saya</span>
                    </a>
                </div>
            </div>
            <a href="<?= base_url('member/logout') ?>" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sign Out</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <div class="card px-3 shadow-sm">
            <table class="table table-striped table-hover">
                <div class="table_header">
                    <p>Pemesanan Saya</p>
                </div>
                <thead class="bg-pink">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Invoice</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-center">Verifikasi</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pesanan as $ps) { ?>
                        <tr>
                            <td class="align-middle"><?= ++$start ?></td>
                            <td class="align-middle"><?= $ps['kode_invoice'] ?></td>
                            <td class="align-middle"><?= $ps['tgl'] ?></td>
                            <td class="align-middle">
                                <?php
                                if ($ps['status'] == "baru") {
                                    echo "<span class='btn-baru'>Baru</span>";
                                } elseif ($ps['status'] == "proses") {
                                    echo "<span class='btn-proses'>Proses</span>";
                                } elseif ($ps['status'] == "selesai") {
                                    echo "<span class='btn-selesai'>Selesai</span>";
                                } else {
                                    echo "<span class='btn-diambil'>Diambil</span>";
                                }
                                ?>
                            </td>
                            <td class="align-middle text-center">
                                <?php if ($ps['bukti'] === null) { ?>
                                    <span class='btn-proses'>Belum Melakukan Pembayaran</span>
                                <?php } else { ?>
                                    <?php
                                    if ($ps['verifikasi_pembayaran'] == "setuju") {
                                        echo "<span class='btn-diambil'>Disetujui</span>";
                                    } elseif ($ps['verifikasi_pembayaran'] == "tolak") {
                                        echo "<span class='btn-selesai'>Ditolak</span>";
                                    } else {
                                        echo "<span class='btn-baru'>Sedang Proses Pemeriksaan</span>";
                                    }
                                    ?>
                                <?php } ?>
                            </td>
                            <td class="align-middle text-end">
                                <?php if ($ps['bukti'] === null) { ?>
                                    <a class="btn btn-sm btn-edit" href="<?= base_url('member/pesanan/pembayaran/' . $ps['kode_invoice']) ?>" id="btnEdit">Kirim Bukti Pembayaran</a>
                                <?php } else { ?>
                                    <?php if ($ps['verifikasi_pembayaran'] === 'setuju') { ?>
                                        <a class="btn btn-sm btn-edit" href="<?= base_url('member/pesanan/detail/' . $ps['kode_invoice']) ?>" id="btnEdit">Lihat Detail</a>
                                    <?php } elseif ($ps['verifikasi_pembayaran'] === 'tolak') { ?>
                                        <a class="btn btn-sm btn-edit" href="<?= base_url('member/pesanan/pembayaran/' . $ps['kode_invoice']) ?>" id="btnEdit">Kirim Ulang Bukti Pembayaran</a>
                                    <?php } else { ?>
                                        <a class="btn btn-sm btn-edit" href="<?= base_url('member/pesanan/detail/' . $ps['kode_invoice']) ?>" id="btnEdit">Lihat Detail</a>
                                    <?php } ?>
                                <?php } ?>
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
    <script>
        function menu() {
            const menuToggle = document.querySelector('.menu');
            const profileToggle = document.querySelector('.profile');
            menuToggle.classList.toggle('active');
            profileToggle.classList.toggle('active');
        }
    </script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>

</html>