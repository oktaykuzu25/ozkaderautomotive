<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

$errors = array();

session_start();

include_once('errors.php');
include_once('dbconnect.php');



function validate($value)
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}

function splitByComma($sentence)
{
    $words = preg_split('/\s*,\s*/', $sentence, -1, PREG_SPLIT_NO_EMPTY);
    return $words;
}

function cleanTurkishCharacters($text)
{
    $turkishCharacters = array('ç', 'ğ', 'ı', 'i', 'ö', 'ş', 'ü', 'Ç', 'Ğ', 'İ', 'Ö', 'Ş', 'Ü', ' ', "'");
    $englishCharacters = array('c', 'g', 'i', 'i', 'o', 's', 'u', 'C', 'G', 'I', 'O', 'S', 'U', '-', '');

    $cleanedText = str_replace($turkishCharacters, $englishCharacters, $text);
    $cleanedText = preg_replace('/[^A-Za-z0-9\-]/', '', $cleanedText); // Remove special characters
    $cleanedText = strtolower($cleanedText); // Convert to lowercase

    return $cleanedText;
}

function cleanPhoneNumber($phoneNumber)
{
    $cleanedNumber = str_replace(['(', ')', ' '], '', $phoneNumber);
    return $cleanedNumber;
}

$tableNameBrand = "brands";
$columnsBrand = ['brand_id', 'brand_name', 'brand_code', 'brand_logo', 'brand_publicy'];



$tableNameContact = "contact";
$columnsContact = ['contact_id', 'contact_phone_number', 'contact_email', 'contact_instagram', 'contact_city', 'contact_district', 'contact_address', 'contact_address_url', 'contact_address_url_iframe'];

$tableNameUpperCategory = "upper_category";
$columnsUpperCategory = ['upper_category_id', 'upper_category_name', 'upper_category_photo', 'upper_category_publicy'];


$tableNameİnstagram = "socialmedia";
$columnsİnstagram = ['instagram_id', 'instagram_name', 'instagram_url', 'instagram_foto', 'instagram_publicy'];

$tableNameGallery = "gallery";
$columnsGallery = ['gallery_id', 'gallery_name', 'gallery_foto'];

$tableNameLowerCategory = "lower_category";
$columnsLowerCategory = ['lower_category_id', 'lower_category_name', 'lower_category_publicy', 'upper_category_id'];

$tableNameProduct = "product";
$columnsProduct = ['product_id', 'upper_category_id', 'lower_category_id', 'brand_id', 'product_name', 'product_code', 'product_manufacturer_code', 'product_photo', 'product_publicy', 'product_stock_status', 'product_slider_photos', 'product_slider_status', 'product_featured_status', 'product_currentDateTime'];


/* Marka Kodlari  */
if (isset($_POST['brand-add'])) {
    $brand_name = mysqli_real_escape_string($db, $_POST['brand_name']);
    $brand_code = mysqli_real_escape_string($db, $_POST['brand_code']);
    $brand_publicy = isset($_POST['brand_publicy']) ? 1 : 0;

    $targetDirectory = "brand_photos/";

    $brand_logo = $_FILES['brand_logo']['name'];

    $brand_logo_brand = $targetDirectory . basename($_FILES['brand_logo']['name']);

    $brand_logo_brand_img = $brand_logo_brand;

    $brand_name_query = "SELECT * FROM  brands WHERE `brand_name`='$brand_name'";
    $resultBrandNameQuery = mysqli_query($db, $brand_name_query);
    $resultAlreadyControl = mysqli_fetch_assoc($resultBrandNameQuery);

    if ($resultAlreadyControl) {
        if ($resultAlreadyControl['brand_name'] === $brand_name) {
            array_push($errors, "This brand is already available in the system!");
        }
    }


    if (count($errors) == 0) {

        $query = "INSERT INTO brands (brand_name,brand_code,brand_logo,brand_publicy) 
        VALUES ('$brand_name','$brand_code','$brand_logo_brand_img','$brand_publicy')";
        $post_data_query = mysqli_query($db, $query);

        if ($post_data_query) {
            header('location: app-brand-list.php');
        } else {
            $errors[] = "Work could not be loaded: " . mysqli_error($db);
        }
    }
}

