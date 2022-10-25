<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry App</title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <!-- CSS END -->
</head>

<body>
    <div class="bg-default">
        <div class="container container-login d-flex justify-content-center align-items-center">
            <div class="card card-login p-3 shadow">
                <form action="<?= base_url('prosesLogin') ?>" method="POST">
                    <div class="mb-3 d-flex justify-content-center flex-column align-items-center">
                        <img src="<?= base_url('assets/img/logoLaundry.png') ?>" width="80px" alt="">
                        <h3 class="text-header text-uppercase">Admin Login</h3>
                    </div>
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control mt-1" placeholder="Masukkan Username">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control mt-1" placeholder="Masukkan Password">
                    </div>
                    <div class="mb-3">
                        <button class="form-control btn btn-secondary1 shadow">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- JAVASCRIPT -->
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <!-- JAVASCRIPT END -->
</body>

</html>