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
    <title>İletişim | Özkader Otomotiv</title>
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
                                    <h1>Her Zaman Yanınızdayız,<br> Bize Ulaşın</h1>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <ol class="breadcrumb breadcrumb-bottom">
                                <li><a href="index.php">Anasayfa</a></li>
                                <li class="active">İletişim</li>
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

        <!-- contact #1
=========================================-->
        <section id="contact1" class="contact contact-1 pt-50 pb-110">
            <div class="container">
                <div class="row">
                    <!-- contact panel #1 -->
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <div class="contact-panel">
                            <div class="contact--icon">B</div>
                            <div class="contact--content">
                                <h3>Bizi Arayin!</h3>
                                <ul class="list-unstyled mb-0">
                                    <li><a href="tel:05387027010">Telefon Numara: <?php echo $fetchDataContact[0]['contact_phone_number']; ?></a></li>
                                </ul>
                            </div>
                            <!-- .contact-content end -->
                        </div>
                    </div>
                    <!-- .contact-panel end -->
                    <!-- contact panel #2 -->
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <div class="contact-panel">
                            <div class="contact--icon">Z</div>
                            <div class="contact--content">
                                <h3>Ziyaret Edin!</h3>
                                <ul class="list-unstyled mb-0">
                                    <li><?php echo $fetchDataContact[0]['contact_address']; ?></li>
                                
                                </ul>
                            </div>
                            <!-- .contact-content end -->
                        </div>
                    </div>
                    <!-- .contact-panel end -->
                    <!-- contact panel #3 -->
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <div class="contact-panel">
                            <div class="contact--icon">E</div>
                            <div class="contact--content">
                                <h3>Email</h3>
                                <ul class="list-unstyled mb-0">
                                    <li><a href="mailto:ozkaderoto42@hotmail.com"><?php echo $fetchDataContact[0]['contact_email']; ?><</a></li>
                                </ul>
                            </div>
                            <!-- .contact-content end -->
                        </div>
                    </div>
                    <!-- .contact-panel end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- #contact #1 end -->


        <!-- google-map
============================================= -->
        <section id="google-map" class="google-map pb-0 pt-0">
            <div class="container-fluid pr-0 pl-0">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 pr-0 pl-0">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3146.5497849757994!2d32.520127075097626!3d37.94094697194394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14d08e3a64604945%3A0xb7d1d7155d948a!2s%C3%96ZKADER%20OTOMOT%C4%B0V%20aksesuar%20ve%20yedek%20par%C3%A7a!5e0!3m2!1str!2str!4v1724071637656!5m2!1str!2str"
                            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>
        <!-- #google-map end -->

        <!-- contact #2
============================================= -->
        <section id="contact2" class="contact contact-2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                        <div class="heading heading-2 mb-40 text--center">
                            <h2 class="heading--title">Bizimle İletişime Geçin</h2>
                            <p class="heading--desc italic">Her türlü soru, öneri veya talepleriniz için aşağıdaki formu
                                doldurarak bize ulaşabilirsiniz. Ekibimiz en kısa sürede size geri dönüş yapacaktır.
                            </p>
                        </div>
                    </div><!-- .col-md-6 end -->
                </div><!-- .row end -->
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <form method="post" action="assets/php/contact.php" class="contactForm mb-0">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" placeholder="Adınızı girin">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" placeholder="E-postanız">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="subject" placeholder="Konu">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group mb-80">
                                        <textarea class="form-control" id="message" rows="2"
                                            placeholder="Mesajınızı buraya yazın"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 text--center">
                                    <button type="submit" class="btn btn--primary btn--rounded">GÖNDER</button>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div id="contactResult" class="contact-result"></div>
                                </div>
                            </div>
                            <!-- .row end -->
                        </form>
                    </div>
                    <!-- .col-lg-12 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- #contact2 end -->


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