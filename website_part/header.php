<header id="navbar-spy" class="header header-1 header-8 header-light">
    <nav id="primary-menu" class="navbar navbar-expand-lg navbar-light logo-centered">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img class="logo logo-light" src="assets/images/logo/logo-dark.png" style="width: 106px; height:auto" alt="logo">
                <img class="logo logo-dark" src="assets/images/logo/logo-dark.png" style="width: 106px; height:auto" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse justify-content-between" id="navbarContent">
                <!-- Module Menu -->
                <div class="module-container">
                    <div class="module module-lang module-dropdown pull-left">
                        <div class="module-icon">
                            <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                                TR <i class="fa fa-caret-down"></i>
                            </button>
                        </div>
                        <div class="module-dropdown-menu module-content">
                            <a class="dropdown-item" href="#">ENG</a>
                            <a class="dropdown-item" href="#">RU</a>
                            <a class="dropdown-item" href="#">FR</a>
                            <a class="dropdown-item" href="#">AR</a>
                        </div>
                    </div>
                    <div class="module module-dropdown module-currency pull-left">
                        <div class="module-icon dropdown">
                            <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                                TL <i class="fa fa-caret-down"></i>
                            </button>
                        </div>
                        <div class="module-dropdown-menu module-content">
                            <a class="dropdown-item" href="#">EUR</a>
                            <a class="dropdown-item" href="#">USD</a>
                            <a class="dropdown-item" href="#">CAD</a>
                            <a class="dropdown-item" href="#">pound</a>
                        </div>
                    </div>
                    <div class="vertical-divider pull-left mr-30"></div>

                </div>
                <ul class="navbar-nav mr-auto ml-auto">
                    <!-- home Menu -->
                    <li>
                        <a href="index.php" class="menu-item">Anasayfa</a>
                    </li><!-- li end -->

                    <li>
                        <a href="about.php" class="menu-item">Hakkımızda</a>
                    </li><!-- li end -->

                    <li>
                        <a href="brand.php" class="menu-item">Markalar</a>
                    </li><!-- li end -->


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
                                                                            href="categories.php?<?php echo $lower_category_url; ?>"><?php echo $lower_category_name; ?></a>
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

                    <li>
                        <a href="gallery.php" class="menu-item">Galeri</a>
                    </li><!-- li end -->

                    <li>
                        <a href="contact.php" class="menu-item">İletişim</a>
                    </li><!-- li end -->
                </ul>


                <div class="module-container">
                    <div class="vertical-divider pull-left mr-30"></div>
                    <!-- Module Search -->
                    <div class="module module-search module-search-left pull-left">
                        <div class="module-icon search-icon">
                            <i class="lnr lnr-magnifier"></i>
                            <span class="title">Arama</span>
                        </div>
                        <div class="module-content module--search-box">
                            <form class="form-search">
                                <input type="text" class="form-control" placeholder="Ürün Ara">
                                <button type="submit"><span class="fa fa-arrow-right"></span></button>
                            </form><!-- .form-search end -->
                        </div>
                    </div><!-- .module-search end -->
                    <!-- .module-cart end -->
                </div>
            </div>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</header>