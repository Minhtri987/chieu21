<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Mobile Accessories Shop</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- SB Admin 2 CSS -->
    <link href="/chieu2/public/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>

<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/chieu21" style="color: #8202de; font-weight: bold">GDC1 Store</a>
        <div class="vl" style="border-left: 2px solid #f007dc;  height: 40px;  margin: 0 10px;"></div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php if ( isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" style="color: #8202de; font-weight: bold" aria-current="page" href="/chieu21/product/add">Add Products</a></li>
                <li class="nav-item"><a class="nav-link active" style="color: #8202de; font-weight: bold" aria-current="page" href="/chieu21/cart/showOrders">List Orders</a></li>
            </ul>
            <?php endif; ?>
            <!-- Cart Button -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item" style="margin-top: 8px;">
                    <form class="d-flex" action="/chieu21/cart/show">
                        <button class="btn btn-outline-warning" type="submit" style="color: #8202de; font-weight: bold;border-color: #f007dc;">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <?php
                            $count = 0;
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $item) {
                                    $count += 1;
                                }
                            }
                            ?>
                            <span class="badge text-white ms-1 rounded-pill" style="background:#8202de; "><?php echo $count; ?></span>
                        </button>
                    </form>
                </li>

                <!-- User Information Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#8202de">
                        <span class="mr-2 d-none d-lg-inline small" style="font-weight: bolder;color: #8202de;">
                            <?php
                            if(Auth::isLoggedIn()){
                                echo $_SESSION['username'];
                            }
                            ?>
                        </span>
                        <img class="img-profile rounded-circle" style="width: 40px; height: auto" src="/chieu21/public/img/undraw_profile.svg">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <?php if ( isset($_SESSION['role']) && $_SESSION['role'] == 'user') : ?>
                        <a class="dropdown-item" href="/chieu21/cart/showOrders" style="font-weight: bold;color: #8202de;">
                            <i class="fas fa-user fa-sm fa-fw mr-2 " ></i>
                            List of Orders
                        </a>
                        <div class="dropdown-divider"></div>
                        <?php endif; ?>
                        <a class="dropdown-item" href="/chieu21/account/logout" style="font-weight: bold;color: #8202de;">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 "></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Header-->
<header class="bg-dark py-5" style="background: linear-gradient(to bottom, #8202de, #f007dc);">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder" style="font-weight: bold">Mobile Accessories Shop</h1>
            <p class="lead fw-normal mb-0" style="font-weight: bold;color:#ffd103;">Selling accessories with affordable price. For gamers by games.</p>
        </div>
    </div>
</header>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
