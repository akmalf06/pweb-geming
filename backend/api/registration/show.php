<?php

include '../../registration.php';

$id = $_GET['id'];

$data = show($id);

echo json_encode($data);