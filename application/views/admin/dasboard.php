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
                    <a href="<?= base_url('admin/dasboard') ?>" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                    <a href="<?= base_url('admin/user') ?>" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Admin</span> </a>
                    <a href="<?= base_url('admin/member') ?>" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Member</span> </a>
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
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="card card-hover shadow-sm br-4">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <div class="number"><?= $paket ?></div>
                            <div class="cardName text-secondary">Paket</div>
                        </div>
                        <div class="iconBox">
                            <ion-icon name="file-tray-full-outline"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card card-hover shadow-sm br-4">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <div class="number"><?= $admin ?></div>
                            <div class="cardName text-secondary">Admin</div>
                        </div>
                        <div class="iconBox ">
                            <ion-icon name="person-outline"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card card-hover shadow-sm br-4">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <div class="number"><?= $member ?></div>
                            <div class="cardName text-secondary">Member</div>
                        </div>
                        <div class="iconBox">
                            <ion-icon name="person-outline"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card card-hover shadow-sm br-4">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <div class="number"><?= $order ?></div>
                            <div class="cardName text-secondary">Orders</div>
                        </div>
                        <div class="iconBox">
                            <ion-icon name="cart-outline"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-hover shadow-sm br-4">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <div class="number">
                                <?php
                                echo "Rp. " . number_format($dayTotal->TOTAL, 0, ',', '.');
                                ?>
                            </div>
                            <div class="cardName text-secondary">Penghasilan Hari ini</div>
                        </div>
                        <div class="iconBox">
                            <ion-icon name="card"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-hover shadow-sm br-4">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <div class="number"><?= "Rp. " . number_format($total->TOTAL, 0, ',', '.') ?></div>
                            <div class="cardName text-secondary">Total Penghasilan</div>
                        </div>
                        <div class="iconBox">
                            <ion-icon name="card"></ion-icon>
                        </div>
                    </div>
                </div>
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