<?php

include '../../registration.php';

$id = $_POST['id'];

delete($id);

header('location:../../../dashboard.php');