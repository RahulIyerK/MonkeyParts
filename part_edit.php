<head>
<title>Edit Part</title>
	<link rel="stylesheet" type="text/css" href="sitestyle.css">

<head>
<script>
	function submitb()
	{
		document.getElementById("project_select").submit();
	}
</script>
</head>
<body>

<?php
session_start();
$db = "monkeypartsdb";
$con = new mysqli("localhost", "root", "", $db);
$project_name = $_SESSION['projectname'];
$id = isset($_GET['id']) ? ($_GET['id']) : '';
$query = "SELECT * FROM $project_name WHERE id=$id";
$result = $con->query($query);
if($result->num_rows>0)
{
	while ($row = $result->fetch_assoc())
	{
		$itemname = isset($row['itemname'])? ($row['itemname']) : '';
		$itemtype = isset($row['itemtype'])? ($row['itemtype']) : '';
		$quantity = isset($row['quantity'])? ($row['quantity']) : '';
		$status = isset($row['status']) ? ($row['status']) : '';
		$shopmanager = isset($row['shopmanager']) ? ($row['shopmanager']) : '';
		$date_create = isset($row['date_create']) ? ($row['date_create']) : '';
		$date_arr =  explode('-', $date_create);
		$year = $date_arr[0];
		$month = $date_arr[1];
		$day = $date_arr[2];
		$assigner = isset($row['assigner'])? ($row['assigner']) : '';
	}
}
echo ("<div class='dashboard_area'>
<form id='part_edit' method='post'>
<table>
<tr>
<td>
<p> Item Name </p>
</td>
<td>
<input placeholder='Item Name' type='text' name='itemname' value='$itemname'>
</td>
</tr>
<tr>
<td>
<p> Item Type </p>
</td>
<td>
<input placeholder='Item Type' type='text' name='itemtype' value='$itemtype'>
</td>
</tr>
<tr>
<td>
<p> Quantity (Integer) </p>
</td>
<td>
<input placeholder='Quantity' type='text' name='quantity' value='$quantity'>
</td>
</tr>
<tr>
<td>
<p> Status </p>
</td>
<td>
<input placeholder='Status' type='text' name='status' value='$status'>
</td>
</tr>
<tr>
<td>
<p> Shop Manager </p>
</td>
<td>
<input placeholder='Shop Manager' type='text' name='shopmanager' value='$shopmanager'>
</td>
</tr>
<tr>
<td>
<p> Year (4 Digit Integer) </p>
</td>
<td>
<input placeholder='Year' type='text' name='year' value='$year'>
</td>
<td> 
<p> Month (2 Digit Integer) </p>
</td>
<td>
<input placeholder='Month' type='text' name='month' value='$month'>
</td>
<td>
<p> Day (2 Digit Integer) </p>
</td>
<td>
<input placeholder='day' type='text' name='day' value='$day'>
</td>
</tr>
<tr>
<td>
<p> Assigned By </p>
</td>
<td>
<input placeholder='Assigned By' type='text' name='assigner' value='$assigner'>
</td>
</tr>
</table>
<button onclick='submitb()'> Edit Part </button>
</form>");
$con->close();
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

if (($itemtype!='')&&($shopmanager!='')&&($status!='') && ($assigner!='') &&($quantity!=NULL))
{
	$query = "UPDATE $project_name SET itemtype='$itemtype', itemname='$itemname', status='$status', quantity='$quantity', shopmanager='$shopmanager', date_create='$date_create', assigner='$assigner' WHERE id=$id ";
	$con->query($query);
	$con->close();
	header("Location: home.php");
}
$con->close();
?>
</div>
</body>
</html>