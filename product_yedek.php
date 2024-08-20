<!DOCTYPE html>
<html dir="ltr" lang="tr">

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
    <title>Hebes | Multi-purpose Store Template</title>
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

        <!-- product gallery #2
============================================= -->
        <section id="product-gallery2" class="product-gallery-2 text-center mtop-100">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2 page-title">
                        <div class="title title-1 mb-70">
                            <div class="title--content">
                                <div class="title--heading">
                                    <h1>Chair Products</h1>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <ol class="breadcrumb">
                                <li><a href="index-2.html">Home</a></li>
                                <li><a href="index-2.html">Furniture</a></li>
                                <li class="active">Chair</li>
                            </ol>
                        </div>
                        <!-- .title end -->
                        <div class="products-gallery-carousel products-gallery-carousel-2">
                            <div class="owl-carousel products-slider" data-slider-id="1">
                                <div class="product-img">
                                    <img src="assets/images/products/gallery/10.png" alt="product">
                                </div>
                                <div class="product-img">
                                    <img src="assets/images/products/gallery/11.png" alt="product">
                                </div>
                                <div class="product-img">
                                    <img src="assets/images/products/gallery/12.png" alt="product">
                                </div>
                                <div class="product-img">
                                    <img src="assets/images/products/gallery/11.png" alt="product">
                                </div>
                            </div>
                            <div class="owl-thumbs thumbs-bg" data-slider-id="1">
                                <button class="owl-thumb-item">
                                    <img src="assets/images/products/gallery/thumb/5.png" alt="product thumb">
                                </button>
                                <button class="owl-thumb-item">
                                    <img src="assets/images/products/gallery/thumb/6.png" alt="product thumb">
                                </button>
                                <button class="owl-thumb-item">
                                    <img src="assets/images/products/gallery/thumb/7.png" alt="product thumb">
                                </button>
                                <button class="owl-thumb-item">
                                    <img src="assets/images/products/gallery/thumb/8.png" alt="product thumb">
                                </button>
                            </div>
                            <!-- .owl-thumbs end -->
                        </div>
                        <!-- .products-gallery-carousel end -->
                    </div>
                    <!-- .col-lg-8 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- # product gallery  end -->

        <!-- product detalis #5
============================================= -->
        <section id="product-detalis5" class="product-detalis product-detalis-5  product-detalis-7 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                        <div class="product--title">
                            <h3>Hebes Living Wood Sofa</h3>
                        </div>
                        <!-- .product-title end -->
                        <div class="product--rating">
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product--review">03 Customer Review</div>
                        <!--- .product-review end -->
                        <div class="product--price">$ 42.00 <span class="old--price">$ 62.00</span></div>
                        <!-- .product-price end -->
                        <div class="product--meta">
                            <div class="product--desc-tabs tabs">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li><a href="#product--desc-tabs-1" role="tab" data-toggle="tab" class="active">INFO
                                            GUIDE</a></li>
                                    <li><a href="#product--desc-tabs-2" role="tab" data-toggle="tab">SHIPPING</a></li>
                                    <li><a href="#product--desc-tabs-3" role="tab" data-toggle="tab">RETURN</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade show active" id="product--desc-tabs-1">
                                        <div class="product--desc">
                                            <p>Find out about the ways to deal with debts if you are falling behind with
                                                day-to-day bills, loan and credit card repayments</p>
                                        </div>
                                    </div>
                                    <!-- .tab-pane end -->
                                    <div role="tabpanel" class="tab-pane fade" id="product--desc-tabs-2">
                                        <div class="product--desc">
                                            <p>Our agency can only be as strong as our people and because of this, our
                                                team have own businesses, designed game changing products.</p>
                                        </div>
                                    </div>
                                    <!-- .tab-pane end -->
                                    <div role="tabpanel" class="tab-pane fade" id="product--desc-tabs-3">
                                        <div class="product--desc">
                                            <p>Sed id interdum urna. Nam ac elit a ante commodo tristique. tum vehicula
                                                a hendrerit ac nisi. hendrerit ac nisi Lorem</p>
                                        </div>
                                    </div>
                                    <!-- .tab-pane end -->
                                </div>
                                <!-- #tab-content end -->
                            </div>
                            <!-- .product-desc-tabs end -->
                            <ul class="product--meta-info list-unstyled">
                                <li>Availability:<span>In stock</span></li>
                                <li>SKU:<span>S3456</span></li>
                            </ul>
                            <div class="product--meta-select3">
                                <form class="mb-30">
                                    <div class="row">
                                        <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                                            <div class="select--box">
                                                <i class="fa fa-caret-down"></i>
                                                <select name="color-select" id="color-select" class="form-control">
                                                    <option value="white">WHITE</option>
                                                    <option value="black">black</option>
                                                    <option value="red">red</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- .col-md-4 -->
                                        <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                                            <div class="select--box">
                                                <i class="fa fa-caret-down"></i>
                                                <select name="size-select" id="size-select" class="form-control">
                                                    <option value="small">SMALL</option>
                                                    <option value="large">large</option>
                                                    <option value="X large">X large</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- .col-md-4 -->
                                        <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                                            <div class="select-order">
                                                <div class="product-quantity">
                                                    <input class="minus" type="button" value="-">
                                                    <input type="text" id="pro1-qunt" value="2" class="qty" readonly="">
                                                    <input class="plus" type="button" value="+">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-4 -->
                                    </div>
                                    <!-- .row -->
                                </form>
                            </div><!-- .product-meta-select end -->
                            <div class="product--meta-action clearfix mb-0">
                                <a href="#" class="btn btn--primary btn--rounded btn--block mb-40">ADD TO CART</a>
                                <div class="inline-block mr-20">
                                    <a href="#" class="fav"><i class="ti-heart"></i></a>
                                    <a href="#" class="compare" data-toggle="modal" data-target="#compare-popup"><i
                                            class="ti-control-shuffle"></i></a>
                                </div>
                                <div class="inline-block product--share">
                                    <a class="share-facebook" href="#"><i class="fa fa-facebook"></i></a>
                                    <a class="share-twitter" href="#"><i class="fa fa-twitter"></i></a>
                                    <a class="share-google-plus" href="#"><i class="fa fa-pinterest-p"></i></a>
                                    <a class="share-linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                                </div>
                                <!-- .product-share end -->
                            </div>
                            <!-- .product-meta-action end -->
                        </div>
                        <!-- .product-meta end -->
                    </div>
                    <!-- .col-lg-6 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- .product detalis end -->


        <!-- product features #2 
