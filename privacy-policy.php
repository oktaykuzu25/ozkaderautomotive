<?php
include_once "ozkaderautomotivepanel/php/main.php";
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Document Meta
    ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--IE Compatibility Meta-->
    <meta name="author" content="zytheme" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Multi-purpose Business html5 template">
    <link href="assets/images/favicon/favicon.png" rel="icon">


    <!-- Fonts
    ============================================= -->
    <link
        href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i%7CMontserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i%7CPlayfair+Display:400,400i"
        rel="stylesheet">

    <!-- Stylesheets
    ============================================= -->
    <link href="assets/css/external.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

    <!-- Document Title
    ============================================= -->
    <title>Gizlilik Politikası | Özkader Otomotiv</title>
    <style>
    #gradient-text {
        background: linear-gradient(to right, #606da6, #151825);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        color: transparent;
    }
    </style>
</head>

<body>
    <div class="preloader">
        <div class="loader-eclipse">
            <div class="loader-content"></div>
        </div>
    </div>
    <!-- Document Wrapper
	============================================= -->
    <div id="wrapperParallax" class="wrapper clearfix">
        <!-- Show in desktop Onky -->
        <header id="navbar-spy1" class="header header-4 header-light d-none d-lg-block">
            <nav id="primary-menu1" class="navbar navbar-expand-lg navbar-light logo-centered">
                <div class="container">
                    <!-- Module Menu -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbarContent1">
                        <ul class="navbar-nav ml-auto mr-auto">
                            <!-- home Menu -->
                            <li class="active">
                                <a href="index.php" class="menu-item">Anasayfa</a>
                            </li>
                            <!-- Pages Menu -->
                            <li>
                                <a href="about.php" class="menu-item">Hakkımızda</a>
                            </li>
                            <!-- Pages Menu -->
                            <!-- shop Menu -->
                            <li>
                                <a href="brand.php" class="menu-item">Markalar</a>
                            </li>
                        </ul>

                    </div>
                    <!-- /.navbar-collapse -->

                    <a class="navbar-brand" href="index-2.php">
                        <img class="logo" src="assets/images/logo/logo-dark.png" alt="logo">
                    </a>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbarContent2">
                        <ul class="navbar-nav mr-auto ml-auto">
                            <!-- collection Menu -->
                            <li class="has-dropdown mega-dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle menu-item">Kategori</a>
                                <ul class="dropdown-menu mega-dropdown-menu collections-menu">
                                    <li>
                                        <div class="container">
                                            <div class="row">
                                                <?php
                                                if (is_array($fetchDataUpperCategoryLimitFive)) {
                                                    foreach ($fetchDataUpperCategoryLimitFive as $data) {
                                                        $upper_category_name_url = $data['upper_category_name'];
                                                        $upper_category_id_url = $data['upper_category_id'];

                                                        // Alt kategorileri çek
                                                        $fetchDataLowerCategoryLimitFive = fetch_data_lower_category_limit_five($db, $tableNameLowerCategory, $columnsLowerCategory, $upper_category_id_url);

                                                        $seo_name = cleanTurkishCharacters($upper_category_name_url);
                                                        $url = "/$seo_name" . "/$upper_category_id_url";
                                                ?>
                                                <!-- Column #1 -->
                                                <div class="col-md-12 col-lg-5ths">
                                                    <div class="collection--menu-content">
                                                        <h5><?php echo $data['upper_category_name'] ?></h5>
                                                        <ul>
                                                            <?php
                                                                    if (is_array($fetchDataLowerCategoryLimitFive)) {
                                                                        foreach ($fetchDataLowerCategoryLimitFive as $lowerCategory) {
                                                                            // Alt kategorilerin adını ve ID'sini kullanarak liste oluştur
                                                                            $lower_category_name = $lowerCategory['lower_category_name']; // Alt kategori adı
                                                                            $lower_category_id = $lowerCategory['lower_category_id'];   // Alt kategori ID'si

                                                                            // SEO uyumlu URL'yi oluşturun
                                                                            $lower_category_seo_name = cleanTurkishCharacters($lower_category_name);
                                                                            $lower_category_url = "/$seo_name/$lower_category_seo_name/$lower_category_id";
                                                                    ?>
                                                            <li>
                                                                <a
                                                                    href="<?php echo $lower_category_url; ?>"><?php echo $lower_category_name; ?></a>
                                                            </li>
                                                            <?php
                                                                        }
                                                                    } else {
                                                                        // Alt kategori bulunamadığında
                                                                        echo "<li>Alt Kategoriler Bulunamadı!</li>";
                                                                    }
                                                                    ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- .col-lg-5ths end -->
                                                <?php
                                                    }
                                                } else {
                                                    echo $fetchDataUpperCategoryLimitFive;
                                                }
                                                ?>
                                            </div>

                                            <!-- .row end -->
                                        </div>
                                        <!-- container end -->
                                    </li>
                                </ul>
                                <!-- .mega-dropdown-menu end -->
                            </li><!-- li end -->

                            <!-- Blog Menu-->
                            <li class="has-dropdown">
                                <a href="gallery.php" class="menu-item">
                                    Galeri</a>
                            </li><!-- li end -->

                            <!-- Blog Menu-->
                            <li class="has-dropdown">
                                <a href="contact.php" class="menu-item">
                                    İletişim</a>
                            </li><!-- li end -->

                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->

                    <div class="pull-right">
                        <div class="module-container">
                            <!-- Module Search -->
                            <div class="module module-search pull-left">
                                <div class="module-icon search-icon">
                                    <i class="lnr lnr-magnifier"></i>
                                    <span class="title">Search</span>
                                </div>
                                <div class="module-content module--search-box">
                                    <form class="form-search">
                                        <input type="text" class="form-control" placeholder="Search anything">
                                        <button type="submit"><span class="fa fa-arrow-right"></span></button>
                                    </form><!-- .form-search end -->
                                </div>
                            </div><!-- .module-search end -->
                        </div>
                    </div>

                </div>
            </nav>
        </header>

        <!-- Show in Mobile Only -->
        <header id="navbar-spy" class="header header-1 header-transparent d-block d-lg-none">
            <nav id="primary-menu" class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index-2.php">
                        <img class="logo" src="assets/images/logo/logo-dark.png" alt="logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
                        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbarContent">
                        <ul class="navbar-nav mr-auto">
                            <!-- home Menu -->
                            <li class="has-dropdown mega-dropdown active">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle menu-item">Home</a>
                                <ul class="dropdown-menu mega-dropdown-menu">
                                    <li>
                                        <div class="container">
                                            <div class="row">
                                                <!-- Column #1 -->
                                                <div class="col-md-12 col-lg-3">
                                                    <ul>
                                                        <li>
                                                            <a href="home-1.php">Home 1</a>
                                                        </li>
                                                        <li>
                                                            <a href="home-2.php">Home 2</a>
                                                        </li>
                                                        <li>
                                                            <a href="home-3.php">Home 3</a>
                                                        </li>
                                                        <li>
                                                            <a href="home-4.php">Home 4</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- .col-lg-3 end -->

                                                <!-- Column #2 -->
                                                <div class="col-md-12 col-lg-3">
                                                    <ul>
                                                        <li>
                                                            <a href="home-5.php">Home 5</a>
                                                        </li>
                                                        <li>
                                                            <a href="home-6.php">Home 6</a>
                                                        </li>
                                                        <li>
                                                            <a href="home-8.php">Home 7</a>
                                                        </li>
                                                        <li>
                                                            <a href="home-8.php">Home 8</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- .col-lg-3 end -->

                                                <!-- Column #3 -->
                                                <div class="col-md-12 col-lg-3">
                                                    <ul>
                                                        <li>
                                                            <a href="home-9.php">Home 9</a>
                                                        </li>
                                                        <li>
                                                            <a href="home-10.php">Home 10</a>
                                                        </li>
                                                        <li>
                                                            <a href="home-11.php">Home 11</a>
                                                        </li>
                                                        <li>
                                                            <a href="home-12.php">Home 12</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- .col-lg-3 end -->

                                                <!-- Column #4 -->
                                                <div class="col-md-12 col-lg-3">
                                                    <ul>
                                                        <li>
                                                            <a href="home-13.php">Home 13</a>
                                                        </li>
                                                        <li>
                                                            <a href="home-14.php">Home 14</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- .col-lg-3 end -->
                                            </div>
                                            <!-- .row end -->
                                        </div>
                                        <!-- container end -->
                                    </li>
                                </ul>
                                <!-- .mega-dropdown-menu end -->
                            </li><!-- li end -->

                            <!-- shop Menu -->
                            <li class="has-dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle link-hover"
                                    data-hover="shop">shop</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Products Layout</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="shop-layout-fullwidth.php">fullwidth</a>
                                            </li>
                                            <li>
                                                <a href="shop-layout-sidebar-left.php">sidebar left</a>
                                            </li>
                                            <li>
                                                <a href="shop-layout-sidebar-right-2.php">sidebar right</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Products Columns</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="shop-4columns.php">4 columns</a>
                                            </li>
                                            <li>
                                                <a href="shop-3columns.php">3 columns</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Products Cards</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="shop-product-grid.php">grid</a>
                                            </li>
                                            <li>
                                                <a href="shop-product-hero-3columns.php">hero 3 columns</a>
                                            </li>
                                            <li>
                                                <a href="shop-product-hero-2columns.php">hero 2 columns</a>
                                            </li>
                                            <li>
                                                <a href="shop-product-list.php">list</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Products Dark</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="shop-dark-sidebar.php">with sidebar</a>
                                            </li>
                                            <li>
                                                <a href="shop-dark-3columns.php">3 columns</a>
                                            </li>
                                            <li>
                                                <a href="shop-dark-4columns.php">4 columns</a>
                                            </li>
                                            <li>
                                                <a href="shop-dark-5columns.php">5 columns</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Products Hover</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="shop-hover-2.php">hover 2</a>
                                            </li>
                                            <li>
                                                <a href="shop-hover-4columns.php">hover 4 columns</a>
                                            </li>
                                            <li>
                                                <a href="shop-hover-3columns.php">hover 3 columns</a>
                                            </li>
                                            <li>
                                                <a href="shop-hover-2columns.php">hover 2 columns</a>
                                            </li>
                                            <li>
                                                <a href="shop-hover-variation.php">hover variation</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Single Product</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="product-boxed.php">Product Boxed</a>
                                            </li>
                                            <li>
                                                <a href="product-carousel.php">Product Carousel</a>
                                            </li>
                                            <li>
                                                <a href="product-dark.php">Product Dark</a>
                                            </li>
                                            <li>
                                                <a href="product-fullwidth.php">Product Fullwidth</a>
                                            </li>
                                            <li>
                                                <a href="product-hero.php">Product Hero</a>
                                            </li>
                                            <li>
                                                <a href="product-masonry.php">Product Masonry</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Single Gallery</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="product-gallery.php">Gallery Fullwidth</a>
                                            </li>
                                            <li>
                                                <a href="product-gallery-horizontal.php">Gallery Horizontal</a>
                                            </li>
                                            <li>
                                                <a href="product-gallery-slide.php">Gallery Slide</a>
                                            </li>
                                            <li>
                                                <a href="product-gallery-vertical.php">Gallery Vertical</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li><!-- li end -->

                            <!-- Pages Menu -->
                            <li class="has-dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle link-hover"
                                    data-hover="pages">page</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">about us</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="page-about-1.php">About US 1</a>
                                            </li>
                                            <li>
                                                <a href="page-about-2.php">About US 2</a>
                                            </li>
                                            <li>
                                                <a href="page-about-dark.php">About US dark</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">contact us</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="page-contact-1.php">page contact 1</a>
                                            </li>
                                            <li>
                                                <a href="page-contact-2.php">page contact 2</a>
                                            </li>
                                            <li>
                                                <a href="page-contact-dark.php">page contact dark</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">untility pages</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="page-404.php">page 404</a>
                                            </li>
                                            <li>
                                                <a href="page-404-dark.php">page 404 dark</a>
                                            </li>
                                            <li>
                                                <a href="page-privacy.php">page privacy</a>
                                            </li>
                                            <li>
                                                <a href="page-terms.php">page terms</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">page tempalates</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="page-template-fullwidth.php">fullwidth</a>
                                            </li>
                                            <li>
                                                <a href="page-template-right-sidebar.php">right sidebar</a>
                                            </li>
                                            <li>
                                                <a href="page-template-left-sidebar.php">left sidebar</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li><!-- li end -->

                            <!-- collection Menu -->
                            <li class="has-dropdown mega-dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle menu-item">Collections</a>
                                <ul class="dropdown-menu mega-dropdown-menu collections-menu">
                                    <li>
                                        <div class="container">
                                            <div class="row">
                                                <!-- Column #1 -->
                                                <div class="col-md-12 col-lg-5ths">
                                                    <div class="collection--menu-content">
                                                        <h5>Furniture</h5>
                                                        <ul>
                                                            <li>
                                                                <a href="shop-layout-fullwidth.php">chair</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop-layout-sidebar-left.php">sofa</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop-4columns.php">table</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop-3columns.php">bed</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="menu--img">
                                                        <img src="assets/images/slider/layers/1.png" alt="img"
                                                            class="img-fluid">
                                                    </div>
                                                </div>
                                                <!-- .col-lg-5ths end -->

                                                <!-- Column #2 -->
                                                <div class="col-md-12 col-lg-5ths">
                                                    <div class="collection--menu-content">
                                                        <h5>Lighting</h5>
                                                        <ul>
                                                            <li>
                                                                <a href="shop-layout-fullwidth.php">Wall Lamp</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop-layout-sidebar-left.php">Bedroom Lamp</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop-4columns.php">Garden Lamp</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop-3columns.php">Desktop Lamp</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="menu--img">
                                                        <img src="assets/images/slider/layers/37.png" alt="img"
                                                            class="img-fluid">
                                                    </div>
                                                </div>
                                                <!-- .col-lg-5ths end -->

                                                <!-- Column #3 -->
                                                <div class="col-md-12 col-lg-5ths">
                                                    <div class="collection--menu-content">
                                                        <h5>Wood Shelf</h5>
                                                        <ul>
                                                            <li>
                                                                <a href="shop-layout-fullwidth.php">wood Living</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop-layout-sidebar-left.php">wood Bedroom</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop-4columns.php">wood Garden</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop-3columns.php">wood tables</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="menu--img">
                                                        <img src="assets/images/slider/layers/34.png" alt="img"
                                                            class="img-fluid">
                                                    </div>
                                                </div>
                                                <!-- .col-lg-5ths end -->

                                                <!-- Column #4 -->
                                                <div class="col-md-12 col-lg-5ths">
                                                    <div class="collection--menu-content">
                                                        <h5>Accessories</h5>
                                                        <ul>
                                                            <li>
                                                                <a href="shop-layout-fullwidth.php">Shoes</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop-layout-sidebar-left.php">Bags</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop-4columns.php">Jewellery</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop-3columns.php">Scarves</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="menu--img">
                                                        <img src="assets/images/slider/layers/35.png" alt="img"
                                                            class="img-fluid">
                                                    </div>
                                                </div>
                                                <!-- .col-lg-5ths end -->

                                                <!-- Column #5 -->
                                                <div class="col-md-12 col-lg-5ths">
                                                    <div class="collection--menu-content">
                                                        <h5>Sale Off</h5>
                                                        <ul>
                                                            <li>
                                                                <a href="shop-layout-fullwidth.php">Sunglasses</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop-layout-sidebar-left.php">jackets</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop-4columns.php">Shirts</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop-3columns.php">Socks</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="menu--img">
                                                        <img src="assets/images/slider/layers/36.png" alt="img"
                                                            class="img-fluid">
                                                    </div>
                                                </div>
                                                <!-- .col-lg-5ths end -->
                                            </div>
                                            <!-- .row end -->
                                        </div>
                                        <!-- container end -->
                                    </li>
                                </ul>
                                <!-- .mega-dropdown-menu end -->
                            </li><!-- li end -->

                            <!-- Blog Menu-->
                            <li class="has-dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle menu-item">Blog</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">blog Grid</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="blog-grid.php">fullwidth</a>
                                            </li>
                                            <li>
                                                <a href="blog-grid-sidebar-right.php">right sidebar</a>
                                            </li>
                                            <li>
                                                <a href="blog-grid-sidebar-left.php">left sidebar</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="blog-masonry.php">blog masonry</a>
                                    </li>
                                    <li>
                                        <a href="blog-parallax.php">blog parallax</a>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">blog single</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="blog-single.php">fullwidth</a>
                                            </li>
                                            <li>
                                                <a href="blog-single-sidebar-right.php">right sidebar</a>
                                            </li>
                                            <li>
                                                <a href="blog-single-sidebar-left.php">left sidebar</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li><!-- li end -->

                            <!-- features Menu -->
                            <li class="has-dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle link-hover"
                                    data-hover="pages">features</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Headers</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="header-1.php">Header 1</a>
                                            </li>
                                            <li>
                                                <a href="header-2.php">Header 2</a>
                                            </li>
                                            <li>
                                                <a href="header-3.php">Header 3</a>
                                            </li>
                                            <li>
                                                <a href="header-4.php">Header 4</a>
                                            </li>
                                            <li>
                                                <a href="header-5.php">Header 5</a>
                                            </li>
                                            <li>
                                                <a href="header-6.php">Header 6</a>
                                            </li>
                                            <li>
                                                <a href="header-7.php">Header 7</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">footers</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="footer-1.php">footer 1</a>
                                            </li>
                                            <li>
                                                <a href="footer-2.php">footer 2</a>
                                            </li>
                                            <li>
                                                <a href="footer-3.php">footer 3</a>
                                            </li>
                                            <li>
                                                <a href="footer-4.php">footer 4</a>
                                            </li>
                                            <li>
                                                <a href="footer-5.php">footer 5</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">sliders</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="slider-1.php">slider 1</a>
                                            </li>
                                            <li>
                                                <a href="slider-2.php">slider 2</a>
                                            </li>
                                            <li>
                                                <a href="slider-3.php">slider 3</a>
                                            </li>
                                            <li>
                                                <a href="slider-4.php">slider 4</a>
                                            </li>
                                            <li>
                                                <a href="slider-5.php">slider 5</a>
                                            </li>
                                            <li>
                                                <a href="slider-6.php">slider 6</a>
                                            </li>
                                            <li>
                                                <a href="slider-7.php">slider 7</a>
                                            </li>
                                            <li>
                                                <a href="slider-8.php">slider 8</a>
                                            </li>
                                            <li>
                                                <a href="slider-9.php">slider 9</a>
                                            </li>
                                            <li>
                                                <a href="slider-10.php">slider 10</a>
                                            </li>
                                            <li>
                                                <a href="slider-11.php">slider 11</a>
                                            </li>
                                            <li>
                                                <a href="slider-12.php">slider 12</a>
                                            </li>
                                            <li>
                                                <a href="slider-13.php">slider 13</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">cart</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="page-cart.php">page cart</a>
                                            </li>
                                            <li>
                                                <a href="page-cart-dark.php">page cart dark</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">checkout</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="page-checkout.php">page checkout</a>
                                            </li>
                                            <li>
                                                <a href="page-checkout-dark.php">checkout dark</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">login</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="page-login.php">page login</a>
                                            </li>
                                            <li>
                                                <a href="page-login-dark.php">page login dark</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">wishlist</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="page-wishlist.php">page wishlist</a>
                                            </li>
                                            <li>
                                                <a href="page-wishlist-dark.php">page wishlist dark</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="page-soon.php">page soon</a>
                                    </li>
                                    <li>
                                        <a href="page-popup.php">page popup</a>
                                    </li>
                                </ul>
                            </li><!-- li end -->
                        </ul>
                        <div class="module-container">
                            <!-- Module Search -->
                            <div class="module module-search pull-left">
                                <div class="module-icon search-icon">
                                    <i class="lnr lnr-magnifier"></i>
                                    <span class="title">Search</span>
                                </div>
                                <div class="module-content module--search-box">
                                    <form class="form-search">
                                        <input type="text" class="form-control" placeholder="Search anything">
                                        <button type="submit"><span class="fa fa-arrow-right"></span></button>
                                    </form><!-- .form-search end -->
                                </div>
                            </div><!-- .module-search end -->
                            <div class="vertical-divider pull-left mr-30"></div>
                            <div class="module module-lang  module-dropdown module-dropdown-right pull-left">
                                <div class="module-icon">
                                    <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                                        ENG <i class="fa fa-caret-down"></i>
                                    </button>
                                </div>
                                <div class="module-dropdown-menu module-content">
                                    <a class="dropdown-item" href="#">RU</a>
                                    <a class="dropdown-item" href="#">FR</a>
                                    <a class="dropdown-item" href="#">AR</a>
                                </div>
                            </div>
                            <div class="module module-dropdown module-currency module-dropdown-right pull-left">
                                <div class="module-icon dropdown">
                                    <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                                        USD <i class="fa fa-caret-down"></i>
                                    </button>
                                </div>
                                <div class="module-dropdown-menu module-content">
                                    <a class="dropdown-item" href="#">EUR</a>
                                    <a class="dropdown-item" href="#">CAD</a>
                                    <a class="dropdown-item" href="#">pound</a>
                                </div>
                            </div> <!-- Module Cart -->
                            <div class="module module-cart pull-left">
                                <div class="module-icon cart-icon">
                                    <i class="icon-bag"></i>
                                    <span class="title">shop cart</span>
                                    <label class="module-label">2</label>
                                </div>
                                <div class="module-content module-box cart-box">
                                    <div class="cart-overview">
                                        <ul class="list-unstyled">
                                            <li>
                                                <img class="img-fluid" src="assets/images/products/thumb/1.jpg"
                                                    alt="product" />
                                                <div class="product-meta">
                                                    <h5 class="product-title">Hebes Great Chair</h5>
                                                    <p class="product-qunt">Quantity: 01</p>
                                                    <p class="product-price">$24.00</p>
                                                </div>
                                                <a class="cart-cancel" href="#"><i class="lnr lnr-cross"></i></a>
                                            </li>
                                            <li>
                                                <img class="img-fluid" src="assets/images/products/thumb/2.jpg"
                                                    alt="product" />
                                                <div class="product-meta">
                                                    <h5 class="product-title">Hebes Great Chair</h5>
                                                    <p class="product-qunt">Quantity: 01</p>
                                                    <p class="product-price">$24.00</p>
                                                </div>
                                                <a class="cart-cancel" href="#"><i class="lnr lnr-cross"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="cart-total">
                                        <div class="total-desc">
                                            Sub total
                                        </div>
                                        <div class="total-price">
                                            $48.00
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                    <div class="cart--control">
                                        <a class="btn btn--white btn--bordered btn--rounded" href="#">view cart </a>
                                        <a class="btn btn--primary btn--rounded" href="#">Checkout</a>
                                    </div>
                                </div>
                            </div>
                            <!-- .module-cart end -->
                        </div>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container -->
            </nav>
        </header>


        <!-- Page Title #1
