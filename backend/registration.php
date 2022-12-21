<?php

include 'connection.php';

function get()
{
    global $db1;
    $query = "SELECT id, name, gender, junior_school, birth_date FROM registrations";
    $sql = $db1->query($query);
    $data = [];
    while($row = $sql->fetch_assoc()){
        $data[] = $row;
    }
    $sql->close();
    return $data;
}

function show(int $id)
{
    global $db1;
    $query = "SELECT * FROM registrations where id='$id'";
    $sql = $db1->query($query);
    $data = $sql->fetch_assoc();
    $sql->close();
    return $data;
}

function delete(int $id)
{
    global $db1;
    $query = "DELETE FROM registrations WHERE id=?";
    $sql = $db1->prepare($query);
    $sql->bind_param('i', $id);
    $sql->execute();
    $sql->close();
}

function insert(
    string $name,
    string $gender,
    string $birth_date,
    string $birth_location,
    string $address,
    string $student_number,
    string $junior_school,
    string $report_file
)
{
    global $db1;
    $query = "INSERT INTO registrations (name, gender, birth_date, birth_location, address, student_number, junior_school, report_file) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $sql = $db1->prepare($query);
    $sql->bind_param(
        'ssssssss',
        $name,
        $gender,
        $birth_date,
        $birth_location,
        $address,
        $student_number,
        $junior_school,
        $report_file,
    );
    $sql->execute();
    $sql->close();
}

function update(
    int $id,
    string $name,
    string $gender,
    string $birth_date,
    string $birth_location,
    string $address,
    string $student_number,
    string $junior_school,
    string $report_file,
)
{
    global $db1;
    $query = "UPDATE registrations  SET name=?, gender=?, birth_date=?, birth_location=?, address=?, student_number=?, junior_school=?, report_file=? WHERE id=?";
    $sql = $db1->prepare($query);
    $sql->bind_param(
        'ssssssssi',
        $name,
        $gender,
        $birth_date,
        $birth_location,
        $address,
        $student_number,
        $junior_school,
        $report_file,
        $id
    );
    $sql->execute();
    $sql->close();
}