============================================= -->
        <section id="product-features2" class="product-detalis product-features-2 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-7 static">
                        <div class="feature--img">
                            <img src="assets/images/products/product-features/3.png" alt="product" class="img-fluid">
                        </div>
                    </div>
                    <!-- .col-lg-6 end -->
                    <div class="col-sm-12 col-md-12 col-lg-5">
                        <div class="heading mt-40">
                            <h2 class="heading--title">Product Description </h2>
                        </div>
                        <div class="features--desc">
                            <p>At its core, every brand has something special to reveal something that inspires people.
                                We are a branding agency, this plan if you plan to create a small portfolio or busines
                                showcase for you studio or business company.</p>
                            <p>Rounding up a bunch of specific designs and talking about the merits of each is the
                                perfect way to find common ground. Collecting a wide array of samples and inspiration
                            </p>
                        </div>
                    </div>
                    <!-- .col-lg-6 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- .product features end -->



        <!-- product features #3
============================================= -->
        <section id="product-features3" class="product-detalis product-features-3 product-detalis-2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-5">
                        <div class="heading">
                            <h2 class="heading--title">Great material</h2>
                        </div>
                        <div class="product--desc-list">
                            <ul class="list-unstyled">
                                <li>Aenean id ullamcorper libero.</li>
                                <li>Vestibulum imperdiet nibh.</li>
                                <li>Lorem ullamcorper volutpat Vestibulum lacinia risus. </li>
                                <li>Etiam sagittis ullamcorper volutpat. </li>
                                <li>Donec eu libero sit amet quam egestas semper. </li>
                            </ul>
                        </div>
                    </div>
                    <!-- .col-lg-5 end -->
                    <div class="col-sm-12 col-md-12 col-lg-7 static">
                        <div class="feature--img">
                            <img src="assets/images/products/product-features/4.png" alt="product" class="img-fluid">
                        </div>
                    </div>
                    <!-- .col-lg-6 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- .product features end -->



        <!-- product features #4 
============================================= -->
        <section id="product-features4" class="product-detalis product-features-2  product-features-4 pt-0 pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-7 static">
                        <div class="feature--img">
                            <img src="assets/images/products/product-features/5.png" alt="product" class="img-fluid">
                        </div>
                    </div>
                    <!-- .col-lg-6 end -->
                    <div class="col-sm-12 col-md-12 col-lg-5">
                        <div class="heading">
                            <h2 class="heading--title">Great Color Design</h2>
                        </div>
                        <div class="features--desc">
                            <p>At its core, every brand has something special to reveal something that inspires people.
                                We are a branding agency, this plan if you plan to create a small portfolio</p>
                        </div>
                        <ul class="list-unstyled available--colors mb-50">
                            <li><a href="#"><span class="gray"></span>GREY</a></li>
                            <li><a href="#"><span class="gold"></span>GOLD</a></li>
                            <li><a href="#"><span class="blue"></span>BLUE</a></li>
                        </ul>
                    </div>
                    <!-- .col-lg-5 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- .product features end -->

        <!-- product detalis #2
