<?php
require_once ('connection.php');
session_start();

$packet = $_POST['packet'];
$number_plate = $_POST['number_plate'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$vervangend_vervoer = $_POST['vervangend_vervoer'];

      
    $sql = "INSERT INTO contracts (user_id, type_id, number_plate, start_date, end_date, vervangend_vervoer) 
            VALUES (:user_id, :packet, :number_plate, :start_date, :end_date, :vervangend_vervoer)";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':user_id'  => $_SESSION['id'],
        ':packet'  => $packet,
        ':number_plate' => $number_plate,
        ':start_date'  => $start_date,
        ':end_date'  => $end_date,
        ':vervangend_vervoer' => $vervangend_vervoer
    ]);

    echo '<script>alert("You successfully bought your packet!"); window.location="../customer.php"; </script>';
