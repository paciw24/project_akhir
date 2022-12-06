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
                    <a href="<?= base_url('member/dashboard') ?>" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                    <a href="<?= base_url('member/layanan') ?>" class="nav_link">
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
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <?php foreach ($layanan as $ly) { ?>
                        <div class="col-md-6">
                            <div class="card shadow-sm">
                                <div class="card-body p-0 d-flex justify-content-center flex-column align-items-center">
                                    <img src="<?= base_url('assets/gambar/' . $ly->gambar) ?>" width="70%" class="format-img">
                                    <p class="format-nama"><?= $ly->nama_paket ?></p>
                                    <p class="format-harga"><?= $ly->harga ?></p>
                                    <button type="button" class="tambah btn-keranjang" style="border: none!important;" data-action="add-to-cart">Masukkan Keranjang</button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h4 class="badge-pill badge-light mt-3 mb-3 p-2 text-center">Keranjang</h4>
                    <div class="cart"></div>
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
        "use strict";
        let cart = [];
        let cartTotal = 0;
        const cartDom = document.querySelector(".cart");
        const addtocartbtnDom = document.querySelectorAll('[data-action="add-to-cart"]');

        addtocartbtnDom.forEach(addtocartbtnDom => {
            addtocartbtnDom.addEventListener("click", () => {
                const productDom = addtocartbtnDom.parentNode.parentNode;
                const product = {
                    img: productDom.querySelector(".format-img").getAttribute("src"),
                    name: productDom.querySelector(".format-nama").innerText,
                    price: productDom.querySelector(".format-harga").innerText,
                    quantity: 1
                };

                const IsinCart = cart.filter(cartItem => cartItem.name === product.name).length > 0;
                if (IsinCart === false) {
                    cartDom.insertAdjacentHTML("beforeend", `
                    <div class="d-flex flex-row shadow-sm card cart-items m-3 pe-3 animated flipInX align-items-center justify-content-between">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="p-2">
                                <img src="${product.img}" alt="${product.name}" style="max-width: 70px;"/>
                            </div>
                            <div class="p-2 mt-3">
                                <p class="text-info cart_item_name" style="font-size:16px; margin: 0px;">${product.name}</p>
                                <p class="text-success cart_item_price">${product.price}</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="p-2 mt-3 ml-auto">
                                <button class="btn badge bg-secondary" type="button" data-action="increase-item">&plus;
                            </div>
                            <div class="p-2 mt-3">
                                <p class="text-success cart_item_quantity">${product.quantity}</p>
                            </div>
                            <div class="p-2 mt-3">
                                <button class="btn badge bg-info" type="button" data-action="decrease-item">&minus;
                            </div>
                        </div>
                        <div class="p-2">
                            <button class="btn badge bg-danger" type="button" data-action="remove-item">&times;
                        </div>
                    </div>` );

                    if (document.querySelector('.cart-footer') === null) {
                        cartDom.insertAdjacentHTML("afterend", `
                        <div class="d-flex flex-row shadow-sm card cart-footer m-3 animated flipInX">
                            <div class="p-2">
                            <button class="btn bg-danger text-white" type="button" data-action="clear-cart">Bersihkan Keranjang
                            </div>
                            <div class="p-2 ml-auto">
                            <button class="btn bg-dark text-white" type="button" data-action="check-out">Bayar <span class="pay"></span> 
                                &#10137;
                            </div>
                        </div>`);
                    }

                    addtocartbtnDom.innerText = "In cart";
                    addtocartbtnDom.disabled = true;
                    cart.push(product);

                    const cartItemsDom = cartDom.querySelectorAll(".cart-items");
                    cartItemsDom.forEach(cartItemDom => {

                        if (cartItemDom.querySelector(".cart_item_name").innerText === product.name) {

                            cartTotal += parseInt(cartItemDom.querySelector(".cart_item_quantity").innerText) *
                                parseInt(cartItemDom.querySelector(".cart_item_price").innerText);
                            document.querySelector('.pay').innerText = " Rp. " + cartTotal ;

                            // increase item in cart
                            cartItemDom.querySelector('[data-action="increase-item"]').addEventListener("click", () => {
                                cart.forEach(cartItem => {
                                    if (cartItem.name === product.name) {
                                        cartItemDom.querySelector(".cart_item_quantity").innerText = ++cartItem.quantity;
                                        cartItemDom.querySelector(".cart_item_price").innerText = parseInt(cartItem.quantity) * parseInt(cartItem.price) ;
                                        cartTotal += parseInt(cartItem.price)
                                        document.querySelector('.pay').innerText = "Rp. " + cartTotal;
                                    }
                                });
                            });

                            // decrease item in cart
                            cartItemDom.querySelector('[data-action="decrease-item"]').addEventListener("click", () => {
                                cart.forEach(cartItem => {
                                    if (cartItem.name === product.name) {
                                        if (cartItem.quantity > 1) {
                                            cartItemDom.querySelector(".cart_item_quantity").innerText = --cartItem.quantity;
                                            cartItemDom.querySelector(".cart_item_price").innerText = parseInt(cartItem.quantity) * parseInt(cartItem.price);
                                            cartTotal -= parseInt(cartItem.price)
                                            document.querySelector('.pay').innerText = "Rp. " + cartTotal;
                                        }
                                    }
                                });
                            });

                            //remove item from cart
                            cartItemDom.querySelector('[data-action="remove-item"]').addEventListener("click", () => {
                                cart.forEach(cartItem => {
                                    if (cartItem.name === product.name) {
                                        cartTotal -= parseInt(cartItemDom.querySelector(".cart_item_price").innerText);
                                        document.querySelector('.pay').innerText = cartTotal + " Rs.";
                                        cartItemDom.remove();
                                        cart = cart.filter(cartItem => cartItem.name !== product.name);
                                        addtocartbtnDom.innerText = "Add to cart";
                                        addtocartbtnDom.disabled = false;
                                    }
                                    if (cart.length < 1) {
                                        document.querySelector('.cart-footer').remove();
                                    }
                                });
                            });

                            //clear cart
                            document.querySelector('[data-action="clear-cart"]').addEventListener("click", () => {
                                cartItemDom.remove();
                                cart = [];
                                cartTotal = 0;
                                if (document.querySelector('.cart-footer') !== null) {
                                    document.querySelector('.cart-footer').remove();
                                }
                                addtocartbtnDom.innerText = "Add to cart";
                                addtocartbtnDom.disabled = false;
                            });

                            document.querySelector('[data-action="check-out"]').addEventListener("click", () => {
                                if (document.getElementById('paypal-form') === null) {
                                    checkOut();
                                }
                            });
                        }
                    });
                }
            });
        });

        function animateImg(img) {
            img.classList.add("animated", "shake");
        }

        function normalImg(img) {
            img.classList.remove("animated", "shake");
        }

        function checkOut() {
            let paypalHTMLForm = `
                <form id="paypal-form" action="" method="post" >
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="upload" value="1">
                    <input type="hidden" name="business" value="gmanish478@gmail.com">
                    <input type="hidden" name="currency_code" value="INR">`;

            cart.forEach((cartItem, index) => {
                ++index;
                paypalHTMLForm += ` <input type="hidden" name="item_name_${index}" value="${cartItem.name}">
                    <input type="hidden" name="amount_${index}" value="${cartItem.price.replace("Rs.","")}">
                    <input type="hidden" name="quantity_${index}" value="${cartItem.quantity}">`;
                            });

            paypalHTMLForm += `<input type="submit" value="PayPal" class="paypal">
                </form><div class="overlay">Please wait...</div>`;
            document.querySelector('body').insertAdjacentHTML("beforeend", paypalHTMLForm);
            document.getElementById("paypal-form").submit();
        }
    </script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>

</html>