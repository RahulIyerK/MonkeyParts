<?php
  session_start();
  unset($_SESSION["username"]); //unsets username
  header("Location:index.php");
?>