$fetchDataBrand = fetch_data_brand($db, $tableNameBrand, $columnsBrand);
function fetch_data_brand($db, $tableName, $columns)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName";
        $query .= " ORDER BY brand_id";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "Marka Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

if (isset($_GET['deleteBrand'])) {
    $id = validate($_GET['deleteBrand']);
    $condition = ['brand_id' => $id];
    $deleteMsg = delete_data_brand($db, $tableNameBrand, $condition);
    header("location:app-brand-list.php");
}

function delete_data_brand($db, $tableName, $condition)
{
    $conditionData = '';
    $i = 0;
    foreach ($condition as $index => $data) {
        $and = ($i > 0) ? ' AND ' : '';
        $conditionData .= $and . $index . " = " . "'" . $data . "'";
        $i++;
    }

    $query = "DELETE FROM " . $tableName . " WHERE " . $conditionData;
    $result = $db->query($query);
    if ($result) {
        $msg = "data was deleted successfully";
    } else {
        $msg = $db->error;
    }
    return $msg;
}

if (isset($_SERVER['REQUEST_URI'])) {
    $url_segments = explode('/', $_SERVER['REQUEST_URI']);
    $brand_id = end($url_segments);
    $id = validate($brand_id);
    $fetchDataBrandDetails = fetch_data_brand_detail($db, $tableNameBrand, $columnsBrand, $id);
}
function fetch_data_brand_detail($db, $tableName, $columns, $id)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName";
        $query .= " WHERE brand_id = '$id'";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

if (isset($_POST['brand-update'])) {
    $brand_id = mysqli_real_escape_string($db, $_POST['brand_id']);
    $brand_name = mysqli_real_escape_string($db, $_POST['brand_name']);
    $brand_code = mysqli_real_escape_string($db, $_POST['brand_code']);
    $brand_publicy = isset($_POST['brand_publicy']) ? 1 : 0;

    $select_query = "SELECT * FROM brands WHERE brand_id = '$brand_id'";
    $result = mysqli_query($db, $select_query);
    $row = mysqli_fetch_assoc($result);

    $brand_logo_brand_img = $row['brand_logo'];

    $targetDirectory = "brand_photos/";

    if (!empty($_FILES['brand_logo']['name'])) {
        $brand_logo = $_FILES['brand_logo']['name'];
        $brand_logo_brand_img = $targetDirectory . basename($brand_logo);
    } else {
        $brand_logo_brand_img = $row['brand_logo'];
    }

    $update_query = "UPDATE brands SET 
    brand_name = '$brand_name',
    brand_code = '$brand_code',
    brand_publicy = '$brand_publicy',
    brand_logo = '$brand_logo_brand_img'        
    WHERE brand_id = '$brand_id'";

    $update_result = mysqli_query($db, $update_query);

    if ($update_result) {
        header('location: app-brand-list.php');
    } else {
        $errors[] = "Work could not be updated: " . mysqli_error($db);
    }
}




if (isset($_POST['brand-update'])) {
    $brand_id = mysqli_real_escape_string($db, $_POST['brand_id']);
    $brand_name = mysqli_real_escape_string($db, $_POST['brand_name']);
    $brand_code = mysqli_real_escape_string($db, $_POST['brand_code']);
    $brand_publicy = isset($_POST['brand_publicy']) ? 1 : 0;

    $select_query = "SELECT * FROM brands WHERE brand_id = '$brand_id'";
    $result = mysqli_query($db, $select_query);
    $row = mysqli_fetch_assoc($result);

    $brand_logo_brand_img = $row['brand_logo'];

    $targetDirectory = "brand_photos/";

    if (!empty($_FILES['brand_logo']['name'])) {
        $brand_logo = $_FILES['brand_logo']['name'];
        $brand_logo_brand_img = $targetDirectory . basename($brand_logo);
    } else {
        $brand_logo_brand_img = $row['brand_logo'];
    }

    $update_query = "UPDATE brands SET 
    brand_name = '$brand_name',
    brand_code = '$brand_code',
    brand_publicy = '$brand_publicy',
    brand_logo = '$brand_logo_brand_img'        
    WHERE brand_id = '$brand_id'";

    $update_result = mysqli_query($db, $update_query);

    if ($update_result) {
        header('location: app-brand-list.php');
    } else {
        $errors[] = "Work could not be updated: " . mysqli_error($db);
    }
}


