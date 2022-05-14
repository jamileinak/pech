<?php
if (!isset($_SESSION['id']) || ($_SESSION['role_id'] != 3)) { 
   session_destroy();
   echo '<script>alert("You are not autorized!"); window.location="../pechhulp/login.php"; </script>';
}