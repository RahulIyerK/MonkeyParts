<?php
  session_start();
  if($_SESSION["username"]!="set"){ /* IF NO USERNAME REGISTERED TO THE SESSION VARIABLE */
    header("Location:home.php"); /* REDIRECT USER TO LOGIN PAGE */
  }
?>