/* Ust Kategori Kodlari  */
if (isset($_POST['upper-category-add'])) {
    $upper_category_name = mysqli_real_escape_string($db, $_POST['upper_category_name']);
    $upper_category_publicy = isset($_POST['upper_category_publicy']) ? 1 : 0;

    $targetDirectory = "upper-category_photos/";

    $upper_category_photo = $_FILES['upper_category_photo']['name'];

    $upper_category_photo_category = $targetDirectory . basename($_FILES['upper_category_photo']['name']);

    $upper_category_photo_category_img = $upper_category_photo_category;

    $upper_category_name_query = "SELECT * FROM  upper_category WHERE `upper_category_name`='$upper_category_name'";
    $resultUpperCategoryNameQuery = mysqli_query($db, $upper_category_name_query);
    $resultAlreadyControl = mysqli_fetch_assoc($resultUpperCategoryNameQuery);

    if ($resultAlreadyControl) {
        if ($resultAlreadyControl['upper_category_name'] === $upper_category_name) {
            array_push($errors, "This upper category is already available in the system!");
        }
    }

    if (count($errors) == 0) {

        $query = "INSERT INTO upper_category (upper_category_name,upper_category_photo,upper_category_publicy) 
        VALUES ('$upper_category_name','$upper_category_photo_category_img','$upper_category_publicy')";
        $post_data_query = mysqli_query($db, $query);

        if ($post_data_query) {
            header('location: app-upper-category-list.php');
        } else {
            $errors[] = "Work could not be loaded: " . mysqli_error($db);
        }
    }
}



$fetchDataUpperCategory = fetch_data_upper_category($db, $tableNameUpperCategory, $columnsUpperCategory);
function fetch_data_upper_category($db, $tableName, $columns)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName";
        $query .= " ORDER BY upper_category_id";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "Ust Kategori Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

if (isset($_GET['deleteUpperCategory'])) {
    $id = validate($_GET['deleteUpperCategory']);
    $condition = ['upper_category_id' => $id];
    $deleteMsg = delete_data_upper_category($db, $tableNameUpperCategory, $condition);
    header("location:app-upper-category-list.php");
}

function delete_data_upper_category($db, $tableName, $condition)
{
    $conditionData = '';
    $i = 0;
    foreach ($condition as $index => $data) {
        $and = ($i > 0) ? ' AND ' : '';
        $conditionData .= $and . $index . " = " . "'" . $data . "'";
        $i++;
    }

    $query = "DELETE FROM " . $tableName . " WHERE " . $conditionData;
    $result = $db->query($query);
    if ($result) {
        $msg = "data was deleted successfully";
    } else {
        $msg = $db->error;
    }
    return $msg;
}

if (isset($_SERVER['REQUEST_URI'])) {
    $url_segments = explode('/', $_SERVER['REQUEST_URI']);
    $upper_category_id = end($url_segments);
    $id = validate($upper_category_id);
    $fetchDataUpperCategoryDetails = fetch_data_upper_category_detail($db, $tableNameUpperCategory, $columnsUpperCategory, $id);
}
function fetch_data_upper_category_detail($db, $tableName, $columns, $id)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName";
        $query .= " WHERE upper_category_id = '$id'";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

if (isset($_POST['upper-category-update'])) {
    $upper_category_id = mysqli_real_escape_string($db, $_POST['upper_category_id']);
    $upper_category_name = mysqli_real_escape_string($db, $_POST['upper_category_name']);
    $upper_category_publicy = isset($_POST['upper_category_publicy']) ? 1 : 0;

    $select_query = "SELECT * FROM upper_category WHERE upper_category_id = '$upper_category_id'";
    $result = mysqli_query($db, $select_query);
    $row = mysqli_fetch_assoc($result);

    $upper_category_photo_category_img = $row['upper_category_photo'];

    $targetDirectory = "upper-category_photos/";

    if (!empty($_FILES['upper_category_photo']['name'])) {
        $upper_category_photo = $_FILES['upper_category_photo']['name'];
        $upper_category_photo_category_img = $targetDirectory . basename($upper_category_photo);
    } else {
        $upper_category_photo_category_img = $row['upper_category_photo'];
    }

    $update_query = "UPDATE upper_category SET 
    upper_category_name = '$upper_category_name',
    upper_category_publicy = '$upper_category_publicy',
    upper_category_photo = '$upper_category_photo_category_img'        
    WHERE upper_category_id = '$upper_category_id'";

    $update_result = mysqli_query($db, $update_query);

    if ($update_result) {
        header('location: app-upper-category-list.php');
    } else {
        $errors[] = "Work could not be updated: " . mysqli_error($db);
    }
}





