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
      <div class="card p-3">
         <form action="<?= base_url('admin/member/edit') ?>" method="post">
            <input type="hidden" name="id" value="<?= $ubah->id_member ?>">
            <div class="mb-3">
               <label for="nama" class="form-label">Nama</label>
               <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?= $ubah->nama ?>" required>
            </div>
            <div class="mb-3">
               <label for="username" class="form-label">Nama Pengguna</label>
               <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" value="<?= $ubah->username ?>" disabled>
            </div>
            <div class="mb-3">
               <label for="password" class="form-label">Kata Sandi</label>
               <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" value="<?= $ubah->password ?>" required>
            </div>
            <div class="mb-3">
               <label for="alamat" class="form-label">Alamat</label>
               <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="<?= $ubah->alamat ?>" required>
            </div>
            <div class="mb-3">
               <label for="">Jenis Kelamin</label>
               <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="lk" value="L" <?php if ($ubah->jenis_kelamin == "L") { ?> checked=checked <?php } ?>>
                  <label class="form-check-label" for="lk">
                     Laki - laki
                  </label>
               </div>
               <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" value="P" id="pr" <?php if ($ubah->jenis_kelamin == "P") { ?> checked=checked <?php } ?>>
                  <label class="form-check-label" for="pr">
                     Perempuan
                  </label>
               </div>
            </div>
            <div class="mb-3">
               <label for="telp" class="form-label">Telp</label>
               <input type="text" class="form-control" id="telp" name="telp" placeholder="Masukkan Telp" value="<?= $ubah->telp ?>" required>
            </div>
            <div class="mb-3 d-flex justify-content-between">
               <a href="<?= base_url('admin/member') ?>" class="btn btn-back">Kembali</a>
               <button class="btn btn-edit" data-bs-dismiss="modal">Simpan</button>
            </div>
         </form>
      </div>
   </div>
   <!-- Modal Edit End -->
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
   </script>
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
   <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
   <script src="<?= base_url('assets/js/script.js') ?>"></script>
   <!-- Javascript End -->
</body>

</html>