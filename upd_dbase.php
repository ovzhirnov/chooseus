<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Документ без названия</title>
</head>

<body>
<?php
 ini_set('display_errors', 1);
  error_reporting(E_ALL);

require ('config.php');
mysql_query("SET NAMES 'cp1251'");
mysql_query ("set collation_connection='cp1251'");
mysql_query ("set collation_server='cp1251'");
mysql_query ("set character_set_client='cp1251'");
mysql_query ("set character_set_results='cp1251'");
mysql_query ("set character_set_connection='cp1251'");
mysql_query ("set character_set_server='cp1251'");

$table_name="photoblinds";

$sql = "UPDATE ".$table_name." SET `about` = REPLACE(`about`, '220*240', '215*240') where `category`='Покрывала'";
$q=Mysql_query($sql, $conn) or die("Не удачно записалось!");
if ($q) {echo "<br>o`k";} 
?>
</body>
</html>