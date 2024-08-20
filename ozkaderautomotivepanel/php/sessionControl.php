
<?php if (!isset($_SESSION['personnel_id'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: signin.php');
}

if (isset($_GET['logout'])) {
    unset($_SESSION['personnel_id']);
    unset($_SESSION['branch_id']);
    unset($_SESSION['personnel_name']);
    unset($_SESSION['personnel_surname']);
    unset($_SESSION['personnel_role']);
    unset($_SESSION['personnel_gmail']);
    unset($_SESSION['personnel_phone']);
    unset($_SESSION['personnel_job']);

    header("location: signin.php");
}



?>