<html>

<head>
<title> Project Creation </title>
<link rel="stylesheet" type="text/css" href="sitestyle.css">
<script>
	function submitb()
	{
		document.getElementById("project_select").submit();
	}
</script>
</head>

<body>
<h1 align="center"> Create  a new project </h1>

<div id="form_container" class="dashboard_area">
<form id="projectcreate" method="post">
<input type="text" name="project" placeholder="project name">
<input type="text" name="user" placeholder="user">
<input type="text" name="pass" placeholder="password">
<p align="left"> By Clicking "Enter" I Agree that I will only use this for FRC 846 funky monkey purposes </p>
<button onClick="submitb()"> Create Project </button>
</form>

<?php
$project_name = isset($_POST['project']) ? ($_POST['project']) : '' ;
$username = isset ($_POST['user']) ? ($_POST['user']) : '';
$password = isset($_POST['pass']) ? ($_POST['pass']) : '';

if (($username=='shopmanager') && ($password=='banana') && ($project_name != ''))
{
$db = "monkeypartsdb";
$con=new mysqli("localhost","root", "", $db);

$query = "INSERT INTO projects (name) VALUES ('$project_name') ";
$result = $con->query($query);

$query = "CREATE TABLE $project_name (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
itemname CHAR(255) NOT NULL,
itemtype CHAR(255) NOT NULL,
quantity INT(6) UNSIGNED,
status CHAR(255) NOT NULL,
shopmanager CHAR(255) NOT NULL,
assigner CHAR(255) NOT NULL,
date_create DATE
)";
$con->query($query);
$con->close();
header("Location: home.php");
}
?>
</div>

</body>
</html>