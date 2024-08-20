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

$tableNameUpperCategory = "upper_category";
$columnsUpperCategory = ['upper_category_id', 'upper_category_name', 'upper_category_photo', 'upper_category_publicy'];

$tableNameLowerCategory = "lower_category";
$columnsLowerCategory = ['lower_category_id', 'lower_category_name', 'lower_category_publicy', 'upper_category_id'];

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
                $msg = "Markalar Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

$fetchDataUpperCategoryLimitThree = fetch_data_upper_category_limit_three($db, $tableNameUpperCategory, $columnsUpperCategory);
function fetch_data_upper_category_limit_three($db, $tableName, $columns)
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
        $query .= " ORDER BY upper_category_id LIMIT 3";
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


$fetchDataUpperCategoryLimitFive = fetch_data_upper_category_limit_five($db, $tableNameUpperCategory, $columnsUpperCategory);
function fetch_data_upper_category_limit_five($db, $tableName, $columns)
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
        $query .= " ORDER BY upper_category_id LIMIT 5";
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

function fetch_data_lower_category_limit_five($db, $tableName, $columns, $categoryId)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } elseif (empty($categoryId)) {
        $msg = "Category ID is required";
    } else {
        $columnName = implode(", ", $columns);

        $query = "SELECT " . $columnName . " FROM " . $tableName;
        $query .= " WHERE upper_category_id = ?"; 
        $query .= " ORDER BY upper_category_id LIMIT 3";

        $stmt = $db->prepare($query);
        $stmt->bind_param("i", $categoryId);
        $stmt->execute();
        $result = $stmt->get_result();

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
            $msg = "Query error: " . $stmt->error;
        }

        $stmt->close();
    }

    return $msg;
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

function fetch_data_lower_category($db, $tableName, $columns, $categoryId)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } elseif (empty($categoryId)) {
        $msg = "Category ID is required";
    } else {
        $columnName = implode(", ", $columns);

        $query = "SELECT " . $columnName . " FROM " . $tableName;
        $query .= " WHERE upper_category_id = ?"; 
        $query .= " ORDER BY upper_category_id";

        $stmt = $db->prepare($query);
        $stmt->bind_param("i", $categoryId);
        $stmt->execute();
        $result = $stmt->get_result();

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
            $msg = "Query error: " . $stmt->error;
        }

        $stmt->close();
    }

    return $msg;
}
