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
    <title>Galeri | Özkader Otomotiv</title>
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
                                    <h1>Göz Kamaştıran Anlar,<br> Bizimle Keşfedin!</h1>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <ol class="breadcrumb breadcrumb-bottom">
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Galeri</li>
                            </ol>
                        </div><!-- .title end -->
                    </div><!-- .col-md-12 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </section><!-- #page-title end -->

        <!-- Blog grid 
=========================================-->
        <section id="blog" class="blog blog-grid-2 pt-0">
            <div class="container">
                <div class="row">
                    <?php
                    if (is_array($fetchDataGallery)) {
                        $sn = 1;
                        foreach ($fetchDataGallery as $data) {

                            $gallery_name_url = $data['gallery_name'];
                            $gallery_id_url = $data['gallery_id'];

                            $seo_name = cleanTurkishCharacters($gallery_name_url);

                            // SEO uyumlu URL'yi oluştur
                            $url = "/$seo_name" . "/$gallery_id_url";

                    ?>
                            <!-- Blog Entry #1 -->
                            <div class="col-sm-6 col-md-6 col-lg-4 blog-entry filter-chair">
                                <div class="entry--img">
                                    <img src="./ozkaderautomotivepanel/gallery_photos/<?php echo $data['gallery_foto'] ?>"
                                        alt="<?php echo $data['gallery_name'] ?>" />
                                </div>
                            </div>

                    <?php
                            $sn++;
                        }
                    } else {
                        echo $fetchDataGallery;
                    }
                    ?>
                    <!-- .blog-entry end -->
                    <!-- Blog Entry #1 -->

                    <!-- .blog-entry end -->
                    <!-- Blog Entry #1 -->

                    <!-- .blog-entry end -->
                    <!-- Blog Entry #1 -->

                    <!-- .blog-entry end -->
                    <!-- Blog Entry #1 -->

                    <!-- .blog-entry end -->
                    <!-- Blog Entry #1 -->

                    <!-- .blog-entry end -->
                </div>
            </div>
            <!-- .container end -->
        </section>
        <!-- #blog end -->



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