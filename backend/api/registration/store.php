<?php

include '../../registration.php';

// Get data
$name = $_POST['name'];
$gender = $_POST['gender'];
$birth_date = $_POST['birth_date'];
$birth_location = $_POST['birth_location'];
$address = $_POST['address'];
$student_number = $_POST['student_number'];
$junior_school = $_POST['junior_school'];
$report_file_name = $_FILES['report_file']['name'];
$report_file_tmp = $_FILES['report_file']['tmp_name'];

$report_file_name = date('dmYHis').$report_file_name;
$path = "../../../asset/images/registrations/".$report_file_name;

if(move_uploaded_file($report_file_tmp, $path)){
    insert(
        $name,
        $gender,
        $birth_date,
        $birth_location,
        $address,
        $student_number,
        $junior_school,
        $report_file_name   
    );
    header('location:../../../dashboard.php');
}