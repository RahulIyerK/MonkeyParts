<!DOCTYPE html>
<html>
<head>
	<title>MonkeyParts</title>
	<link rel="stylesheet" type="text/css" href="sitestyle.css">
    <script>
	function submitb()
	{
		document.getElementById("project_select").submit();
	}
</script>
</head>

<body>

	<div class="dashboard_area" id="form_container">
	<form name="credentials" method="post">
		<legend> Monkey Parts </legend>
        <div class="splitter_div"> </div>
        <div class="spacer"></div>
		<input type="text" name="user" placeholder="Username">
		<input type="password" name="pass" placeholder = "Password">
        <button onclick="submitb()"> Enter </button>
  		<?php
		session_start();
			$user = isset($_POST['user']) ? ($_POST['user']) : '';
			$pass = isset($_POST['pass']) ? ($_POST['pass']) : '';
			if (($user=="shopmanager") && ($pass=="banana"))
			{
				$_SESSION["username"] = "set";
				header("Location: home.php");
			}
		?>

	</form>
	</div>
</body>
</html>