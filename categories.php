<?php
include_once "ozkaderautomotivepanel/php/main.php";
$url = $_SERVER['REQUEST_URI'];

$parts = explode('/', trim($url, '/'));

$lowerCategoryId = intval(end($parts));

if ($lowerCategoryId > 0) {
    $products = fetch_data_product_with_categories($db, $tableNameProduct, $columnsProduct, $lowerCategoryId);
    $product_count = is_array($products) ? count($products) : 0;

} else {
    $products = fetch_data_product($db, $tableNameProduct, $columnsProduct);
    $product_count = is_array($products) ? count($products) : 0;
}
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
    <title>Kategoriler | Özkader Otomotiv</title>
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

        <!-- categorey #10
============================================= -->
        <section id="categorey10" class="category category-3 category-6 category-8 pt-70 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-3">
                        <div class="sidebar cat-sidebar">

                            <!-- Categories
    ============================= -->
                            <div class="widget widget-categories2">
                                <div class="widget--title">
                                    <h3>Kategoriler</h3>
                                </div>
                                <div class="widget--content">
                                    <ul class="main--list list-unstyled mb-0">

                                        <?php
                                        if (is_array($fetchDataUpperCategory)) {
                                            foreach ($fetchDataUpperCategory as $data) {
                                                $upper_category_name_url = $data['upper_category_name'];
                                                $upper_category_id_url = $data['upper_category_id'];

                                                $fetchDataLowerCategory = fetch_data_lower_category($db, $tableNameLowerCategory, $columnsLowerCategory, $upper_category_id_url);
                                                $lower_category_count = is_array($fetchDataLowerCategory) ? count($fetchDataLowerCategory) : 0;

                                                $seo_name = cleanTurkishCharacters($upper_category_name_url);
                                                $url = "/$seo_name" . "/$upper_category_id_url";
                                        ?>
                                        <li>
                                            <a href="#"><?php echo $data['upper_category_name'] ?>
                                                <span>(<?php echo $lower_category_count ?>)</span></a>
                                            <ul class="inner--list list-unstyled mb-0">
                                                <?php
                                                        if (is_array($fetchDataLowerCategory)) {
                                                            foreach ($fetchDataLowerCategory as $lowerCategory) {
                                                                $lower_category_name = $lowerCategory['lower_category_name']; // Alt kategori adı
                                                                $lower_category_id = $lowerCategory['lower_category_id'];   // Alt kategori ID'si

                                                                $lower_category_seo_name = cleanTurkishCharacters($lower_category_name);
                                                                $lower_category_url = "/$seo_name/$lower_category_seo_name/$lower_category_id";
                                                        ?>
                                                <li><a
                                                        href="categories.php?<?php echo $lower_category_url ?>"><?php echo $lowerCategory['lower_category_name'] ?><span></span></a>
                                                </li>
                                                <?php
                                                            }
                                                        } else {
                                                            // Alt kategori bulunamadığında
                                                            echo "<li>Alt Kategoriler Bulunamadı!</li>";
                                                        }
                                                        ?>
                                            </ul>
                                        </li>

                                        <?php
                                            }
                                        } else {
                                            echo $fetchDataUpperCategory;
                                        }
                                        ?>

                                    </ul>
                                </div>
                            </div> <!-- .widget-categories end -->
                        </div>
                    </div>
                    <!-- .col-lg-3 end -->
                    <div class="col-sm-12 col-md-12 col-lg-9">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 category-options">
                                <div class="category-num pull-left pull-none-xs">
                                    <h2><span><?php echo $product_count ?></span>Ürün </h2>
                                </div>
                                <!-- .category-num end -->
                                <div class="category-select pull-right text-right text-left-sm pull-none-xs">
                                    <ul class="list-unstyled mb-0">
                                        <li class="option sort--options">
                                            <span class="option--title">Markalar:</span>
                                            <div class="select-form">
                                                <i class="fa fa-caret-down"></i>
                                                <select>
                                                    <option selected="">Seçiniz</option>
                                                    <?php
                                                    if (is_array($fetchDataBrand)) {
                                                        $sn = 1;
                                                        foreach ($fetchDataBrand as $data) {
                                                    ?>
                                                    <option><?php echo $data['brand_name'] ?></option>
                                                    <?php
                                                            $sn++;
                                                        }
                                                    } else {
                                                        echo $fetchDataBrand;
                                                    } ?>
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- .category-options end -->
                        </div>
                        <!-- .row end -->

                        <div class="row mb-60">
                            <?php
                            if (is_array($products)) {
                                foreach ($products as $product) {
                                    $upper_category_id_for_product = $product['upper_category_id'];
                                    $lower_category_id_for_product = $product['lower_category_id'];
                                    $product_name_for_url = $product['product_name'];
                                    $product_id_for_url = $product['product_id'];
                                    $fetchDataUpperCategoryForProduct = fetch_data_upper_category_for_product($db, $tableNameUpperCategory, $columnsUpperCategory, $upper_category_id_for_product);
                                    $fetchDataLowerCategoryForProduct = fetch_data_lower_category_for_product($db, $tableNameLowerCategory, $columnsLowerCategory, $lower_category_id_for_product);
                                    $upper_category_name = $fetchDataUpperCategoryForProduct['upper_category_name'];
                                    $lower_category_name = $fetchDataLowerCategoryForProduct['lower_category_name'];

                                    $upper_category_name = cleanTurkishCharacters($upper_category_name);
                                    $lower_category_name = cleanTurkishCharacters($lower_category_name);
                                    $product_name_for_url = cleanTurkishCharacters($product_name_for_url);

                                    $url = "/$upper_category_name" . "/$lower_category_name" . "/$product_name_for_url" . "/$product_id_for_url";
                                    echo '
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="category-item">
                                    <div class="category--img">
                                        <img src="ozkaderautomotivepanel/' . $product['product_photo'] . '" alt="category" />
                                    </div>
                                    <div class="category--content">
                                        <div class="category--title">
                                            <h3><a href="product-details.php?' . $url . '">' . $product['product_name'] . '</a></h3>
                                        </div>
                                        <div class="category--price">
                                            <span>' . $product['product_code'] . '</span>
                                        </div>
                                    </div>
                                    <div class="category--hover">
                                        <div class="category--action">
                                            <a href="product-details.php?' . $url . '" class="btn btn--primary btn--rounded"><i class="icon-bag"></i>Incele</a>
                                            <div class="category--action-content">
                                                <div class="category--hover-info">
                                                    <div class="category--title">
                                                        <h3><a href="product-details.php?' . $url . '">' . $product['product_name'] . '</a></h3>
                                                    </div>
                                                    <div class="category--price">
                                                        <span>' . $product['product_code'] . '</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                                }
                            } else {
                                echo '<p>' . $products . '</p>';
                            }
                            ?>

                        </div>
                        <!-- .row end -->
                    </div>
                    <!-- .col-lg-9 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- #categorey end -->

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