/* Alt Kategori Kodlari  */
if (isset($_POST['lower-category-add'])) {
    $upper_category_id = mysqli_real_escape_string($db, $_POST['upper_category_id']);
    $lower_category_name = mysqli_real_escape_string($db, $_POST['lower_category_name']);
    $lower_category_publicy = isset($_POST['lower_category_publicy']) ? 1 : 0;

    $lower_category_name_query = "SELECT * FROM  lower_category WHERE `lower_category_name`='$lower_category_name'";
    $resultLowerCategoryNameQuery = mysqli_query($db, $lower_category_name_query);
    $resultAlreadyControl = mysqli_fetch_assoc($resultLowerCategoryNameQuery);

    if ($resultAlreadyControl) {
        if ($resultAlreadyControl['lower_category_name'] === $lower_category_name) {
            array_push($errors, "This lower category is already available in the system!");
        }
    }

    if (count($errors) == 0) {
        $query = "INSERT INTO lower_category (upper_category_id,lower_category_name,lower_category_publicy) 
        VALUES ('$upper_category_id','$lower_category_name','$lower_category_publicy')";
        $post_data_query = mysqli_query($db, $query);

        if ($post_data_query) {
            header('location: app-lower-category-list.php');
        } else {
            $errors[] = "Work could not be loaded: " . mysqli_error($db);
        }
    }
}

$fetchDataLowerCategory = fetch_data_lower_category($db, $tableNameLowerCategory, $columnsLowerCategory);
function fetch_data_lower_category($db, $tableName, $columns)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName";
        $query .= " ORDER BY lower_category_id";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "Alt Kategori Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

if (isset($_GET['deleteLowerCategory'])) {
    $id = validate($_GET['deleteLowerCategory']);
    $condition = ['lower_category_id' => $id];
    $deleteMsg = delete_data_lower_category($db, $tableNameLowerCategory, $condition);
    header("location:app-lower-category-list.php");
}

function delete_data_lower_category($db, $tableName, $condition)
{
    $conditionData = '';
    $i = 0;
    foreach ($condition as $index => $data) {
        $and = ($i > 0) ? ' AND ' : '';
        $conditionData .= $and . $index . " = " . "'" . $data . "'";
        $i++;
    }

    $query = "DELETE FROM " . $tableName . " WHERE " . $conditionData;
    $result = $db->query($query);
    if ($result) {
        $msg = "data was deleted successfully";
    } else {
        $msg = $db->error;
    }
    return $msg;
}

if (isset($_SERVER['REQUEST_URI'])) {
    $url_segments = explode('/', $_SERVER['REQUEST_URI']);
    $lower_category_id = end($url_segments);
    $id = validate($lower_category_id);
    $fetchDataLowerCategoryDetails = fetch_data_lower_category_detail($db, $tableNameLowerCategory, $columnsLowerCategory, $id);
}
function fetch_data_lower_category_detail($db, $tableName, $columns, $id)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName";
        $query .= " WHERE lower_category_id = '$id'";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}


if (isset($_POST['lower-category-update'])) {
    $lower_category_id = mysqli_real_escape_string($db, $_POST['lower_category_id']);
    $upper_category_id = mysqli_real_escape_string($db, $_POST['upper_category_id']);
    $lower_category_name = mysqli_real_escape_string($db, $_POST['lower_category_name']);
    $lower_category_publicy = isset($_POST['lower_category_publicy']) ? 1 : 0;

    $select_query = "SELECT * FROM lower_category WHERE lower_category_id = '$lower_category_id'";
    $result = mysqli_query($db, $select_query);
    $row = mysqli_fetch_assoc($result);

    $update_query = "UPDATE lower_category SET 
    lower_category_name = '$lower_category_name',
    lower_category_publicy = '$lower_category_publicy',
    upper_category_id = '$upper_category_id'
    WHERE lower_category_id = '$lower_category_id'";

    $update_result = mysqli_query($db, $update_query);

    if ($update_result) {
        header('location: app-lower-category-list.php');
    } else {
        $errors[] = "Work could not be updated: " . mysqli_error($db);
    }
}

