<?php
include_once "ozkaderautomotivepanel/php/main.php";

$upper_category_id_for_product_detail = $fetchDataProductDetails['upper_category_id'];
$lower_category_id_for_product_detail = $fetchDataProductDetails['lower_category_id'];
$brand_id_for_product_detail = $fetchDataProductDetails['brand_id'];

$fetchDataUpperCategoryForProduct = fetch_data_upper_category_for_product($db, $tableNameUpperCategory, $columnsUpperCategory, $upper_category_id_for_product_detail);
$fetchDataLowerCategoryForProduct = fetch_data_lower_category_for_product($db, $tableNameLowerCategory, $columnsLowerCategory, $lower_category_id_for_product_detail);
$fetchDataBrandForProduct = fetch_data_brand_for_product($db, $tableNameBrand, $columnsBrand, $brand_id_for_product_detail);

$upper_category_name_for_product = $fetchDataUpperCategoryForProduct['upper_category_name'];
$lower_category_name_for_product = $fetchDataLowerCategoryForProduct['lower_category_name'];
$brand_name_for_product = $fetchDataBrandForProduct['brand_name'];


$fetchDataProductFeatured = fetch_data_product_with_categories($db, $tableNameProduct, $columnsProduct, $lower_category_id_for_product_detail);

?>
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
    <title><?php echo $fetchDataProductDetails['product_name'] ?> Detay | Özkader Otomotiv</title>
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

        <?php include_once "website_part/header.php" ?>


        <!-- product gallery #2
============================================= -->
        <section id="product-gallery2" class="product-gallery-2 text-center mtop-100">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2 page-title">
                        <div class="title title-1 mb-70">
                            <div class="title--content">
                                <div class="title--heading">
                                    <h1><?php echo $fetchDataProductDetails['product_name'] ?></h1>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <ol class="breadcrumb">
                                <li><a href="index.php">Anasayfa</a></li>
                                <li><a href="#"><?php echo $upper_category_name_for_product ?></a></li>
                                <li class="active"><?php echo $lower_category_name_for_product ?></li>
                            </ol>
                        </div>
                        <!-- .title end -->
                        <div class="products-gallery-carousel">
                            <div class="owl-carousel products-slider">
                                <div class="product-img">
                                    <img src="ozkaderautomotivepanel/<?php echo $fetchDataProductDetails['product_photo'] ?>"
                                        alt="product">
                                </div>
                            </div>
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
        <section id="product-detalis5" class="product-detalis product-detalis-5 mtop-150 product-detalis-7 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                        <div class="product--title">
                            <h3><?php echo $fetchDataProductDetails['product_name'] ?></h3>
                        </div>
                        <!-- .product-title end -->
                        <div class="product--rating">
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                        </div>
                        <div class="product--review">Üretici Kodu:
                            <?php echo $fetchDataProductDetails['product_manufacturer_code'] ?></div>
                        <!--- .product-review end -->
                        <div class="product--price"><?php echo $brand_name_for_product ?> </div>
                        <!-- .product-price end -->
                        <div class="product--meta">
                            <!-- .product-desc-tabs end -->
                            <ul class="product--meta-info list-unstyled">
                                <li>Stok Durumu: <span>
                                        <?php
                                        if ($fetchDataProductDetails['product_publicy'] == 1) {
                                            echo 'Stokta';
                                        } else {
                                            echo 'Stokta Yok';
                                        }
                                        ?>
                                    </span></li>
                                <li>Ürün Kodu:<span><?php echo $fetchDataProductDetails['product_code'] ?></span></li>
                            </ul>
                            <div class="product--meta-action clearfix mb-0">
                                <a href="tel:05387027010" class="btn btn--primary btn--rounded btn--block mb-40">Bize
                                    Ulaşın!</a>
                                <div class="inline-block product--share">
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


        <!-- related products
============================================= -->
        <section id="related-products" class="related-products pt-0 pb-80">
            <div class="container-fluid pr-40 pl-40">
                <hr>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="heading text-center mb-50">
                            <h2 class="heading--title">Benzer Ürünler</h2>
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
                            <?php
                            if (is_array($fetchDataProductFeatured)) {
                                foreach ($fetchDataProductFeatured as $data) {
                                    $upper_category_id_for_product = $data['upper_category_id'];
                                    $lower_category_id_for_product = $data['lower_category_id'];
                                    $product_name_for_url = $data['product_name'];
                                    $product_id_for_url = $data['product_id'];
                                    $fetchDataUpperCategoryForProduct = fetch_data_upper_category_for_product($db, $tableNameUpperCategory, $columnsUpperCategory, $upper_category_id_for_product);
                                    $fetchDataLowerCategoryForProduct = fetch_data_lower_category_for_product($db, $tableNameLowerCategory, $columnsLowerCategory, $lower_category_id_for_product);
                                    $upper_category_name = $fetchDataUpperCategoryForProduct['upper_category_name'];
                                    $lower_category_name = $fetchDataLowerCategoryForProduct['lower_category_name'];

                                    $upper_category_name = cleanTurkishCharacters($upper_category_name);
                                    $lower_category_name = cleanTurkishCharacters($lower_category_name);
                                    $product_name_for_url = cleanTurkishCharacters($product_name_for_url);

                                    $url = "/$upper_category_name" . "/$lower_category_name" . "/$product_name_for_url" . "/$product_id_for_url";
                            ?>
                            <!-- Product item #1 -->
                            <div class="product-item">
                                <div class="product--img">
                                    <img src="ozkaderautomotivepanel/<?php echo $data['product_photo'] ?>"
                                        alt="product" />
                                </div>
                                <!-- .product-img end -->
                                <div class="product--content">
                                    <div class="product--title">
                                        <h3><a
                                                href="product-details.php?<?php echo $url ?>"><?php echo $data['product_name'] ?></a>
                                        </h3>
                                    </div>
                                    <!-- .product-title end -->
                                    <div class="product--price">
                                        <span>$ 42.00</span>
                                    </div>
                                    <!-- .product-price end -->
                                    <div class="product--hover">
                                        <div class="product--action">
                                            <a href="product-details.php?<?php echo $url ?>"" class=" btn btn--primary
                                                btn--rounded"><i class="icon-bag"></i>Incele</a>
                                        </div>
                                    </div>
                                    <!-- .product-hover end -->
                                </div>
                                <!-- .product-content end -->
                            </div>
                            <!-- .product-item end -->
                            <?php
                                }
                            } else {
                                echo $fetchDataProductFeatured;
                            }
                            ?>
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
        <?php include_once "website_part/footer.php" ?>

    </div><!-- #wrapper end -->

    <!-- Footer Scripts
============================================= -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/functions.js"></script>
</body>

</html>