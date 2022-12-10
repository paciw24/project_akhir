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
        <div class="card px-3 pt-3 shadow-sm mb-3">
            <div class="table_header px-3 p-0 m-0">
                <p>Detail Pesanan</p>
                <div class="d-flex">
                    <div class="mb-3">
                        <?php
                        if ($transaksi->status == "baru") {
                            echo "<span class='btn-baru'>Baru</span>";
                        } elseif ($transaksi->status == "proses") {
                            echo "<span class='btn-proses'>Proses</span>";
                        } elseif ($transaksi->status == "selesai") {
                            echo "<span class='btn-selesai'>Selesai</span>";
                        } else {
                            echo "<span class='btn-diambil'>Diambil</span>";
                        }
                        ?>
                    </div>
                </div>
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
                <div class="list">
                    <div class="labelInfo">
                        <label for="pengiriman">Pengiriman</label>
                    </div>
                    <?php
                    if ($transaksi->pengiriman == "bayar_ditempat") {
                        echo "<input type='text' value='Ya' name='pengiriman' id='pengiriman' readonly>";
                    } else {
                        echo "<input type='text' value='Tidak' name='pengiriman' id='pengiriman' readonly>";
                    }
                    ?>
                </div>
                <div class="list">
                    <div class="labelInfoTextarea">
                        <label for="komen">Komentar</label>
                    </div>
                    <textarea name="komen" id="komen" readonly><?= $transaksi->komentar ?></textarea>
                </div>
            </div>
            <table class="table table-striped table-hover mt-5">
                <div class="table_header p-0 px-3 m-0 mt-5">
                    <p>Rincian Pesanan</p>
                    <div class="mb-0">
                        <?php
                        if ($transaksi->dibayar == "belum_dibayar") {
                            echo "<span class='btn-baru'>Belum Dibayar</span>";
                        } else {
                            echo "<span class='btn-diambil'>Dibayar</span>";
                        }
                        ?>
                    </div>
                </div>
                <thead class="bg-pink">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Paket</th>
                        <th scope="col">gambar</th>
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
                            <td class="align-middle">
                                <a href="<?= base_url('assets/gambar/' . $dt->gambar) ?>" target="_blank">
                                    <img src="<?= base_url('assets/gambar/' . $dt->gambar) ?>" class="img-bukti" alt="Gambar Bukti">
                                </a>
                            </td>
                            <td class="align-middle">Rp.<?php number_format($dt->harga, 0, ',', '.'); ?></td>
                            <td class="align-middle"><?= $dt->qty ?></td>
                            <td class="align-middle">
                                <?php
                                echo "Rp. " . number_format($dt->subtotal, 0, ',', '.');
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                    <?php
                    if ($transaksi->pengiriman == "Pengantaran") {
                        $total = $transaksi->TOTAL + 10000; ?>
                        <tr>
                            <th scope='col' colspan='5' class='bg-secondary text-white'>Harga Pengiriman</th>
                            <th scope='col'><?= "Rp. " . number_format(10000, 0, ',', '.') ?></th>
                        </tr>
                        <tr>
                            <th scope="col" colspan="5" style="background: #FF758F!important; color: #fff!important;">Total Harga</th>
                            <th scope="col"><?= "Rp. " . number_format($total, 0, ',', '.') ?></th>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <th scope="col" colspan="5" style="background: #FF758F!important; color: #fff!important;">Total Harga</th>
                            <th scope="col">Rp. <?= number_format($transaksi->TOTAL, 0, ',', '.') ?></th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="d-flex mb-3 justify-content-between">
                <a href="<?= base_url('admin/transaksi') ?>" class="btn btn-back">Kembali</a>
                <div class="d-flex">
                    <div class="me-2">
                        <form action="<?= base_url('admin/transaksi/updateStatus') ?>" method='post'>
                            <input type='hidden' value='<?= $transaksi->kode_invoice ?>' name='id'>
                            <?php
                            if ($transaksi->status == "baru") {
                                echo "<input type='hidden' value='proses' name='status'>";
                                echo "<button class='btn btn-back'>Proses</button>";
                            } elseif ($transaksi->status == "proses") {
                                echo "<input type='hidden' value='selesai' name='status'>";
                                echo "<button class='btn btn-back'>selesai</button>";
                            } elseif ($transaksi->status == "selesai") {
                                echo "<input type='hidden' value='diambil' name='status'>";
                                echo "<button class='btn btn-back'>diambil</button>";
                            } else {
                                echo "";
                            }
                            ?>
                        </form>
                    </div>
                    <div class="">
                        <?php
                        if ($transaksi->dibayar == "belum_dibayar") {
                            echo "<button class='btn btn-edit' data-bs-toggle='modal' data-bs-target='#ModalBayar'>Bayar</button>";
                        } else {
                            echo "";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Container Main end-->
    <!-- Modal Bayar -->
    <div class="modal fade" id="ModalBayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content" style=" border:none!important;">
                <div class="modal-body">
                    <form action="<?= base_url('admin/transaksi/bayar') ?>" method="post">
                        <input type="hidden" name="id" value="<?= $transaksi->kode_invoice ?>">
                        <input type="hidden" name="bayar" value="dibayar">
                        <div class="mb-3">
                            <label for="total" class="form-label">Total Bayar</label>
                            <input type="text" class="form-control" id="total" name="total" value="<?= $transaksi->TOTAL ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="total" class="form-label">Cash</label>
                            <input type="text" class="form-control" id="cash" name="cash" placeholder="Masukkan Uang" required>
                        </div>
                        <div class="mb-3 d-flex justify-content-end">
                            <button class="add_new">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal bayar End -->
    <script>
        function menu() {
            const menuToggle = document.querySelector('.menu');
            const profileToggle = document.querySelector('.profile');
            menuToggle.classList.toggle('active');
            profileToggle.classList.toggle('active');
        }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>

</html>