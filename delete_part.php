<?php
  include("header.php");
?>
<?php
session_start();
$id = isset($_GET['id']) ? ($_GET['id']) : '';
$db = "monkeypartsdb";
$con = new mysqli("localhost", "root", "", $db);
$project_name = $_SESSION['projectname'];
$query = "DELETE FROM $project_name WHERE id=$id";
$result = $con->query($query);
header("Location: home.php");
?>
