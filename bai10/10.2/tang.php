<?php 
session_start();
if (!isset($_SESSION['count']))
{
	$_SESSION['count']=1;
}
else 
$_SESSION['count'] ++;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<a href="dem.php">Quay lại</a>
</body>
</html>