============================================= -->
        <section id="page-title" class="page-title bg-parallax">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="title title-3 text-center">
                            <div class="title--content">
                                <div class="title--heading">
                                    <h1 id="gradient-text" style="font-size: 70px;">Gizlilik Politikası</h1>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <ol class="breadcrumb">
                                <li>Son Güncelleme:</li>
                                <li class="active" id="gradient-text">20/08/2024</li>
                            </ol>
                        </div>
                        <!-- .title end -->
                    </div>
                    <!-- .col-lg-12 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- #page-title end -->

        <!-- Columns Section
============================================= -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>Özkader Otomotiv ("biz", "şirket", "bizim") olarak, kişisel verilerinizin güvenliğine ve
                            gizliliğine büyük önem veriyoruz. Bu Gizlilik Politikası, kişisel bilgilerinizin nasıl
                            toplandığını, kullanıldığını, saklandığını ve korunduğunu açıklamaktadır. Web sitemizi (veya
                            "site") kullanarak, bu politikayı kabul etmiş olursunuz.</p>
                        <h6>Topladığımız Bilgiler</h6>
                        <p>Web sitemizi kullanırken çeşitli türde bilgileri toplayabiliriz:</p>
                        <ul>
                            <li><b>Kişisel Bilgiler:</b> İsim, soyisim, e-posta adresi, telefon numarası gibi doğrudan
                                sizi
                                tanımlayan bilgileri, genellikle iletişim formu, kayıt işlemleri ve diğer etkileşimler
                                sırasında toplarız.</li>
                            <li><b>Kullanım Bilgileri:</b> Web sitemizi nasıl kullandığınızı anlamak için IP adresiniz,
                                tarayıcı türünüz, işletim sistemi, ziyaret ettiğiniz sayfalar, tıklama verileri ve
                                ziyaret süreniz gibi bilgileri toplarız. Bu veriler, analitik araçlar ve çerezler
                                aracılığıyla elde edilir.</li>
                            <li><b>Çerezler ve Benzer Teknolojiler:</b> Çerezler ve benzeri teknolojiler kullanarak, web
                                sitemizin performansını izler ve kullanıcı deneyimini kişiselleştiririz. Çerezler,
                                bilgisayarınıza veya mobil cihazınıza küçük veri dosyaları yerleştirir ve sitenin
                                işlevselliğini artırır.</li>
                        </ul>
                        <h6>Bilgilerin Kullanımı</h6>
                        <p>Topladığımız bilgileri aşağıdaki amaçlarla kullanabiliriz:</p>
                        <ul>
                            <li><b>Hizmet Sağlama:</b> Ürünler ve hizmetler sunmak, siparişlerinizi işlemek, müşteri
                                hizmetleri sağlamak ve taleplerinizi yerine getirmek için kişisel bilgilerinizi
                                kullanırız.</li>
                            <li><b>İletişim: </b>Size bilgi vermek, güncellemeler ve bildirimler göndermek, promosyonlar
                                ve teklifler sunmak için iletişime geçebiliriz.</li>
                            <li><b>Analiz ve İyileştirme:</b>Web sitemizin performansını değerlendirmek, kullanıcı
                                deneyimini geliştirmek ve sitenin işlevselliğini artırmak için analizler yaparız.</li>
                            <li><b>Güvenlik: </b>Web sitemizin güvenliğini sağlamak, dolandırıcılığı önlemek ve yasal
                                yükümlülükleri yerine getirmek için kişisel verilerinizi kullanabiliriz.</li>
                        </ul>
                        <h6>Bilgilerin Paylaşımı</h6>
                        <p>Kişisel bilgilerinizi şu durumlarda üçüncü taraflarla paylaşabiliriz:</p>
                        <ul>
                            <li><b>Hizmet Sağlayıcılar: </b>Web sitemizin işletilmesine yardımcı olan, analiz, ödeme
                                işleme, e-posta gönderimi ve diğer hizmetleri sağlayan üçüncü taraflarla bilgilerinizi
                                paylaşabiliriz.
                            </li>
                            <li><b>Yasal Yükümlülükler: </b>Yasal süreçlere uyum sağlamak, yasal taleplere yanıt vermek
                                ve güvenlik tehditlerini önlemek için bilgilerinizi paylaşabiliriz.</li>
                            <li><b>İş Değişiklikleri: </b>Şirketimizin bir kısmının veya tamamının satışını veya devrini
                                içeren durumlarda, kişisel bilgilerinizi devralan tarafla paylaşabiliriz.</li>
                        </ul>
                        <h6>Bilgilerin Güvenliği</h6>
                        <p>Kişisel bilgilerinizi korumak için uygun teknik ve idari güvenlik önlemleri alıyoruz.
                            Verilerinizi korumak amacıyla şifreleme, güvenlik duvarları ve erişim kontrolleri gibi
                            yöntemler kullanıyoruz. Ancak, internet üzerinden veri iletiminin tamamen güvenli olduğunu
                            garanti edemeyiz.</p>
                        <h6>Haklarınız</h6>
                        <p>Kişisel verilerinizle ilgili olarak aşağıdaki haklara sahipsiniz: </p>
                        <ul>
                            <li><b>Erişim Hakkı: </b>Topladığımız kişisel verilere erişim talep edebilirsiniz.</li>
                            <li><b>Düzeltme Hakkı: </b>Yanlış veya eksik kişisel verileri düzeltme hakkınız vardır.</li>
                            <li><b>Silme Hakkı: </b>Kişisel verilerinizin silinmesini talep edebilirsiniz.</li>
                            <li><b>İtiraz Hakkı: </b>Kişisel verilerinizin işlenmesine itiraz edebilirsiniz.</li>
                        </ul>
                        <h6>Çocukların Gizliliği</h6>
                        <p>Web sitemiz, 18 yaşından küçük bireyler için tasarlanmamıştır. Bu yaş grubundaki bireylerin
                            kişisel bilgilerini bilerek toplamayız. Eğer çocuğunuzun kişisel bilgilerini sağladığınızı
                            düşünüyorsanız, lütfen bizimle iletişime geçin.</p>
                        <h6>Politika Değişiklikleri</h6>
                        <p>Bu Gizlilik Politikası zaman zaman değişebilir. Politika değişikliklerini web sitemizde
                            yayınlayarak sizi bilgilendiririz. Politikanın güncellenmiş versiyonlarını düzenli olarak
                            kontrol etmenizi öneririz.</p>
                        <h6>İletişim</h6>
                        <p>Gizlilik Politikamızla ilgili sorularınız veya endişeleriniz varsa, lütfen bizimle iletişime
                            geçin:</p>
                        <ul>
                            <li><b>E-posta: </b><a href="mailto:ozkaderoto42@hotmail.com">ozkaderoto42@hotmail.com</a>
                            </li>
                            <li><b>Telefon: </b><a href="tel:05387027010">0538 702 7010</a></li>
                            <li><b>Adres: </b><a
                                    href="https://www.google.com/maps/place/Horozluhan,+Sel%C3%A7uklu+Cd.+No:147,+42120+Sel%C3%A7uklu%2FKonya/@37.940947,32.5201271,17z/data=!3m1!4b1!4m6!3m5!1s0x14d08e3a641ed2df:0x576857acf802d675!8m2!3d37.940947!4d32.522702!16s%2Fg%2F11c5npn00n?coh=219816&entry=tts&g_ep=EgoyMDI0MDgxNC4xKgBIAVAD">Selçuklu
                                    Cd. No:147,
                                    42120 Selçuklu/Konya</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer #2
