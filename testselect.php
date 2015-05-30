<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<form id="test_form" method="post">
<select name="selection">
<option value="1"> 1</option>
<option value="2"> 2</option>
<option value="3"> 3</option>
</select>
<input type="submit" value="submit" >
</form>

<?php
$value = isset($_POST['selection']) ? ($_POST['selection']) : '';
echo ($value);
?>

</body>
</html>