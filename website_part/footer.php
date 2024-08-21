<footer id="footerParallax" class="footer footer-2">
    <div class="container pr-40 pl-40">
        <div class="footer-widget">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-5ths widget--logo text-center-xs">
                    <div class="widget--content">
                        <div class="widget--logo-img">
                            <img src="assets/images/logo/logo-dark.png" style="width: 106px; height:auto" alt="logo">
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
                            <li><a
                                    href="<?php echo $fetchDataContact[0]['contact_address_url']; ?>"><?php echo $fetchDataContact[0]['contact_address'] . ' ' . $fetchDataContact[0]['contact_district'] . '/' . $fetchDataContact[0]['contact_city']  ?></a>
                            </li>
                            </li>
                            <li><a href="mailto:<?php echo $fetchDataContact[0]['contact_email']; ?>">
                                    <?php echo $fetchDataContact[0]['contact_email']; ?> </a> </li>
                            <li><a
                                    href="tel:<?php echo cleanPhoneNumber($fetchDataContact[0]['contact_phone_number']); ?>"><?php echo $fetchDataContact[0]['contact_phone_number']; ?></a>
                            </li>
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
                        <ul class="list-unstyled">
                            <?php
                            if (is_array($fetchDataProductLimitTwo)) {
                                foreach ($fetchDataProductLimitTwo as $data) {
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
                            <li><a href="<?php echo $url ?>"><?php echo $data['product_name'] ?></a></li>
                            <?php
                                }
                            } else {
                                echo $fetchDataProductLimitTwo;
                            }
                            ?>

                        </ul>
                    </div>
                </div>
                <!-- .col-lg-5ths end -->

                <div class="col-sm-12 col-md-6 col-lg-5ths  text-center-xs widget--social">
                    <div class="widget--content">
                        <div class="social--icons">
                            <span>Bize Ulaşın!</span>
                            <a class="phone"
                                href="tel:<?php echo cleanPhoneNumber($fetchDataContact[0]['contact_phone_number']); ?>">
                                <i class="fa fa-phone"></i>
                            </a>
                            <a class="envelope" href="<?php echo $fetchDataContact[0]['contact_email']; ?>">
                                <i class="fa fa-envelope"></i>
                            </a>
                            <a class="whatsapp"
                                href="https://wa.me/<?php echo cleanPhoneNumber($fetchDataContact[0]['contact_phone_number']); ?>"
                                rel="nofollow" target="_blank">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                            <a class="instagram" href="<?php echo $fetchDataContact[0]['contact_instagram']; ?>">
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