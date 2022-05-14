<?php
if (!isset($_SESSION['id']) || ($_SESSION['role_id'] != 1)) { 
   session_destroy();
   echo '<script>alert("You are not autorized!"); window.location="../pechhulp/login.php"; </script>';
}