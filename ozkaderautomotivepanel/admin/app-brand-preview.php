<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Ecommerce Shop | CORK - Multipurpose Bootstrap Dashboard Template </title>
    <link rel="icon" type="image/x-icon" href="../src/assets/img/favicon.ico" />
    <link href="../layouts/modern-light-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/modern-light-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="../layouts/modern-light-menu/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/modern-light-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/modern-light-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <!--  END CUSTOM STYLE FILE  -->
</head>

<body class="" data-bs-spy="scroll" data-bs-bs-target="#navSection" data-bs-offset="140">

    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

    <?php 
    include_once('../website_parts/navbar.php');
    ?>

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">

            <nav id="sidebar">

                <div class="navbar-nav theme-brand flex-row  text-center">
                    <div class="nav-logo">
                        <div class="nav-item theme-logo">
                            <a href="./index.html">
                                <img src="../src/assets/img/logo.svg" class="navbar-logo" alt="logo">
                            </a>
                        </div>
                        <div class="nav-item theme-text">
                            <a href="./index.html" class="nav-link"> CORK </a>
                        </div>
                    </div>
                    <div class="nav-item sidebar-toggle">
                        <div class="btn-toggle sidebarCollapse">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevrons-left">
                                <polyline points="11 17 6 12 11 7"></polyline>
                                <polyline points="18 17 13 12 18 7"></polyline>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="profile-info">
                    <div class="user-info">
                        <div class="profile-img">
                            <img src="../src/assets/img/profile-30.png" alt="avatar">
                        </div>
                        <div class="profile-content">
                            <h6 class="">Shaun Park</h6>
                            <p class="">Project Leader</p>
                        </div>
                    </div>
                </div>

                <div class="shadow-bottom"></div>

                <ul class="list-unstyled menu-categories" id="accordionExample">

                    <li class="menu">
                        <a href="#dashboard" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                <span>Panel</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="dashboard" data-bs-parent="#accordionExample">
                            <li>
                                <a href="./index.php"> Anasayfa </a>
                            </li>
                            <li>
                                <a href="../../index.html"> Site </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg><span>Uygulamalar</span></div>
                    </li>

                    <li class="menu active">
                        <a href="#brands" data-bs-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-shopping-cart">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                <span>Markalar</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled show" id="brands" data-bs-parent="#accordionExample">
                            <li>
                                <a href="./app-brand-list.php"> Marka Listesi </a>
                            </li>
                            <li>
                                <a href="./app-brand-add.php"> Marka Ekle </a>
                            </li>
                        </ul>
                    </li>

                </ul>

            </nav>

        </div>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">

            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">App</a></li>
                                <li class="breadcrumb-item"><a href="#">Ecommerce</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Shop</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->

                    <div class="row layout-top-spacing">
                        <div class="col-lg-3 col-md-3 col-sm-3 mb-4">
                            <input id="t-text" type="text" name="txt" placeholder="Search" class="form-control"
                                required="">
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 mb-4 ms-auto">
                            <select class="form-select form-select" aria-label="Default select example">
                                <option selected="">All Category</option>
                                <option value="3">Apperal</option>
                                <option value="1">Electronics</option>
                                <option value="2">Clothing</option>
                                <option value="3">Accessories</option>
                                <option value="3">Organic</option>
                            </select>
                        </div>

                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 mb-4">
                            <select class="form-select form-select" aria-label="Default select example">
                                <option selected="">Sort By</option>
                                <option value="1">Low to High Price</option>
                                <option value="2">Most Viewed</option>
                                <option value="3">Hight to Low Price</option>
                                <option value="3">On Sale</option>
                                <option value="3">Newest</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                            <a class="card style-6" href="./app-ecommerce-product.html">
                                <span class="badge badge-primary">NEW</span>
                                <img src="../src/assets/img/product-3.jpg" class="card-img-top" alt="...">
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <b>Nike Green Shoes</b>
                                        </div>
                                        <div class="col-3">
                                            <div class="badge--group">
                                                <div class="badge badge-primary badge-dot"></div>
                                                <div class="badge badge-danger badge-dot"></div>
                                                <div class="badge badge-info badge-dot"></div>
                                            </div>
                                        </div>
                                        <div class="col-9 text-end">
                                            <div class="pricing d-flex justify-content-end">
                                                <p class="text-success mb-0">$150.00</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                            <a class="card style-6" href="./app-ecommerce-product.html">
                                <span class="badge badge-danger"></span>
                                <img src="../src/assets/img/product-8.jpg" class="card-img-top" alt="...">
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <b>Drone</b>
                                        </div>
                                        <div class="col-3">
                                            <div class="badge--group">
                                                <div class="badge badge-secondary badge-dot"></div>
                                            </div>
                                        </div>
                                        <div class="col-9 text-end">
                                            <div class="pricing d-flex justify-content-end">
                                                <p class="text-success mb-0">$190.00</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                            <a class="card style-6" href="./app-ecommerce-product.html">
                                <span class="badge badge-danger"></span>
                                <img src="../src/assets/img/product-13.jpg" class="card-img-top" alt="...">
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <b>Smart Cleaner</b>
                                        </div>
                                        <div class="col-3">
                                            <div class="badge--group">
                                                <div class="badge badge-secondary badge-dot"></div>
                                            </div>
                                        </div>
                                        <div class="col-9 text-end">
                                            <div class="pricing d-flex justify-content-end">
                                                <p class="text-success mb-0">$330.00</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                            <a class="card style-6  mb-md-0 mb-4" href="./app-ecommerce-product.html">
                                <span class="badge badge-danger">SALE</span>
                                <img src="../src/assets/img/product-4.jpg" class="card-img-top" alt="...">
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <b>Camera</b>
                                        </div>
                                        <div class="col-3">
                                            <div class="badge--group">
                                                <div class="badge badge-success badge-dot"></div>
                                                <div class="badge badge-secondary badge-dot"></div>
                                                <div class="badge badge-warning badge-dot"></div>
                                            </div>
                                        </div>
                                        <div class="col-9 text-end">
                                            <div class="pricing d-flex justify-content-end">
                                                <p class="text-success mb-0 me-2">$11.00</p>
                                                <p class="mb-0 line-through"><del>$21.00</del></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                            <a class="card style-6" href="./app-ecommerce-product.html">
                                <span class="badge badge-primary">NEW</span>
                                <img src="../src/assets/img/product-5.jpg" class="card-img-top" alt="...">
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <b>Nike Shoes</b>
                                        </div>
                                        <div class="col-3">
                                            <div class="badge--group">
                                                <div class="badge badge-primary badge-dot"></div>
                                                <div class="badge badge-danger badge-dot"></div>
                                                <div class="badge badge-info badge-dot"></div>
                                            </div>
                                        </div>
                                        <div class="col-9 text-end">
                                            <div class="pricing d-flex justify-content-end">
                                                <p class="text-success mb-0">$130.00</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                            <a class="card style-6  mb-md-0 mb-4" href="./app-ecommerce-product.html">
                                <span class="badge badge-danger">SALE</span>
                                <img src="../src/assets/img/product-6.jpg" class="card-img-top" alt="...">
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <b>MicroPhone</b>
                                        </div>
                                        <div class="col-3">
                                            <div class="badge--group">
                                                <div class="badge badge-success badge-dot"></div>
                                                <div class="badge badge-secondary badge-dot"></div>
                                                <div class="badge badge-warning badge-dot"></div>
                                            </div>
                                        </div>
                                        <div class="col-9 text-end">
                                            <div class="pricing d-flex justify-content-end">
                                                <p class="text-success mb-0 me-2">$110.00</p>
                                                <p class="mb-0 line-through"><del>$230.00</del></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                            <a class="card style-6" href="./app-ecommerce-product.html">
                                <span class="badge badge-danger"></span>
                                <img src="../src/assets/img/product-7.jpg" class="card-img-top" alt="...">
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <b>Monitor</b>
                                        </div>
                                        <div class="col-3">
                                            <div class="badge--group">
                                                <div class="badge badge-danger badge-dot"></div>
                                                <div class="badge badge-success badge-dot"></div>
                                                <div class="badge badge-warning badge-dot"></div>
                                            </div>
                                        </div>
                                        <div class="col-9 text-end">
                                            <div class="pricing d-flex justify-content-end">
                                                <p class="text-success mb-0">$150.00</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                            <a class="card style-6" href="./app-ecommerce-product.html">
                                <span class="badge badge-danger"></span>
                                <img src="../src/assets/img/product-1.jpg" class="card-img-top" alt="...">
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <b>Shoes</b>
                                        </div>
                                        <div class="col-3">
                                            <div class="badge--group">
                                                <div class="badge badge-danger badge-dot"></div>
                                                <div class="badge badge-success badge-dot"></div>
                                                <div class="badge badge-warning badge-dot"></div>
                                            </div>
                                        </div>
                                        <div class="col-9 text-end">
                                            <div class="pricing d-flex justify-content-end">
                                                <p class="text-success mb-0">$95.00</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                            <a class="card style-6  mb-md-0 mb-4" href="./app-ecommerce-product.html">
                                <span class="badge badge-danger">SALE</span>
                                <img src="../src/assets/img/product-9.jpg" class="card-img-top" alt="...">
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <b>Speakers</b>
                                        </div>
                                        <div class="col-3">
                                            <div class="badge--group">
                                                <div class="badge badge-success badge-dot"></div>
                                                <div class="badge badge-secondary badge-dot"></div>
                                                <div class="badge badge-warning badge-dot"></div>
                                            </div>
                                        </div>
                                        <div class="col-9 text-end">
                                            <div class="pricing d-flex justify-content-end">
                                                <p class="text-success mb-0 me-2">$20.00</p>
                                                <p class="mb-0 line-through"><del>$33.00</del></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                            <a class="card style-6" href="./app-ecommerce-product.html">
                                <span class="badge badge-danger"></span>
                                <img src="../src/assets/img/product-10.jpg" class="card-img-top" alt="...">
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <b>XBox</b>
                                        </div>
                                        <div class="col-3">
                                            <div class="badge--group">
                                                <div class="badge badge-secondary badge-dot"></div>
                                            </div>
                                        </div>
                                        <div class="col-9 text-end">
                                            <div class="pricing d-flex justify-content-end">
                                                <p class="text-success mb-0">$608.00</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                            <a class="card style-6" href="./app-ecommerce-product.html">
                                <span class="badge badge-primary">NEW</span>
                                <img src="../src/assets/img/product-11.jpg" class="card-img-top" alt="...">
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <b>Phone</b>
                                        </div>
                                        <div class="col-3">
                                            <div class="badge--group">
                                                <div class="badge badge-primary badge-dot"></div>
                                                <div class="badge badge-danger badge-dot"></div>
                                                <div class="badge badge-info badge-dot"></div>
                                            </div>
                                        </div>
                                        <div class="col-9 text-end">
                                            <div class="pricing d-flex justify-content-end">
                                                <p class="text-success mb-0">$450.00</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                            <a class="card style-6" href="./app-ecommerce-product.html">
                                <span class="badge badge-danger"></span>
                                <img src="../src/assets/img/product-12.jpg" class="card-img-top" alt="...">
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <b>Selfi Stick</b>
                                        </div>
                                        <div class="col-3">
                                            <div class="badge--group">
                                                <div class="badge badge-danger badge-dot"></div>
                                                <div class="badge badge-success badge-dot"></div>
                                                <div class="badge badge-warning badge-dot"></div>
                                            </div>
                                        </div>
                                        <div class="col-9 text-end">
                                            <div class="pricing d-flex justify-content-end">
                                                <p class="text-success mb-0">$120.00</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                            <a class="card style-6" href="./app-ecommerce-product.html">
                                <span class="badge badge-danger"></span>
                                <img src="../src/assets/img/product-14.jpg" class="card-img-top" alt="...">
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <b>Sunglasses</b>
                                        </div>
                                        <div class="col-3">
                                            <div class="badge--group">
                                                <div class="badge badge-danger badge-dot"></div>
                                                <div class="badge badge-success badge-dot"></div>
                                                <div class="badge badge-warning badge-dot"></div>
                                            </div>
                                        </div>
                                        <div class="col-9 text-end">
                                            <div class="pricing d-flex justify-content-end">
                                                <p class="text-success mb-0">$10.00</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                            <a class="card style-6" href="./app-ecommerce-product.html">
                                <span class="badge badge-danger"></span>
                                <img src="../src/assets/img/product-15.jpg" class="card-img-top" alt="...">
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <b>Flashlight</b>
                                        </div>
                                        <div class="col-3">
                                            <div class="badge--group">
                                                <div class="badge badge-danger badge-dot"></div>
                                                <div class="badge badge-success badge-dot"></div>
                                                <div class="badge badge-warning badge-dot"></div>
                                            </div>
                                        </div>
                                        <div class="col-9 text-end">
                                            <div class="pricing d-flex justify-content-end">
                                                <p class="text-success mb-0">$20.00</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                            <a class="card style-6" href="./app-ecommerce-product.html">
                                <span class="badge badge-danger"></span>
                                <img src="../src/assets/img/product-16.jpg" class="card-img-top" alt="...">
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <b>Smart Watch</b>
                                        </div>
                                        <div class="col-3">
                                            <div class="badge--group">
                                                <div class="badge badge-danger badge-dot"></div>
                                                <div class="badge badge-success badge-dot"></div>
                                                <div class="badge badge-warning badge-dot"></div>
                                            </div>
                                        </div>
                                        <div class="col-9 text-end">
                                            <div class="pricing d-flex justify-content-end">
                                                <p class="text-success mb-0">$160.00</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                            <a class="card style-6" href="./app-ecommerce-product.html">
                                <span class="badge badge-danger"></span>
                                <img src="../src/assets/img/product-17.jpg" class="card-img-top" alt="...">
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <b>Lamp</b>
                                        </div>
                                        <div class="col-3">
                                            <div class="badge--group">
                                                <div class="badge badge-danger badge-dot"></div>
                                                <div class="badge badge-success badge-dot"></div>
                                                <div class="badge badge-warning badge-dot"></div>
                                            </div>
                                        </div>
                                        <div class="col-9 text-end">
                                            <div class="pricing d-flex justify-content-end">
                                                <p class="text-success mb-0">$160.00</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                            <a class="card style-6" href="./app-ecommerce-product.html">
                                <span class="badge badge-danger"></span>
                                <img src="../src/assets/img/product-18.jpg" class="card-img-top" alt="...">
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <b>Tablet</b>
                                        </div>
                                        <div class="col-3">
                                            <div class="badge--group">
                                                <div class="badge badge-danger badge-dot"></div>
                                                <div class="badge badge-success badge-dot"></div>
                                                <div class="badge badge-warning badge-dot"></div>
                                            </div>
                                        </div>
                                        <div class="col-9 text-end">
                                            <div class="pricing d-flex justify-content-end">
                                                <p class="text-success mb-0">$160.00</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                            <a class="card style-6" href="./app-ecommerce-product.html">
                                <span class="badge badge-danger"></span>
                                <img src="../src/assets/img/product-19.jpg" class="card-img-top" alt="...">
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <b>Chair</b>
                                        </div>
                                        <div class="col-3">
                                            <div class="badge--group">
                                                <div class="badge badge-danger badge-dot"></div>
                                                <div class="badge badge-success badge-dot"></div>
                                                <div class="badge badge-warning badge-dot"></div>
                                            </div>
                                        </div>
                                        <div class="col-9 text-end">
                                            <div class="pricing d-flex justify-content-end">
                                                <p class="text-success mb-0">$160.00</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                </div>

            </div>

            <!--  BEGIN FOOTER  -->
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © <span class="dynamic-year">2022</span> <a target="_blank"
                            href="https://designreset.com/cork-admin/">DesignReset</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                            <path
                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                            </path>
                        </svg></p>
                </div>
            </div>
            <!--  END FOOTER  -->

        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="../src/plugins/src/waves/waves.min.js"></script>
    <script src="../layouts/modern-light-menu/app.js"></script>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <!-- END PAGE LEVEL SCRIPTS -->
</body>

</html>