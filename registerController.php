<?php
require_once ('connection.php');

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$stmt = $db->prepare("SELECT * FROM users WHERE username=?");
//execute the statement
$stmt->execute([$username]); 
//fetch result
$user = $stmt->fetch();
if ($user) {
    echo '<script>alert("Username already exist! Please use another useername."); window.location="../register.php"; </script>';
} 
else {           
    $sql = "INSERT INTO users (role_id, username, email, password) VALUES (3, :username, :email, :password)";
    $prepare = $db->prepare($sql);
    $prepare->execute([
    ':username'  => $username,
        ':email'  => $email,
        ':password' => $hashed_password
    ]);

    echo '<script>alert("You are successfully registered!"); window.location="../login.php"; </script>';
}