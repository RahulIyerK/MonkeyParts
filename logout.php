<?php
  session_start();
  unset($_SESSION["username"]);
  header("Location:attendance_login.php");
?>