function fetch_data_upper_category_name($db, $tableName, $columns, $id)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName";
        $query .= " WHERE upper_category_id = '$id'";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}








/* Urun Kodlari  */
if (isset($_POST['product-add'])) {
    $upper_category_id = mysqli_real_escape_string($db, $_POST['upper_category_id']);
    $lower_category_id = mysqli_real_escape_string($db, $_POST['lower_category_id']);
    $brand_id = mysqli_real_escape_string($db, $_POST['brand_id']);
    $product_name = mysqli_real_escape_string($db, $_POST['product_name']);
    $product_code = mysqli_real_escape_string($db, $_POST['product_code']);
    $product_manufacturer_code = mysqli_real_escape_string($db, $_POST['product_manufacturer_code']);
    $product_publicy = isset($_POST['product_publicy']) ? 1 : 0;
    $product_stock_status = isset($_POST['product_stock_status']) ? 1 : 0;
    $product_slider_status = isset($_POST['product_slider_status']) ? 1 : 0;
    $product_featured_status = isset($_POST['product_featured_status']) ? 1 : 0;

    $targetDirectory = "product_photos/";

    $product_photo = $_FILES['product_photo']['name'];
    $product_photo_normal = $targetDirectory . basename($_FILES['product_photo']['name']);
    $product_photo_normal_img = $product_photo_normal;

    $product_slider_photos = $_FILES['product_slider_photos']['name'];
    $product_slider_photos_normal = $targetDirectory . basename($_FILES['product_slider_photos']['name']);
    $product_slider_photos_normal_img = $product_slider_photos_normal;

    $product_name_query = "SELECT * FROM  product WHERE `product_name`='$product_name'";
    $resultProductNameQuery = mysqli_query($db, $product_name_query);
    $resultAlreadyControl = mysqli_fetch_assoc($resultProductNameQuery);

    date_default_timezone_set('Europe/Istanbul');
    setlocale(LC_TIME, 'tr_TR.utf8'); // Türkçe dil desteği için locale ayarı
    $gunler = array(
        'Pazar',
        'Pazartesi',
        'Salı',
        'Çarşamba',
        'Perşembe',
        'Cuma',
        'Cumartesi'
    );
    $aylar = array(
        'Ocak',
        'Şubat',
        'Mart',
        'Nisan',
        'Mayıs',
        'Haziran',
        'Temmuz',
        'Ağustos',
        'Eylül',
        'Ekim',
        'Kasım',
        'Aralık'
    );
    $gun = $gunler[date('w')];
    $ay = $aylar[date('n') - 1];
    $gunAyYil = date('d') . ' ' . $ay . ' ' . date('Y');
    $saatDakika = date('H:i');
    $currentDateTime = $gunAyYil . ' ' . $saatDakika;

    if ($resultAlreadyControl) {
        if ($resultAlreadyControl['product_name'] === $product_name) {
            array_push($errors, "This product is already available in the system!");
        }
    }

    if (count($errors) == 0) {

        $query = "INSERT INTO product (upper_category_id,lower_category_id,brand_id,product_name,product_code,product_manufacturer_code,product_photo,product_publicy,product_stock_status,product_slider_photos,product_slider_status,product_featured_status,product_currentDateTime) 
        VALUES ('$upper_category_id','$lower_category_id','$brand_id','$product_name','$product_code','$product_manufacturer_code','$product_photo_normal_img','$product_publicy','$product_stock_status','$product_slider_photos_normal_img','$product_slider_status','$product_featured_status','$currentDateTime')";
        $post_data_query = mysqli_query($db, $query);

        if ($post_data_query) {
            header('location: app-product-list.php');
        } else {
            $errors[] = "Work could not be loaded: " . mysqli_error($db);
        }
    }
}