============================================= -->
        <section id="product-detalis2" class="product-detalis product-detalis-2 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-10 offset-lg-1">
                        <div class="product--tabs tabs">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li><a href="#description" aria-controls="description" role="tab" data-toggle="tab"
                                        class="active">description</a></li>
                                <li><a href="#addtional-info" aria-controls="addtional-info" role="tab"
                                        data-toggle="tab">Addtional info</a></li>
                                <li><a href="#reviews" aria-controls="reviews" role="tab"
                                        data-toggle="tab">reviews(2)</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="description">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-10 offset-lg-1">

                                            <div class="row">

                                                <div class="col-sm-12 col-md-12 col-lg-8">
                                                    <div class="product--desc">
                                                        <p>Our agency can only be as strong as our people and because of
                                                            this, our team have own businesses, designed game changing
                                                            products, consulted for companies and competed collegiately
                                                            and professionally when it comes to sports.</p>
                                                        <p>Find out about the ways to deal with debts if you are falling
                                                            behind with day-to-day bills, loan and credit card
                                                            repayments or other commitments & get some free advice by
                                                            speaking to one of our financial advisers over the phone?
                                                            Just submit your details and we’ll be in touch shortly. Our
                                                            staff can help work out what's right for you !</p>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                    <div class="product--desc-list">
                                                        <h6>SIZE & FIT</h6>
                                                        <ul class="list-unstyled mb-0">
                                                            <li>Our Model wears a UK 8/ EU 36/ Us 4</li>
                                                            <li>Model is 170/ 5’7” Tall</li>
                                                            <li>Shoulder seam to hem measures appox 58”/ 147 cm in
                                                                lenght</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- .col-lg-8 end -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- .row end -->
                                </div>
                                <!-- #description end -->
                                <div role="tabpanel" class="tab-pane fade" id="addtional-info">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-10 offset-lg-1">
                                            <div class="product--desc">
                                                <p>Our agency can only be as strong as our people and because of this,
                                                    our team have own businesses, designed game changing products,
                                                    consulted for companies and competed collegiately and professionally
                                                </p>
                                                <p>Find out about the ways to deal with debts if you are falling behind
                                                    with day-to-day bills, loan and credit card repayments or other
                                                    commitments & get some free advice by speaking to one of our
                                                    financial advisers over the phone? Just submit your details and
                                                    we’ll be in touch shortly. Our staff can help work out what's right
                                                    for you !</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- #details end -->
                                <div role="tabpanel" class="tab-pane fade" id="reviews">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                                            <ul class="product--review-comments list-unstyled">
                                                <li class="review--comment">
                                                    <div class="author--img">
                                                        <img src="assets/images/testimonials/authors/1.jpg"
                                                            alt="author">
                                                    </div>
                                                    <div class="review--comment-content">
                                                        <div class="clearfix">
                                                            <div class="pull-left">
                                                                <h6>Hellen Marry</h6>
                                                                <span class="review--date">July 06th, 2019</span>
                                                            </div>
                                                            <div class="pull-right product--rating">
                                                                <i class="fa fa-star active"></i>
                                                                <i class="fa fa-star active"></i>
                                                                <i class="fa fa-star active"></i>
                                                                <i class="fa fa-star active"></i>
                                                            </div>
                                                        </div>
                                                        <div class="product--comment">
                                                            <p>At its core, every brand has something special to reveal
                                                                something that inspires people. We are a branding
                                                                agency, this plan if you plan to create a small
                                                                portfolio</p>
                                                        </div>
                                                        <a href="#" class="reply">reply<i
                                                                class="fa fa-long-arrow-right"></i></a>
                                                    </div>
                                                </li>
                                                <!-- .review-comment end -->
                                                <li class="review--comment">
                                                    <div class="author--img">
                                                        <img src="assets/images/testimonials/authors/2.jpg"
                                                            alt="author">
                                                    </div>
                                                    <div class="review--comment-content">
                                                        <div class="clearfix">
                                                            <div class="pull-left">
                                                                <h6>Adam Henry</h6>
                                                                <span class="review--date">July 06th, 2019</span>
                                                            </div>
                                                            <div class="pull-right product--rating">
                                                                <i class="fa fa-star active"></i>
                                                                <i class="fa fa-star active"></i>
                                                                <i class="fa fa-star active"></i>
                                                                <i class="fa fa-star active"></i>
                                                            </div>
                                                        </div>
                                                        <div class="product--comment">
                                                            <p> it's more than that. We offer integral communication
                                                                services, and we're responsible for our process and
                                                                results. We thank each client and their projects.</p>
                                                        </div>
                                                        <a href="#" class="reply">reply<i
                                                                class="fa fa-long-arrow-right"></i></a>
                                                    </div>
                                                </li>
                                                <!-- .review-comment end -->
                                                <li class="review--comment">
                                                    <div class="author--img">
                                                        <img src="assets/images/testimonials/authors/3.jpg"
                                                            alt="author">
                                                    </div>
                                                    <div class="review--comment-content">
                                                        <div class="clearfix">
                                                            <div class="pull-left">
                                                                <h6>John Smith</h6>
                                                                <span class="review--date">July 06th, 2019</span>
                                                            </div>
                                                            <div class="pull-right product--rating">
                                                                <i class="fa fa-star active"></i>
                                                                <i class="fa fa-star active"></i>
                                                                <i class="fa fa-star active"></i>
                                                                <i class="fa fa-star active"></i>
                                                            </div>
                                                        </div>
                                                        <div class="product--comment">
                                                            <p>Pellentesque habitant morbi tristique senectus et netus
                                                                et malesuada fames ac turpis egestas. Vestibulum tortor
                                                                quam, feugiat vitae, ultricies eget, tempor sit amet</p>
                                                        </div>
                                                        <a href="#" class="reply">reply<i
                                                                class="fa fa-long-arrow-right"></i></a>
                                                    </div>
                                                </li>
                                                <!-- .review-comment end -->
                                            </ul>
                                            <div class="form--review-rating text-center">
                                                <h5>Add Your Review</h5>
                                                <div class="form--review-rating-content">
                                                    <span>Your Ratting</span>
                                                    <div class="product--rating">
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                    </div>
                                                    <div class="product--rating">
                                                        <a href="#">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </a>
                                                    </div>
                                                    <div class="product--rating">
                                                        <a href="#">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </a>
                                                    </div>
                                                    <div class="product--rating">
                                                        <a href="#">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </a>
                                                    </div>
                                                    <div class="product--rating">
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form--review">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-6">
                                                            <input type="text" class="form-control" id="name"
                                                                placeholder="Enter your name" />
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-6">
                                                            <input type="email" class="form-control" id="email"
                                                                placeholder="Email" />
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <textarea class="form-control" id="review" rows="2"
                                                                placeholder="Comment review"></textarea>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-12 text--center">
                                                            <button type="submit"
                                                                class="btn btn--primary btn--rounded">Submit<i
                                                                    class="lnr lnr-arrow-right"></i></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- .col-lg-8 end -->
                                    </div>
                                    <!-- .row end -->
                                </div>
                                <!-- #reviews end -->
                            </div>
                            <!-- #tab-content end -->
                        </div>
                        <!-- .product-tabs end -->
                    </div>
                    <!-- .col-lg-12 end -->
                </div>
                <!-- .row end -->

            </div>
            <!-- .container end -->
        </section>
        <!-- .product detalis end -->


        <!-- related products
