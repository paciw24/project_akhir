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
         <form action="<?= base_url('admin/paket/edit') ?>" method="post">
            <input type="hidden" name="id" value="<?= $ubah->id_paket ?>">
            <div class="mb-3">
                <label for="jenis" class="form-label">jenis</label>
                    <select class="form-select" aria-label="jenis" name="jenis" id="jenis">
                        <?php 
                            if ($ubah->jenis == 'kiloan'){
                                echo "<option value='kiloan' selected >kiloan</option>";
                                echo "<option value='selimut'>Selimut</option>"; 
                                echo "<option value='bed_cover'>Bed Cover</option>";
                                echo "<option value='kaos'>Kaos</option>";
                                echo "<option value='lain'>lain</option>";
                            }
                            elseif($ubah->jenis == 'selimut'){
                                echo "<option value='kiloan' >kiloan</option>";
                                echo "<option value='selimut' selected >Selimut</option>"; 
                                echo "<option value='bed_cover'>Bed Cover</option>";
                                echo "<option value='kaos'>Kaos</option>";
                                echo "<option value='lain'>lain</option>";
                            }
                            elseif($ubah->jenis == 'bed_cover'){
                                echo "<option value='kiloan'>kiloan</option>";
                                echo "<option value='selimut'>Selimut</option>"; 
                                echo "<option value='bed_cover' selected >Bed Cover</option>";
                                echo "<option value='kaos'>Kaos</option>";
                                echo "<option value='lain'>lain</option>";
                            }
                            elseif($ubah->jenis == 'kaos'){
                                echo "<option value='kiloan'>kiloan</option>";
                                echo "<option value='selimut'>Selimut</option>"; 
                                echo "<option value='bed_cover'>Bed Cover</option>";
                                echo "<option value='kaos' selected >Kaos</option>";
                                echo "<option value='lain'>lain</option>";
                            }
                            else{
                                echo "<option value='kiloan'>kiloan</option>";
                                echo "<option value='selimut'>Selimut</option>"; 
                                echo "<option value='bed_cover'>Bed Cover</option>";
                                echo "<option value='kaos'>Kaos</option>";
                                echo "<option value='lain' selected >lain</option>";
                            }
                        ?>
                    </select>
            </div>
            <div class="mb-3">
                <label for="nama_paket" class="form-label">Nama Paket</label>
                    <input type="text" value="<?= $ubah->nama_paket?>" class="form-control" id="nmpaket" name="nmpaket" placeholder="Masukan Nama Paket" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                    <input type="number" value="<?= $ubah->harga?>" class="form-control" id="harga" name="Harga" placeholder="Harga" required>
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