/*
$fetchDataBrand = fetch_data_product($db, $tableNameBrand, $columnsBrand);
function fetch_data_product($db, $tableName, $columns)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName";
        $query .= " ORDER BY brand_id";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "Marka Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

if (isset($_GET['deleteBrand'])) {
    $id = validate($_GET['deleteBrand']);
    $condition = ['brand_id' => $id];
    $deleteMsg = delete_data_brand($db, $tableNameBrand, $condition);
    header("location:app-brand-list.php");
}

function delete_data_brand($db, $tableName, $condition)
{
    $conditionData = '';
    $i = 0;
    foreach ($condition as $index => $data) {
        $and = ($i > 0) ? ' AND ' : '';
        $conditionData .= $and . $index . " = " . "'" . $data . "'";
        $i++;
    }

    $query = "DELETE FROM " . $tableName . " WHERE " . $conditionData;
    $result = $db->query($query);
    if ($result) {
        $msg = "data was deleted successfully";
    } else {
        $msg = $db->error;
    }
    return $msg;
}

if (isset($_SERVER['REQUEST_URI'])) {
    $url_segments = explode('/', $_SERVER['REQUEST_URI']);
    $brand_id = end($url_segments);
    $id = validate($brand_id);
    $fetchDataBrandDetails = fetch_data_brand_detail($db, $tableNameBrand, $columnsBrand, $id);
}
function fetch_data_brand_detail($db, $tableName, $columns, $id)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName";
        $query .= " WHERE brand_id = '$id'";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

if (isset($_POST['brand-update'])) {
    $brand_id = mysqli_real_escape_string($db, $_POST['brand_id']);
    $brand_name = mysqli_real_escape_string($db, $_POST['brand_name']);
    $brand_code = mysqli_real_escape_string($db, $_POST['brand_code']);
    $brand_publicy = isset($_POST['brand_publicy']) ? 1 : 0;

    $select_query = "SELECT * FROM brands WHERE brand_id = '$brand_id'";
    $result = mysqli_query($db, $select_query);
    $row = mysqli_fetch_assoc($result);

    $brand_logo_brand_img = $row['brand_logo'];

    $targetDirectory = "brand_photos/";

    if (!empty($_FILES['brand_logo']['name'])) {
        $brand_logo = $_FILES['brand_logo']['name'];
        $brand_logo_brand_img = $targetDirectory . basename($brand_logo);
    } else {
        $brand_logo_brand_img = $row['brand_logo'];
    }

    $update_query = "UPDATE brands SET 
    brand_name = '$brand_name',
    brand_code = '$brand_code',
    brand_publicy = '$brand_publicy',
    brand_logo = '$brand_logo_brand_img'        
    WHERE brand_id = '$brand_id'";

    $update_result = mysqli_query($db, $update_query);

    if ($update_result) {
        header('location: app-brand-list.php');
    } else {
        $errors[] = "Work could not be updated: " . mysqli_error($db);
    }
}
    */


/* Sosyal Medya Kodları */
if (isset($_POST['instagram-add'])) {
    $instagram_url = mysqli_real_escape_string($db, $_POST['instagram_url']);
    $instagram_name = mysqli_real_escape_string($db, $_POST['instagram_name']);
    $instagram_publicy = isset($_POST['instagram_publicy']) ? 1 : 0;

    $targetDirectory = "socialmedia_photos/";

    $instagram_foto = $_FILES['instagram_foto']['name'];

    $instagram_foto_brand = $targetDirectory . basename($_FILES['instagram_foto']['name']);

    $instagram_foto_brand_img = $instagram_foto_brand;

    $instagram_name_query = "SELECT * FROM  socialmedia WHERE `instagram_name`='$instagram_name'";
    $resultİnstagramNameQuery = mysqli_query($db, $instagram_name_query);
    $resultAlreadyControl = mysqli_fetch_assoc($resultİnstagramNameQuery);

    if ($resultAlreadyControl) {
        if ($resultAlreadyControl['instagram_url'] === $instagram_url) {
            array_push($errors, "This brand is already available in the system!");
        }
    }


    if (count($errors) == 0) {

        $query = "INSERT INTO socialmedia (instagram_url,instagram_name,instagram_foto,instagram_publicy) 
        VALUES ('$instagram_url','$instagram_name','$instagram_foto_brand_img','$instagram_publicy')";
        $post_data_query = mysqli_query($db, $query);

        if ($post_data_query) {
            header('location: app-social-media-list.php');
        } else {
            $errors[] = "Work could not be loaded: " . mysqli_error($db);
        }
    }
}


