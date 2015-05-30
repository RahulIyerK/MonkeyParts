<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="sitestyle.css">
    <title> Monkey Parts </title>
    <script>
	function submitb()
	{
		document.getElementById("project_select").submit();
	}
	</script>
	</head>
	<body>
		<h1> Project Dashboard </h1>
        <div class="create_bar">
        <table align="center">
        <tr>
        <td>
        	<a href="project_create.php"> <button class="create_button"> <em>Create Project</em> </button></a>
            </td>
            <td>
			<a href="part_create.php"> <button class="create_button"> <em>Create Part </em> </button></a>
            </td>
            </tr>
            </table>
		</div>
        <div class="spacer"> </div>
	<div class="dashboard_area">
    <form id="project_select" method="post">
	<select id="filteritem" name="filterproject" onclick="submitb()">
	<?php
		$db = "monkeypartsdb";
		$con = new mysqli("localhost", "root", "", $db);	
		$query = "SELECT * FROM projects";
		$result = $con->query($query) or die("No Projects");
		if ($result->num_rows>0)
		{
			while ($row = $result->fetch_assoc())
			{
				$id = $row['id'];
				$name = $row['name'];
				echo "<option name = 'ID' value = " . $id . "> " . $name . " </option>";
			}
		}		
	?>
	</select>
    </form>
	</div>
    <div class="spacer"></div>
    <div class="dashboard_area">
    
    <?php
	session_start();
	$filter_project = isset($_POST['filterproject']) ? ($_POST['filterproject']) : '';
	$query = "SELECT * FROM projects WHERE id=$filter_project";
	$result = $con->query($query);
	if ($result)
	{
		$fetch_array = mysqli_fetch_assoc($result);
	
		$project_name = $fetch_array["name"];
		$_SESSION['projectname'] = $project_name;
		echo ("<p align='center'> Currently Showing: ".$project_name. "</p>");
		echo ("<table id='project_table' align='center'>");
		echo ("<tr>");
		echo ("<td class='project_header_td'>"); echo ("Item Name"); echo ("</td>");
		echo ("<td class='project_header_td'>"); echo ("Item Type"); echo ("</td>");
		echo ("<td class='project_header_td'>"); echo ("Quantity"); echo ("</td>");
		echo ("<td class='project_header_td'>"); echo ("Status"); echo ("</td>");
		echo ("<td class='project_header_td'>"); echo ("Shop Manager"); echo ("</td>");
		echo ("<td class='project_header_td'>"); echo ("Date Created"); echo ("</td>");
		echo ("<td class='project_header_td'>"); echo ("Assigned By"); echo ("</td>");
		echo ("</tr>");
		$query = "SELECT * FROM $project_name";
		$result = $con->query($query);
		if($result->num_rows>0)
		{
			while ($row = $result->fetch_assoc())
			{
				echo ("<tr>");
				$itemname = $row['itemname'];
				$id = $row['id'];
				echo ("<td class='project_td'>"); echo (" <a href='part_edit.php?id=$id'><p>". $itemname. "</p> </a>"); echo ("</td>");
				$itemtype = $row['itemtype'];
				echo ("<td class='project_td'>"); echo($itemtype); echo ("</td>");
				$quantity = $row['quantity'];
				echo ("<td class='project_td'>"); echo($quantity); echo ("</td>");
				$status = $row['status'];
				echo ("<td class='project_td'>"); echo ($status); echo ("</td>");
				$shopmanager = $row['shopmanager'];
				echo ("<td class='project_td'>"); echo($shopmanager); echo ("</td>");
				$date_create = $row['date_create'];
				echo ("<td class='project_td'>"); echo($date_create); echo ("</td>");
				$assigner = $row['assigner'];
				echo("<td class='project_td'>"); echo ($assigner); echo ("</td>");
				echo ("<td class='project_td'>"); echo ("<a href='delete_part.php?id=$id'> <button class='delete_button'> Delete </button> </a>"); echo("</td>");
				echo ("</tr>");
			}
		}
		echo ("</table>");
	}
	$con->close();
	?>
    <br>
    </div>
</body>
</html>
