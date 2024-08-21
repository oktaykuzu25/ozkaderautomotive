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
                        <span>&copy; 2024 Özkader Otomotiv Tüm Hakları Saklıdır </span><a
                            href="mailto:treebsoftware@gmail.com">| Treeb</a>
                    </div>
                    <!-- .footer-copyright end -->
                </div>
                <!-- .col-lg-5ths end -->
                <div class="col-sm-12 col-md-6 col-lg-5ths text-center-xs widget--contact-info">
                    <div class="widget--content">
                        <ul class="list-unstyled">
                            <li><a href="https://maps.app.goo.gl/EAknrr9NrdAvmCU36"><?php echo $fetchDataContact[0]['contact_address']; ?></a>
                            </li>
                     
                            </li>
                            <li><a href="mailto:ozkaderoto42@hotmail.com"> <?php echo $fetchDataContact[0]['contact_email']; ?> </a> </li>
                            <li><a href="tel:05387027010"><?php echo $fetchDataContact[0]['contact_phone_number']; ?></a></li>
                        </ul>
                    </div>
                </div>
                <!-- .col-lg-5ths end -->
                <div class="col-sm-12 col-md-6 col-lg-5ths text-center-xs widget--links">
                    <div class="widget--content">
                        <ul class="list-unstyled">
                            <li><a href="about.php">Hakkımızda</a></li>
                            <li><a href="privacy-policy.php">Gizlilik Politikası</a></li>
                            <li><a href="terms-conditions.php">Şartlar Ve Koşullar</a></li>
                            <li><a href="contact">İletişim</a></li>
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
                            <a class="phone" href="tel:<?php echo $fetchDataContact[0]['contact_phone_number']; ?>">
                                <i class="fa fa-phone"></i>
                            </a>
                            <a class="envelope" href="<?php echo $fetchDataContact[0]['contact_email']; ?>">
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