============================================= -->
        <footer id="footerParallax" class="footer footer-2">
            <div class="container pr-40 pl-40">
                <div class="footer-widget">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-5ths widget--logo text-center-xs">
                            <div class="widget--content">
                                <div class="widget--logo-img">
                                    <img src="assets/images/logo/logo-dark.png" alt="logo">
                                </div>
                            </div>
                            <div class="footer--copyright">
                                <span>&copy; 2019 Özkader Otomotiv - Tüm Hakları Saklıdır </span><a
                                    href="mailto:treebsoftware@gmail.com">Treeb</a>
                            </div>
                            <!-- .footer-copyright end -->
                        </div>
                        <!-- .col-lg-5ths end -->
                        <div class="col-sm-12 col-md-6 col-lg-5ths text-center-xs widget--contact-info">
                            <div class="widget--content">
                                <ul class="list-unstyled">
                                    <li><a href="https://maps.app.goo.gl/EAknrr9NrdAvmCU36">Selçuklu Cd. No:147,</a>
                                    </li>
                                    <li><a href="https://maps.app.goo.gl/EAknrr9NrdAvmCU36">42120 Selçuklu/Konya</a>
                                    </li>
                                    <li><a href="mailto:ozkaderoto42@hotmail.com">ozkaderoto42@hotmail.com</a></li>
                                    <li><a href="tel:05387027010">0538 702 7010</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- .col-lg-5ths end -->
                        <div class="col-sm-12 col-md-6 col-lg-5ths text-center-xs widget--links">
                            <div class="widget--content">
                                <ul class="list-unstyled">
                                    <li><a href="page-about-1.php">Hakkımızda</a></li>
                                    <li><a href="page-privacy.php">Gizlilik Politikası</a></li>
                                    <li><a href="page-terms.php">Şartlar Ve Koşullar</a></li>
                                    <li><a href="page-contact-2.php">İletişim</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-5ths text-center-xs widget--links">
                            <div class="widget--content">
                                <p>Son Eklenen Ürünler</p>
                                <ul class="list-unstyled">
                                    <li><a href="#">Marş Dinamoları Komple</a></li>
                                    <li><a href="#">Marş Kollektörleri</a></li>
                                    <li><a href="#">Marş Yastıkları</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- .col-lg-5ths end -->
                        <div class="col-sm-12 col-md-6 col-lg-5ths  text-center-xs widget--social">
                            <div class="widget--content">
                                <div class="social--icons">
                                    <span>Bize Ulaşın!</span>
                                    <a class="phone" href="tel:05387027010">
                                        <i class="fa fa-phone"></i>
                                    </a>
                                    <a class="envelope" href="mailto:ozkaderoto42@hotmail.com">
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                    <a class="whatsapp" href="https://wa.me/05387027010" rel="nofollow" target="_blank">
                                        <i class="fa fa-whatsapp"></i>
                                    </a>
                                    <a class="instagram" href="https://www.instagram.com/ozkaderotomotiv42_/">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- .col-lg-5ths end -->
                    </div>
                    <!-- .row end -->
                </div>
                <!-- .container end -->
            </div>
            <!-- .footer-widget end -->
        </footer>



    </div><!-- #wrapper end -->

    <!-- Footer Scripts
============================================= -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/functions.js"></script>
</body>

</html>