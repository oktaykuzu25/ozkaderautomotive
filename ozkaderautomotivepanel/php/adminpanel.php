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

// VERITABANINA MULK EKLEME KODLARI
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

// SUBE LISTESINE VERI CEKME KODLARI
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
