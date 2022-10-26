<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
</head>

<body id="body-pd" class="bg-light">
    <header class="header position-relative" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="d-flex align-items-center">
            <span class="me-3">Farhan Rafahadi</span>
            <div class="header_img">
                <img src="https://i.imgur.com/hczKIze.jpg" alt="">
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
                    <a href="#" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                    <a href="<?= base_url('admin/user') ?>" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Admin</span> </a>
                    <a href="<?= base_url('admin/member') ?>" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Member</span> </a>
                    <a href="<?= base_url('admin/outlet') ?>" class="nav_link">
                        <ion-icon name="storefront-outline" class="nav_icon"></ion-icon> <span class="nav_name">Outlet</span>
                    </a>
                    <a href="<?= base_url('admin/transaksi') ?>" class="nav_link">
                        <ion-icon name="cart-outline" class="nav_icon"></ion-icon> <span class="nav_name">Transaksi</span>
                    </a>
                </div>
            </div>
            <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
   <div class="height-100 bg-light">
      <table class="table table-striped table-hover">
        <div class="table_header">
                <p>Pengaturan Menu</p>
                <div class="">
                    <input type="text" id="cari" name="cari" placeholder="Cari">
                    <button class="add_new" id="myBtn">+ Tambah Data</button>
                </div>
            </div>
         <thead class="bg-pink">
            <tr>
               <th scope="col">No</th>
               <th scope="col">Nama</th>
               <th scope="col">Username</th>
               <th scope="col">Alamat</th>
               <th scope="col">Jenis Kelamin</th>
               <th scope="col">Telp</th>
               <th scope="col">Action</th>
            </tr>
         </thead>
         <tbody>
            <?php $no = 1; ?>
            <?php foreach ($member as $mem) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $mem->nama ?></td>
                <td><?= $mem->username ?></td>
                <td><?= $mem->alamat ?></td>
                <td>
                    <?php 
                        if($mem->jenis_kelamin == "P"){
                            echo "Perempuan";
                        }else{
                            echo "Laki - Laki";
                        }
                    ?>
                </td>
                <td><?= $mem->telp ?></td>
                <td>
                    <a class="btn btn-sm" style="background: #ffb3c1;" href="" id="btnEdit">Edit</a>
                    <a onclick="" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
            <?php } ?>
         </tbody>
      </table>
   </div>
    <!--Container Main end-->

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>

</html>