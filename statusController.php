<?php
require_once ('connection.php');

$status = $_POST['status'];
$support_call_id = $_POST['support_call_id'];

$sql = "UPDATE support_call SET status = :status WHERE id = $support_call_id";
$query = $db->prepare($sql);
$query->execute([
    ':status'         => $status
 ]);
 ?>
 <script> location.replace("../garage.php"); </script>        
    