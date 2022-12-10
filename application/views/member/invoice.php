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
                    <a href="<?= base_url('member/layanan') ?>" class="nav_link active">
                        <ion-icon name="layers-outline"></ion-icon> <span class="nav_name">Layanan</span>
                    </a>
                    <a href="<?= base_url('member/pesanan') ?>" class="nav_link">
                        <ion-icon name="cart-outline" class="nav_icon"></ion-icon> <span class="nav_name">Pesanan Saya</span>
                    </a>
                </div>
            </div>
            <a href="<?= base_url('member/logout') ?>" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sign Out</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <?php if ($this->session->flashdata('invoice') === null) { ?>
            <div class="container-fluid">
                <div class="row justify-content-center my-5">
                    <div class="col-md-5">
                        <div class="alert alert-danger">
                            <h4>Anda Telah MeRefresh Halaman !!</h4>
                            <p>Silahkan Lakukan Pemesanan Kembali Jika Belum Mendapatkan Kode Pembayaran</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else {  ?>
            <div class="row justify-content-center my-5">
                <div class="col-md-5">
                    <div class="alert alert-danger">
                        <h4>PERINGATAN!<br> JANGAN REFRESH HALAMAN INI !</h4>
                        <p>Untuk Menghindari Kegagalan Sistem.</p>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-success text-center">Selamat!</h1>
                            <h4 class="text-center">Anda Berhasil Melakukan Pemesanan di Berkah Laundry</h4>
                            <hr>
                            <h6 class="text-danger text-center">Silahkan Lakukan Pembayaran Sesuai Detail Berikut.</h6>
                            <br>
                            <h4 class="text-center">A00219301920139</h4>
                            <p class="text-center font-weight-bold mb-0">a/n Berkah Laundry</p>
                            <p class="text-center">BNI Syariah Kode Bank : 002</p>
                            <hr>
                            <?php if ($this->session->flashdata('pengiriman') === "Pengantaran") {
                                $total = $this->session->flashdata('total') + 10000 ?>
                                <h5 class="text-center">Total Yang Harus Dibayar</h5>
                                <h2 class="text-center">Rp. <?= number_format($total, 0, ',', '.') ?></h2>
                                <h6 class="text-danger text-center">*Harga termasuk biaya pengiriman</h6>
                            <?php } else { ?>
                                <h5 class="text-center">Total Yang Harus Dibayar</h5>
                                <h2 class="text-center">Rp. <?= number_format($this->session->flashdata('total'), 0, ',', '.') ?></h2>
                            <?php } ?>
                            <br>
                            <h5 class="text-center">Kode Pembayaran Anda</h5>
                            <h2 class="text-center"><?= $this->session->flashdata('invoice') ?></h2>
                            <hr>
                            <form action="<?= base_url('member/layanan/invoice/proses-pembayaran') ?>" method="post" enctype="multipart/form-data">
                                <label for="gambar">Bukti Transaksi</label>
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="hidden" name="id" value="<?= $this->session->flashdata('invoice') ?>">
                                        <input type="file" class="form-control" id="gambar" name="gambar" required>
                                    </div>
                                    <div class="col-md-2 p-0">
                                        <button class="btn btn-primary">Kirim</button>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <h4 class="text-center text-success">TERIMA KASIH</h4>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
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