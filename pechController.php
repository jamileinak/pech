<?php
require_once ('connection.php');
session_start();

$garage = $_POST['garage'];
$breakdown_details = $_POST['breakdown_details'];
$breakdown_location = $_POST['breakdown_location'];

      
    $sql = "INSERT INTO support_call (user_id, garage_id, breakdown_details, breakdown_location, status) 
            VALUES (:user_id, :garage_id, :breakdown_details, :breakdown_location, :status)";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':user_id'  => $_SESSION['id'],
        ':garage_id'  => $garage,
        ':breakdown_details' => $breakdown_details,
        ':breakdown_location'  => $breakdown_location,
        ':status'  => 'niet in behandeling'
    ]);

    echo '<script>alert("You successfully reported the breakdown! You will be helped soon!"); window.location="../customer.php"; </script>';
