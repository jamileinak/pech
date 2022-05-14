<?php
require_once ('connection.php');

$username     = $_POST['username'];
$password     = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = :username";
$query = $db->prepare($sql);
$query->execute([
':username'      => $username
]);
$registerExist = $query->rowCount();

if ($registerExist) {
    $user = $query-> fetch();
    $verified = password_verify($password, $user['password']);

    if (!$verified) {
        function function_alert($message) { 

            echo "<script>alert('$message');</script>"; 
        } 
          
        function_alert("Username or Password incorrect, please try again!"); 
        die(header("Refresh: 1; URL=../login.php"));
    }
    session_start();
    $_SESSION['id'] = $user['id'];
    $_SESSION['role_id'] = $user['role_id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];

    if($_SESSION['role_id'] == 1 ){
        header('Location: ../admin.php');
    }
    else if($_SESSION['role_id'] == 2 ){
        header('Location: ../garage.php');
    }
    else if($_SESSION['role_id'] == 3 ){
        header('Location: ../customer.php');
    }
}
else{
    function function_alert($message) { 

        echo "<script>alert('$message');</script>"; 
    } 
      
    function_alert("Username or Password incorrect, please try again!"); 
    die(header("Refresh: 1; URL=../login.php"));
}