============================================= -->
        <section id="related-products" class="related-products pt-0 pb-80">
            <div class="container-fluid pr-40 pl-40">
                <hr>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="heading text-center mb-50">
                            <h2 class="heading--title">Recent Products</h2>
                        </div>
                    </div>
                    <!-- .col-lg-12 end -->
                </div>
                <!-- .row end -->
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="carousel owl-carousel carousel-dots" data-slide="4" data-slide-rs="2"
                            data-autoplay="true" data-nav="false" data-dots="true" data-space="15" data-loop="true"
                            data-speed="800">
                            <!-- Product item #1 -->
                            <div class="product-item">
                                <div class="product--img">
                                    <img src="assets/images/products/related/1.jpg" alt="product" />
                                </div>
                                <!-- .product-img end -->
                                <div class="product--content">
                                    <div class="product--title">
                                        <h3><a href="#">Hebes Great Chair</a></h3>
                                    </div>
                                    <!-- .product-title end -->
                                    <div class="product--price">
                                        <span>$ 42.00</span>
                                    </div>
                                    <!-- .product-price end -->
                                    <div class="product--hover">
                                        <div class="product--action">
                                            <a href="page-cart.html" class="btn btn--primary btn--rounded"><i
                                                    class="icon-bag"></i>ADD TO CART</a>
                                            <a data-toggle="modal" data-target="#product-popup"><i
                                                    class="ti-search"></i></a>
                                            <a href="#"><i class="ti-heart"></i></a>
                                            <a href="#" class="compare" data-toggle="modal"
                                                data-target="#compare-popup"><i class="ti-control-shuffle"></i></a>
                                        </div>
                                    </div>
                                    <!-- .product-hover end -->
                                </div>
                                <!-- .product-content end -->
                            </div>
                            <!-- .product-item end -->
                            <!-- product item #2 -->
                            <div class="product-item">
                                <div class="product--img">
                                    <img src="assets/images/products/related/2.jpg" alt="product" />
                                </div>
                                <!-- .carousel end -->
                                <div class="product--content">
                                    <div class="product--title">
                                        <h3><a href="#">Hebes Great Chair</a></h3>
                                    </div>
                                    <!-- .product-title end -->
                                    <div class="product--price">
                                        <span>$ 42.00</span>
                                    </div>
                                    <!-- .product-price end -->
                                    <div class="product--hover">
                                        <div class="product--action">
                                            <a href="page-cart.html" class="btn btn--primary btn--rounded"><i
                                                    class="icon-bag"></i>ADD TO CART</a>
                                            <a data-toggle="modal" data-target="#product-popup"><i
                                                    class="ti-search"></i></a>
                                            <a href="#"><i class="ti-heart"></i></a>
                                            <a href="#" class="compare" data-toggle="modal"
                                                data-target="#compare-popup"><i class="ti-control-shuffle"></i></a>
                                        </div>
                                    </div>
                                    <!-- .product-hover end -->
                                </div>
                                <!-- .product-content end -->
                            </div>
                            <!-- .product-item end -->
                            <!-- Product item #3 -->
                            <div class="product-item">
                                <div class="product--img">
                                    <img src="assets/images/products/related/3.jpg" alt="product" />
                                </div>
                                <!-- .product-img end -->
                                <div class="product--content">
                                    <div class="product--title">
                                        <h3><a href="#">Hebes Amazing Chair</a></h3>
                                    </div>
                                    <!-- .product-title end -->
                                    <div class="product--price">
                                        <span>$ 42.00</span>
                                    </div>
                                    <!-- .product-price end -->
                                    <div class="product--hover">
                                        <div class="product--action">
                                            <a href="page-cart.html" class="btn btn--primary btn--rounded"><i
                                                    class="icon-bag"></i>ADD TO CART</a>
                                            <a data-toggle="modal" data-target="#product-popup"><i
                                                    class="ti-search"></i></a>
                                            <a href="#"><i class="ti-heart"></i></a>
                                            <a href="#" class="compare" data-toggle="modal"
                                                data-target="#compare-popup"><i class="ti-control-shuffle"></i></a>
                                        </div>
                                    </div>
                                    <!-- .product-hover end -->
                                </div>
                                <!-- .product-content end -->
                            </div>
                            <!-- .product-item end -->
                            <!-- Product item #4 -->
                            <div class="product-item">
                                <div class="product--img">
                                    <img src="assets/images/products/related/4.jpg" alt="product" />
                                    <span class="featured-item">hot</span>
                                </div>
                                <!-- .product-img end -->
                                <div class="product--content">
                                    <div class="product--title">
                                        <h3><a href="#">Hebes Black wood Chair</a></h3>
                                    </div>
                                    <!-- .product-title end -->
                                    <div class="product--price">
                                        <span>$ 42.00</span>
                                    </div>
                                    <!-- .product-price end -->
                                    <div class="product--hover">
                                        <div class="product--action">
                                            <a href="page-cart.html" class="btn btn--primary btn--rounded"><i
                                                    class="icon-bag"></i>ADD TO CART</a>
                                            <a data-toggle="modal" data-target="#product-popup"><i
                                                    class="ti-search"></i></a>
                                            <a href="#"><i class="ti-heart"></i></a>
                                            <a href="#" class="compare" data-toggle="modal"
                                                data-target="#compare-popup"><i class="ti-control-shuffle"></i></a>
                                        </div>
                                    </div>
                                    <!-- .product-hover end -->
                                </div>
                                <!-- .product-content end -->
                            </div>
                            <!-- .product-item end -->
                            <!-- Product item #5 -->
                            <div class="product-item">
                                <div class="product--img">
                                    <img src="assets/images/products/related/5.jpg" alt="product" />
                                    <span class="featured-item featured-item2">hot</span>
                                </div>
                                <!-- .product-img end -->
                                <div class="product--content">
                                    <div class="product--title">
                                        <h3><a href="#">Hebes Great Chair</a></h3>
                                    </div>
                                    <!-- .product-title end -->
                                    <div class="product--price">
                                        <span>$ 42.00</span>
                                    </div>
                                    <!-- .product-price end -->
                                    <div class="product--hover">
                                        <div class="product--action">
                                            <a href="page-cart.html" class="btn btn--primary btn--rounded"><i
                                                    class="icon-bag"></i>ADD TO CART</a>
                                            <a data-toggle="modal" data-target="#product-popup"><i
                                                    class="ti-search"></i></a>
                                            <a href="#"><i class="ti-heart"></i></a>
                                            <a href="#" class="compare" data-toggle="modal"
                                                data-target="#compare-popup"><i class="ti-control-shuffle"></i></a>
                                        </div>
                                    </div>
                                    <!-- .product-hover end -->
                                </div>
                                <!-- .product-content end -->
                            </div>
                            <!-- .product-item end -->
                            <!-- Product item #6 -->
                            <div class="product-item">
                                <div class="product--img">
                                    <img src="assets/images/products/related/3.jpg" alt="product" />
                                </div>
                                <!-- .product-img end -->
                                <div class="product--content">
                                    <div class="product--title">
                                        <h3><a href="#">Hebes Amazing Chair</a></h3>
                                    </div>
                                    <!-- .product-title end -->
                                    <div class="product--price">
                                        <span>$ 42.00</span>
                                    </div>
                                    <!-- .product-price end -->
                                    <div class="product--hover">
                                        <div class="product--action">
                                            <a href="page-cart.html" class="btn btn--primary btn--rounded"><i
                                                    class="icon-bag"></i>ADD TO CART</a>
                                            <a data-toggle="modal" data-target="#product-popup"><i
                                                    class="ti-search"></i></a>
                                            <a href="#"><i class="ti-heart"></i></a>
                                            <a href="#" class="compare" data-toggle="modal"
                                                data-target="#compare-popup"><i class="ti-control-shuffle"></i></a>
                                        </div>
                                    </div>
                                    <!-- .product-hover end -->
                                </div>
                                <!-- .product-content end -->
                            </div>
                            <!-- .product-item end -->
                            <!-- Product item #7 -->
                            <div class="product-item">
                                <div class="product--img">
                                    <img src="assets/images/products/related/4.jpg" alt="product" />
                                    <span class="featured-item">hot</span>
                                </div>
                                <!-- .product-img end -->
                                <div class="product--content">
                                    <div class="product--title">
                                        <h3><a href="#">Hebes Black wood Chair</a></h3>
                                    </div>
                                    <!-- .product-title end -->
                                    <div class="product--price">
                                        <span>$ 42.00</span>
                                    </div>
                                    <!-- .product-price end -->
                                    <div class="product--hover">
                                        <div class="product--action">
                                            <a href="page-cart.html" class="btn btn--primary btn--rounded"><i
                                                    class="icon-bag"></i>ADD TO CART</a>
                                            <a data-toggle="modal" data-target="#product-popup"><i
                                                    class="ti-search"></i></a>
                                            <a href="#"><i class="ti-heart"></i></a>
                                            <a href="#" class="compare" data-toggle="modal"
                                                data-target="#compare-popup"><i class="ti-control-shuffle"></i></a>
                                        </div>
                                    </div>
                                    <!-- .product-hover end -->
                                </div>
                                <!-- .product-content end -->
                            </div>
                            <!-- .product-item end -->
                            <!-- Product item #8 -->
                            <div class="product-item">
                                <div class="product--img">
                                    <img src="assets/images/products/related/5.jpg" alt="product" />
                                    <span class="featured-item featured-item2">hot</span>
                                </div>
                                <!-- .product-img end -->
                                <div class="product--content">
                                    <div class="product--title">
                                        <h3><a href="#">Hebes Great Chair</a></h3>
                                    </div>
                                    <!-- .product-title end -->
                                    <div class="product--price">
                                        <span>$ 42.00</span>
                                    </div>
                                    <!-- .product-price end -->
                                    <div class="product--hover">
                                        <div class="product--action">
                                            <a href="page-cart.html" class="btn btn--primary btn--rounded"><i
                                                    class="icon-bag"></i>ADD TO CART</a>
                                            <a data-toggle="modal" data-target="#product-popup"><i
                                                    class="ti-search"></i></a>
                                            <a href="#"><i class="ti-heart"></i></a>
                                            <a href="#" class="compare" data-toggle="modal"
                                                data-target="#compare-popup"><i class="ti-control-shuffle"></i></a>
                                        </div>
                                    </div>
                                    <!-- .product-hover end -->
                                </div>
                                <!-- .product-content end -->
                            </div>
                            <!-- .product-item end -->
                        </div>
                        <!-- .carousel end -->

                    </div>
                    <!-- .row end -->
                </div>
            </div>
            <!-- .container end -->
        </section>
        <!-- .related products end -->

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
                                <span>&copy; 2019 Hebes - All Rights Reserved, by </span><a
                                    href="https://themeforest.net/user/zytheme">zytheme</a>
                            </div>
                            <!-- .footer-copyright end -->
                        </div>
                        <!-- .col-lg-5ths end -->
                        <div class="col-sm-12 col-md-6 col-lg-5ths text-center-xs widget--contact-info">
                            <div class="widget--content">
                                <ul class="list-unstyled">
                                    <li>No. 342 - London Oxford Street,</li>
                                    <li>012 United Kingdom.</li>
                                    <li><a href="mailto:admin@gmail.com">support@zytheme.com</a></li>
                                    <li><a href="tel:+03234567890">+032 3456 7890</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- .col-lg-5ths end -->
                        <div class="col-sm-12 col-md-6 col-lg-5ths text-center-xs widget--links">
                            <div class="widget--content">
                                <ul class="list-unstyled">
                                    <li><a href="page-about-1.html">About Us </a></li>
                                    <li><a href="page-privacy.html">Privacy Policy</a></li>
                                    <li><a href="page-terms.html">Term & Conditions</a></li>
                                    <li><a href="#">Help</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- .col-lg-5ths end -->
                        <div class="col-sm-12 col-md-6 col-lg-5ths text-center-xs widget--newsletter">
                            <div class="widget--content">
                                <h3>GET 20% OFF</h3>
                                <p>By subscribing to our newsletter</p>
                                <form class="mailchimp form--newsletter">
                                    <input type="email" class="form-control" placeholder="Enter your email" required>
                                    <button type="submit"><i class="fa fa-chevron-right"></i></button>
                                    <div class="subscribe-alert"></div>
                                </form>
                            </div>
                        </div>
                        <!-- .col-lg-5ths end -->
                        <div class="col-sm-12 col-md-6 col-lg-5ths  text-center-xs widget--social">
                            <div class="widget--content">
                                <div class="social--icons">
                                    <span>Follow Us On Social</span>
                                    <a class="facebook" href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a class="twitter" href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a class="google-plus" href="#">
                                        <i class="fa fa-pinterest-p"></i>
                                    </a>
                                    <a class="instagram" href="#">
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





        <div class="modal fade search-popup modal-fullscreen" id="search-popup" tabindex="-1" role="dialog">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <div class="pos-vertical-center">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="heading mb-90">
                                <h2 class="heading--title">Search</h2>
                            </div>
                            <form class="form-inline form-search">
                                <div class="form-group">
                                    <div class="select--box">
                                        <i class="fa fa-caret-down"></i>
                                        <select name="select-cat" id="select-cat" class="form-control">
                                            <option>All Categotries</option>
                                            <option>Chairs</option>
                                            <option>Tables</option>
                                            <option>Sofas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search here">
                                    <button type="button"><i class="lnr lnr-arrow-right"></i></button>
                                </div>
                            </form>
                            <!-- .form-search end -->
                            <p>TOP KEYWORDS: Chair, Table, Sofas, Lamps</p>
                        </div>
                    </div>
                </div>
                <!-- .modal-content end -->
            </div>
        </div>
        <!-- .modal end -->
        <div class="modal model-bg-light fade product-popup modal-fullscreen" id="product-popup" tabindex="-1"
            role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <div class="product-detalis product-detalis-3 product-detalis-10 pt-0 pb-0">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    <div class="products-gallery-carousel products-gallery-carousel-2">
                                        <div class="owl-carousel products-slider" data-slider-id="1">
                                            <div class="product-img">
                                                <img src="assets/images/products/gallery/23.jpg" alt="product">
                                            </div>
                                            <div class="product-img">
                                                <img src="assets/images/products/gallery/24.jpg" alt="product">
                                            </div>
                                            <div class="product-img">
                                                <img src="assets/images/products/gallery/25.jpg" alt="product">
                                            </div>
                                            <div class="product-img">
                                                <img src="assets/images/products/gallery/24.jpg" alt="product">
                                            </div>
                                        </div>
                                        <div class="owl-thumbs thumbs-bg" data-slider-id="1">
                                            <button class="owl-thumb-item">
                                                <img src="assets/images/products/gallery/thumb/17.png"
                                                    alt="product thumb">
                                            </button>
                                            <button class="owl-thumb-item">
                                                <img src="assets/images/products/gallery/thumb/18.png"
                                                    alt="product thumb">
                                            </button>
                                            <button class="owl-thumb-item">
                                                <img src="assets/images/products/gallery/thumb/19.png"
                                                    alt="product thumb">
                                            </button>
                                            <button class="owl-thumb-item">
                                                <img src="assets/images/products/gallery/thumb/20.png"
                                                    alt="product thumb">
                                            </button>
                                        </div>
                                        <!-- .owl-thumbs end -->
                                    </div>
                                    <!-- .products-gallery-carousel end -->
                                </div>
                                <!-- .col-lg-7 end -->
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    <div class="product--title">
                                        <h3>Hebes Living Sofa</h3>
                                    </div>
                                    <!-- .product-title end -->
                                    <div class="product--rating">
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product--review">03 Customer Review</div>
                                    <!--- .product-review end -->
                                    <div class="product--price">$ 42.00</div>
                                    <!-- .product-price end -->
                                    <div class="product--desc-tabs tabs">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li><a href="#popup--desc-tabs-1" role="tab" data-toggle="tab"
                                                    class="active">INFO GUIDE</a></li>
                                            <li><a href="#popup--desc-tabs-2" role="tab" data-toggle="tab">SHIPPING</a>
                                            </li>
                                            <li><a href="#popup--desc-tabs-3" role="tab" data-toggle="tab">RETURN</a>
                                            </li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade show active"
                                                id="popup--desc-tabs-1">
                                                <div class="product--desc">
                                                    <p>Sed id interdum urna. Nam ac elit a ante commodo tristique. tum
                                                        vehicula a hendrerit ac nisi. hendrerit ac</p>
                                                </div>
                                            </div>
                                            <!-- .tab-pane end -->
                                            <div role="tabpanel" class="tab-pane fade" id="popup--desc-tabs-2">
                                                <div class="product--desc">
                                                    <p>Sed id interdum urna. Nam ac elit a ante commodo tristique. tum
                                                        vehicula a hendrerit ac nisi. hendrerit ac</p>
                                                </div>
                                            </div>
                                            <!-- .tab-pane end -->
                                            <div role="tabpanel" class="tab-pane fade" id="popup--desc-tabs-3">
                                                <div class="product--desc">
                                                    <p>Sed id interdum urna. Nam ac elit a ante commodo tristique. tum
                                                        vehicula a hendrerit ac nisi. hendrerit ac</p>
                                                </div>
                                            </div>
                                            <!-- .tab-pane end -->
                                        </div>
                                        <!-- #tab-content end -->
                                    </div>
                                    <!-- .product-desc-tabs end -->
                                    <div class="product--meta">
                                        <ul class="product--meta-info list-unstyled">
                                            <li>Availability:<span>In stock</span></li>
                                            <li>SKU:<span>S3456</span></li>
                                        </ul>
                                        <!-- .product-meta-info end -->
                                        <div class="product--meta-select3">
                                            <form class="mb-30">
                                                <div class="row">
                                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                        <div class="select--box">
                                                            <i class="fa fa-caret-down"></i>
                                                            <select class="form-control">
                                                                <option value="white">WHITE</option>
                                                                <option value="black">black</option>
                                                                <option value="red">red</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!-- .col-md-6 -->
                                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                        <div class="select--box">
                                                            <i class="fa fa-caret-down"></i>
                                                            <select class="form-control">
                                                                <option value="small">SMALL</option>
                                                                <option value="large">large</option>
                                                                <option value="X large">X large</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!-- .col-md-6 -->
                                                </div>
                                                <!-- .row -->
                                            </form>
                                        </div>
                                        <!-- .product-meta-select end -->
                                        <div class="product--meta-action clearfix mb-0">
                                            <div class="mb-40">
                                                <div class="select-order">
                                                    <div class="product-quantity">
                                                        <input class="minus" type="button" value="-">
                                                        <input type="text" id="pro1-qunt" value="2" class="qty"
                                                            readonly="">
                                                        <input class="plus" type="button" value="+">
                                                    </div>
                                                </div>
                                                <a href="product-gallery.html" class="btn btn--primary btn--rounded">ADD
                                                    TO CART</a>
                                            </div>
                                            <div class="clearfix">
                                                <div class="pull-left">
                                                    <a href="#" class="fav"><i class="ti-heart"></i></a>
                                                    <a href="#" class="compare" data-toggle="modal"
                                                        data-target="#compare-popup"><i
                                                            class="ti-control-shuffle"></i></a>
                                                </div>
                                                <div class="product--share pull-right">
                                                    <a class="share-facebook" href="#"><i
                                                            class="fa fa-facebook"></i></a>
                                                    <a class="share-twitter" href="#"><i class="fa fa-twitter"></i></a>
                                                    <a class="share-google-plus" href="#"><i
                                                            class="fa fa-pinterest-p"></i></a>
                                                    <a class="share-linkedin" href="#"><i
                                                            class="fa fa-linkedin"></i></a>
                                                </div>
                                            </div>
                                            <!-- .product-share end -->
                                        </div>
                                    </div>

                                </div>
                                <!-- .col-lg-6 end -->
                            </div>
                            <!-- .row end -->

                        </div>
                        <!-- .modal-body end -->
                    </div>
                </div>
                <!-- .modal-content end -->
            </div>
            <!-- .modal-dialog end -->
        </div>
        <!-- .modal end -->
        <div class="modal model-bg-light fade compare-popup modal-fullscreen" id="compare-popup" tabindex="-1"
            role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <div class="heading text-center mb-50">
                            <h2 class="heading--title">Compare products</h2>
                        </div>
                        <div class="table-responsive table-bordered product-detalis-2 product-detalis-4">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row"></th>
                                        <td class="product--info">
                                            <div class="product--img">
                                                <img src="assets/images/products/gallery/thumb/25.png" alt="">
                                            </div>
                                            <div class="product--title">
                                                <h3>Relaxing chair</h3>
                                            </div>
                                            <div class="product--price">$ 30.00</div>
                                        </td>
                                        <td class="product--info">
                                            <div class="product--img">
                                                <img src="assets/images/products/gallery/thumb/26.png" alt="">
                                            </div>
                                            <div class="product--title">
                                                <h3>Simple chair</h3>
                                            </div>
                                            <div class="product--price">$ 23.00</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Description </th>
                                        <td>
                                            <div class="product--desc-list">
                                                <ul class="list-unstyled mb-0">
                                                    <li>Our Model wears a UK 8/ EU 36/ Us 4</li>
                                                    <li>Model is 170/ 5’7” Tall</li>
                                                    <li>Shoulder seam to hem measures appox 58”/ 147 cm in lenght</li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="product--desc-list">
                                                <ul class="list-unstyled mb-0">
                                                    <li>Our Model wears a UK 8/ EU 36/ Us 4</li>
                                                    <li>Model is 170/ 5’7” Tall</li>
                                                    <li>Shoulder seam to hem measures appox 58”/ 147 cm in lenght</li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Availability</th>
                                        <td>instock</td>
                                        <td>instock</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">color</th>
                                        <td>blue</td>
                                        <td>black</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Sku Code</th>
                                        <td>h124548461</td>
                                        <td>b124741991</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">price</th>
                                        <td><span class="color-theme">$ 30.00</span></td>
                                        <td><span class="color-theme">$ 23.00</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Order</th>
                                        <td> <a href="page-cart.html" class="btn btn--primary btn--block">Add to
                                                cart</a></td>
                                        <td> <a href="page-cart.html" class="btn btn--primary btn--block">Add to
                                                cart</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- .modal-body end -->
                </div>
                <!-- .modal-content end -->
            </div>
            <!-- .modal-dialog end -->
        </div>
        <!-- .modal end -->
    </div><!-- #wrapper end -->

    <!-- Footer Scripts
============================================= -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/functions.js"></script>
</body>

</html>