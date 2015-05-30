<?php
  include("header.php");
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="sitestyle.css">
    <title> Create Monkey Part </title>
<script>
function submitb()
{
	document.getElementById("project_select").submit();
}
</script>
</head>
<body>
<div class='dashboard_area'>
<form id="part_select" method="post">
<table>
<tr>
<td>
<p> Item Name </p>
</td>
<td>
<input placeholder="Item Name" type="text" name="itemname">
</td>
</tr>
<tr>
<td>
<p> Item Type </p>
</td>
<td>
<input placeholder="Item Type" type="text" name="itemtype">
</td>
</tr>
<tr>
<td>
<p> Quantity (Integer) </p>
</td>
<td>
<input placeholder="Quantity" type="text" name="quantity">
</td>
</tr>
<tr>
<td>
<p> Status </p>
</td>
<td>
<input placeholder="Status" type="text" name="status">
</td>
</tr>
<tr>
<td>
<p> Shop Manager </p>
</td>
<td>
<input placeholder="Shop Manager" type="text" name="shopmanager">
</td>
</tr>
<tr>
<td>
<p> Year (4 Digit Integer) </p>
</td>
<td>
<input placeholder="Year" type="text" name="year">
</td>
<td> 
<p> Month (2 Digit Integer) </p>
</td>
<td>
<input placeholder="Month" type="text" name="month">
</td>
<td>
<p> Day (2 Digit Integer) </p>
</td>
<td>
<input placeholder="Day" type="text" name="day">
</td>
</tr>
<tr>
<td>
<p> Assigned By </p>
</td>
<td>
<input placeholder="Assigned By" type="text" name="assigner">
</td>
</tr>
</table>
<button onClick="submitb()"> Create Part </button>
</form>
</div>
<?php
session_start();
$db = "monkeypartsdb";
$con = new mysqli("localhost", "root", "", $db);
$project_name = $_SESSION['projectname'];

$itemtype = isset($_POST['itemtype']) ? ($_POST['itemtype']) : '';
$itemname = isset($_POST['itemname']) ? ($_POST['itemname']) : '';
$quantity = isset($_POST['quantity']) ? ((int)$_POST['quantity']) : '';
$status = isset($_POST['status']) ? ($_POST['status']) : '';
$shopmanager = isset($_POST['shopmanager']) ? ($_POST['shopmanager']) : '';
$year = isset ($_POST['year']) ? ($_POST['year']) : '';
$month = isset ($_POST['month']) ? ($_POST['month']) : '';
$day = isset ($_POST['day']) ? ($_POST['day']) : '';
$date_create = $year . $month . $day;
$assigner = isset($_POST['assigner']) ? ($_POST['assigner']) : '';

if (($itemtype!='')&&($shopmanager!='')&&($status!='') && ($assigner!='')&&($quantity!=NULL))
{
	$query = "INSERT INTO $project_name (itemtype, itemname, quantity, status,  shopmanager, date_create, assigner) VALUES ('$itemtype', '$itemname', '$quantity', '$status', '$shopmanager', '$date_create', '$assigner') ";
	$con->query($query);
	$con->close();
	header("Location: home.php");
}
?>
</body>
</html>