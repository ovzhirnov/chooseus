<?php
$new_price_minim = '3360'; //����� ���� �� ��������� ������� ������� �� ������ �������� ���������
$new_price_kitchen = '2660'; //����� ����������� ���� ���� ��� ����� �� ������ �������� ���������
$new_price_pokrivala = '3000'; //����� ����������� ���� ������������
$new_price_tuli = '3321'; //����� ���� �������� ������� �������
$new_price_rimshtory = '3655'; //����� ���� ������� �������� ������������ �������

$conn = Mysql_connect("localhost", "nlijumml_zovcho", "14zov09choose14")
or die("���������� ���������� ���������� � ����� ������: ". Mysql_error());
$database="nlijumml_chooseus";
$rod = $_SERVER['REQUEST_URI'];
if (strstr($rod,"rasprodazha"))
{
$table_name="rasprodazha";
}
elseif (strstr($rod,"otzivi"))
{
$table_name="otzivi";
}
/*else
{
$table_name="photoblinds";
}*/
Mysql_select_db($database); 

mysql_query("SET NAMES 'cp1251'");
mysql_query ("set collation_connection='cp1251'");
mysql_query ("set collation_server='cp1251'");
mysql_query ("set character_set_client='cp1251'");
mysql_query ("set character_set_results='cp1251'");
mysql_query ("set character_set_connection='cp1251'");
mysql_query ("set character_set_server='cp1251'");

?>