/* Sosyal Medya Çekme */

$fetchDataİnstagram = fetch_data_instagram($db, $tableNameİnstagram, $columnsİnstagram);

function fetch_data_instagram($db, $tableName, $columns)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName";
        $query .= " ORDER BY instagram_id";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "Markalar Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

/* Sosyal Medya Silme Kodları */
if (isset($_GET['deleteinstagram'])) {
    $id = validate($_GET['deleteinstagram']);
    $condition = ['instagram_id' => $id];
    $deleteMsg = delete_data_instagram($db, $tableNameİnstagram, $condition);
    header("location:app-social-media-list.php");
}
function delete_data_instagram($db, $tableName, $condition)
{
    $conditionData = '';
    $i = 0;
    foreach ($condition as $index => $data) {
        $and = ($i > 0) ? ' AND ' : '';
        $conditionData .= $and . $index . " = " . "'" . $data . "'";
        $i++;
    }

    $query = "DELETE FROM " . $tableName . " WHERE " . $conditionData;
    $result = $db->query($query);
    if ($result) {
        $msg = "data was deleted successfully";
    } else {
        $msg = $db->error;
    }
    return $msg;
}



/* Sosyal Medya Silme Bitiş */
if (isset($_SERVER['REQUEST_URI'])) {
    $url_segments = explode('/', $_SERVER['REQUEST_URI']);
    $edit_instagram_id = end($url_segments);
    $id = validate($edit_instagram_id);
    $fetchDataEditİnstagramDetails = fetch_data_edit_instagram_detail($db, $tableNameİnstagram, $columnsİnstagram, $id);
}
function fetch_data_edit_instagram_detail($db, $tableName, $columns, $id)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName";
        $query .= " WHERE instagram_id = '$id'";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

if (isset($_POST['instagram-update'])) {
    $instagram_id = mysqli_real_escape_string($db, $_POST['instagram_id']);
    $instagram_url = mysqli_real_escape_string($db, $_POST['instagram_url']);
    $instagram_name = mysqli_real_escape_string($db, $_POST['instagram_name']);

    $instagram_publicy = isset($_POST['instagram_publicy']) ? 1 : 0;

    $select_query = "SELECT * FROM socialmedia WHERE instagram_id = '$instagram_id'";
    $result = mysqli_query($db, $select_query);
    $row = mysqli_fetch_assoc($result);

    $instagram_edit_photo_img = $row['instagram_foto'];

    $targetDirectory = "socialmedia_photos/";

    if (!empty($_FILES['socialmedia_photos']['name'])) {
        $instagram_foto = $_FILES['socialmedia_photos']['name'];
        $instagram_edit_foto_img = $targetDirectory . basename($instagram_foto);
    } else {
        $instagram_edit_foto_img = $row['socialmedia_photos'];
    }

    $update_query = "UPDATE socialmedia SET 
    instagram_url = '$instagram_url',
    instagram_name = '$instagram_name',
    instagram_publicy = '$instagram_publicy',
    instagram_foto = '$instagram_edit_photo_img'        
    WHERE instagram_id = '$instagram_id'";

    $update_result = mysqli_query($db, $update_query);

    if ($update_result) {
        header('location: app-social-media-list.php');
    } else {
        $errors[] = "Work could not be updated: " . mysqli_error($db);
    }
}




/* Galeri Fotosu Ekleme */
if (isset($_POST['gallery-add'])) {
    $gallery_name = mysqli_real_escape_string($db, $_POST['gallery_name']);

    $targetDirectory = "gallery_photos/";

    $gallery_foto = $_FILES['gallery_foto']['name'];

    $gallery_foto_brand = $targetDirectory . basename($_FILES['gallery_foto']['name']);

    $gallery_foto_brand_img = $gallery_foto_brand;



    if (count($errors) == 0) {

        $query = "INSERT INTO gallery (gallery_name, gallery_foto) 
        VALUES ('$gallery_name', '$gallery_foto')";
        $post_data_query = mysqli_query($db, $query);


        if ($post_data_query) {
            header('location: app-gallery-add.php');
        } else {
            $errors[] = "Work could not be loaded: " . mysqli_error($db);
        }
    }
}



