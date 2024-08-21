<?php
include_once "ozkaderautomotivepanel/php/main.php";
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
    <title>Hakkımızda | Özkader Otomotiv</title>
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

        <!-- Page Title #1
============================================= -->
        <section id="page-title" class="page-title mt-0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="title title-1 text-center">
                            <div class="title--content">
                                <div class="title--heading">
                                    <h1>Özkader Otomotiv: <br> Güvenin ve Kalitenin Adresi</h1>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <ol class="breadcrumb breadcrumb-bottom">
                                <li><a href="index.php">Anasayfa</a></li>
                                <li class="active">Hakkımızda</li>
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

        <!-- about #1
============================================= -->
        <section id="about1" class="about about-1 pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="heading heading-2">
                            <p class="heading--subtitle">Biz Kimiz?</p>
                            <h2 class="heading--title">Gelenekten Güç Alan, Geleceğe Yön Veren</h2>
                        </div>
                    </div>
                    <!-- .col-lg-6 end -->
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="about--text">
                            <p><span>Özkader Otomotiv</span>, Mart 1998'de Konya’da kurulmuş, otomotiv sektöründe
                                elektrik yedek
                                parçaları alanında faaliyetlerine başlamıştır. İlk yıllarında sadece toptan satış
                                yaparak sektörde hızlı bir şekilde yer edinmiş, müşteri memnuniyetini en üst seviyede
                                tutarak kısa sürede büyük bir güven kazanmıştır. Bu güven ve başarı, 2006 yılında
                                perakende satışa da adım atılmasını sağlamış ve <span>Özkader Otomotiv</span>, hem
                                toptan hem de
                                perakende satış alanlarında hizmet vermeye başlamıştır.</p>
                        </div>
                        <div class="about--signature">Hasan Hüseyin Ata<span>Kurucu</span></div>
                    </div>
                    <!-- .col-lg-6 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- #about1 end -->

        <!-- about gallery
============================================= -->
        <section id="about-gallery" class="about about-gallery pt-0 pb-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="carousel owl-carousel" data-slide="1" data-slide-rs="1" data-autoplay="true"
                            data-nav="false" data-dots="false" data-space="0" data-loop="true" data-speed="800">
                            <div class="gallery--item">
                                <img src="assets/images/about/gallery/aboutUsPhotos.webp" alt="img">
                            </div>
                            <!-- .gallery-item end -->
                            <div class="gallery--item">
                                <img src="assets/images/about/gallery/aboutUsPhotos2.webp" alt="img">
                            </div>
                            <!-- .gallery-item end -->
                        </div>
                    </div>
                    <!-- .col-lg-12 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- #about gallery end -->

        <!-- Clients #1
============================================= -->
        <section id="clients1" class="clients clients-1 text-center pt-0 pb-0">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="carousel  owl-carousel" data-slide="6" data-slide-rs="2" data-autoplay="true"
                            data-nav="false" data-dots="false" data-space="0" data-loop="true" data-speed="800">
                            <?php
                            if (is_array($fetchDataBrand)) {
                                $sn = 1;
                                foreach ($fetchDataBrand as $data) {
                            ?>
                                    <div class="client">
                                        <img src="ozkaderautomotivepanel/<?php echo $data['brand_logo'] ?>"
                                            alt="<?php echo $data['brand_name'] ?>">
                                    </div>
                            <?php
                                    $sn++;
                                }
                            } else {
                                echo $fetchDataBrand;
                            } ?>
                        </div>
                    </div>
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- #clients1 end -->

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