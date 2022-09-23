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
        <div class="container d-flex justify-content-center align-items-center">
                <div class="card p-3 shadow">
                    <form action="<?= base_url('prosesLogin') ?>" method="POST">
                        <div class="mb-3">
                            <h3 class="text-center text-uppercase">Berkah Laundry</h3>
                        </div>
                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control mt-1" placeholder="Masukkan Username">
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control mt-1" placeholder="Masukkan Password">
                        </div>
                        <div class="mb-3">
                            <button class="form-control">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- JAVASCRIPT -->
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <!-- JAVASCRIPT END -->
</body>

</html>