/* Galeri Listesine Veri  Çekme */

$fetchDataGallery = fetch_data_gallery($db, $tableNameGallery, $columnsGallery);

function fetch_data_gallery($db, $tableName, $columns)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName";
        $query .= " ORDER BY gallery_id";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "Markalar Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}


/* Galeri Fotoğrafı Silme Kodları */

if (isset($_GET['deleteGallery'])) {
    $id = validate($_GET['deleteGallery']);
    $condition = ['gallery_id' => $id];
    $deleteMsg = delete_data_gallery($db, $tableNameGallery, $condition);
    header("location:app-gallery-list.php");
}

function delete_data_gallery($db, $tableName, $condition)
{
    $conditionData = '';
    $i = 0;
    foreach ($condition as $index => $data) {
        $and = ($i > 0) ? ' AND ' : '';
        $conditionData .= $and . $index . " = " . "'" . $data . "'";
        $i++;
    }

    $query = "DELETE FROM " . $tableName . " WHERE " . $conditionData;
    $result = $db->query($query);
    if ($result) {
        $msg = "data was deleted successfully";
    } else {
        $msg = $db->error;
    }
    return $msg;
}

if (isset($_SERVER['REQUEST_URI'])) {
    $url_segments = explode('/', $_SERVER['REQUEST_URI']);
    $gallery_id = end($url_segments);
    $id = validate($gallery_id);
    $fetchDataGalleryDetails = fetch_data_gallery_detail($db, $tableNameGallery, $columnsGallery, $id);
}
function fetch_data_gallery_detail($db, $tableName, $columns, $id)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName";
        $query .= " WHERE gallery_id = '$id'";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}




/* İletişim Çekme kodları  */

$fetchDataContact = fetch_data_contact($db, $tableNameContact, $columnsContact);

function fetch_data_contact($db, $tableName, $columns)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName";
        $query .= " ORDER BY contact_id";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "Markalar Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

if (isset($_SERVER['REQUEST_URI'])) {
    $url_segments = explode('/', $_SERVER['REQUEST_URI']);
    $contact_id = end($url_segments);
    $id = validate($contact_id);
    $fetchDatacontactUpdate = fetch_data_contact_update($db, $tableNameContact, $columnsContact, $id);
}
function fetch_data_contact_update($db, $tableName, $columns, $id)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName";
        $query .= " WHERE contact_id = '$id'";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}


if (isset($_POST['contact-update'])) {
    $contact_phone_number = mysqli_real_escape_string($db, $_POST['contact_phone_number']);
    $contact_email = mysqli_real_escape_string($db, $_POST['contact_email']);
    $contact_instagram = mysqli_real_escape_string($db, $_POST['contact_instagram']);
    $contact_city = mysqli_real_escape_string($db, $_POST['contact_city']);
    $contact_district = mysqli_real_escape_string($db, $_POST['contact_district']);
    $contact_address = mysqli_real_escape_string($db, $_POST['contact_address']);
    $contact_address_url = mysqli_real_escape_string($db, $_POST['contact_address_url']);
    $contact_address_url_iframe = mysqli_real_escape_string($db, $_POST['contact_address_url_iframe']);


    $contact_id = 1; // Örnek olarak 'contact_id'

    $update_query = "UPDATE contact SET 
        contact_phone_number = '$contact_phone_number',
        contact_email = '$contact_email',
        contact_instagram = '$contact_instagram',
        contact_city = '$contact_city',
        contact_district = '$contact_district',
        contact_address = '$contact_address',
        contact_address_url = '$contact_address_url',
        contact_address_url_iframe = '$contact_address_url_iframe'
        WHERE contact_id = '$contact_id'"; // WHERE şartı eklenmeli

    $update_result = mysqli_query($db, $update_query);

    if ($update_result) {
        header('location: app-contact.php');
    } else {
        $errors[] = "Work could not be updated: " . mysqli_error($db);
    }
}
