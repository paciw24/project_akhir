<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD | BERKAH LAUNDRY</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
</head>

<body id="body-pd" class="bg-light">
    <header class="header position-relative bg-white shadow-sm" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="d-flex align-items-center">
            <span class="me-3">Farhan Rafahadi</span>
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
        <div class="card px-3 pt-3 shadow-sm">
            <div class="table_header">
                <p>Detail Pesanan</p>
            </div>
            <div class="table_list">
                <div class="list">
                    <div class="labelInfo">
                        <label for="invoice">Invoice</label>
                    </div>
                    <input type="text" value="<?= $transaksi->kode_invoice ?>" name="invoice" id="invoice" readonly>
                </div>
                <div class="list">
                    <div class="labelInfo">
                        <label for="tgl">Tanggal</label>
                    </div>
                    <input type="text" value="<?= $transaksi->tgl ?>" name="tgl" id="tgl" readonly>
                </div>
                <div class="list">
                    <div class="labelInfo">
                        <label for="namapembeli">Nama Member</label>
                    </div>
                    <input type="text" value="<?= $transaksi->NAMA_MEMBER ?>" name="namaMember" id="namaMember" readonly>
                </div>
                <div class="list">
                    <div class="labelInfo">
                        <label for="alamat">Alamat</label>
                    </div>
                    <input type="text" value="<?= $transaksi->ALAMAT ?>" name="alamat" id="alamat" readonly>
                </div>
                <div class="list">
                    <div class="labelInfo">
                        <label for="notelp">No Telp</label>
                    </div>
                    <input type="text" value="<?= $transaksi->TELP ?>" name="notelp" id="notelp" readonly>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <div class="table_header">
                    <p>Rincian Pesanan</p>
                </div>
                <thead class="bg-pink">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Paket</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Harga Satuan</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($detail as $dt) { ?>
                        <tr>
                            <td class="align-middle"><?= $no++ ?></td>
                            <td class="align-middle"><?= $dt->nama_paket ?></td>
                            <td class="align-middle"><?= $dt->jenis ?></td>
                            <td class="align-middle"><?php echo "Rp. " . number_format($dt->harga, 0, ',', '.'); ?></td>
                            <td class="align-middle"><?= $dt->qty ?></td>
                            <td class="align-middle">
                                <?php
                                echo "Rp. " . number_format($dt->subtotal, 0, ',', '.');
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <th scope="col" colspan="5" style="background: #FF758F!important; color: #fff!important;">Total Harga</th>
                        <th scope="col"><?= "Rp. " . number_format($transaksi->TOTAL, 0, ',', '.') ?></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!--Container Main end-->

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>

</html>