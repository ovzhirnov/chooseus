<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>��������� - �����</title>
<meta name="Title" content='��������� - �����' />
<META http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link href="style.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="show_block.js"></script>
<script type="text/javascript" src="valid.js"></script>
</head>
<body>
<?php require ('config.php'); ?>
<div align="center">
	<?php require ("header.php"); ?>			
	<table border="0" cellpadding="0" cellspacing="0" align="center">	
		<tr><td width="200" valign="top">
				<?php require ("basic_menu.php"); ?>
			</td>
		
			<td width="800" valign="top">
				<table width='800' border='0' cellpadding='0' cellspacing='0'>
					<tr><td class="title_mnu">���������� ������</td></tr>
                </table><br>

<?php
if ($_POST['searchstring'])
{	
	$searchstring=$_POST['searchstring'];
	$searchstring=substr ($searchstring,0,40);


//$sql = "SELECT * FROM ".$table_name." WHERE name LIKE \"%".$searchstring."%\"" ;
$sql = "SELECT * FROM shtory WHERE name LIKE \"%".$searchstring."%\"
UNION
SELECT * FROM pokrivala WHERE name LIKE \"%".$searchstring."%\"
UNION
SELECT * FROM tuli WHERE name LIKE \"%".$searchstring."%\"
UNION
SELECT * FROM rimshtory WHERE name LIKE \"%".$searchstring."%\"
UNION
SELECT * FROM shtoryclassic WHERE name LIKE \"%".$searchstring."%\"
";
					$q=Mysql_query($sql, $conn) or die(); //���������� ������ �� ������
					$ke=Mysql_num_rows($q); //���������� ��������� � ����
					$sch=0;
						while ($zap = mysql_fetch_array($q))
						{
							$ID=$zap['ID'];
							$name=$zap['name'];
							$category=$zap['category'];
							$about=$zap['about'];
							$picture=$zap['picture'];
							$product=$zap['product'];
global $new_price_minim;
global $new_price_kitchen;
global $new_price_pokrivala;
global $new_price_tuli;
global $new_price_rimshtory;
$new_price= $new_price_minim;
$old_price=$new_price+ceil($new_price*0.2/10) * 10;
							
switch ($product)
{
case '���������': $prod='shtory'; break;
case '��������': $prod='tuli'; break;
case '�������������': $prod='pokrivala'; break;
case '������� ���������': $prod='rimshtory'; break;
case '�����': $prod='shtoryclassic'; break;
}
$mater="��������";
						
$size='1.5� x 2.5�';
if ($product=='���������' && $category=='��� �����'){$size='1� x 1.5�';$new_price=$new_price_kitchen;$old_price=$new_price+ceil($new_price*0.1/10) * 10;}
if ($product=='�����' && $category=='�����'){$size='1� x 1.5�';$new_price=$new_price_kitchen;$old_price=$new_price+ceil($new_price*0.1/10) * 10;}
if ($product=='��������'){$size='1.45� x 2.5�'; $mater="�����";$new_price=$new_price_tuli;$old_price=$new_price+ceil($new_price*0.1/10) * 10;}
if ($product=='�������������'){$size='1.55� x 2.20�'; $mater="�����";$new_price=$new_price_pokrivala;$old_price=$new_price+ceil($new_price*0.2/10) * 10;}
if ($product=='������� ���������'){$size='0.6� x 1.7�'; $mater="��������";$new_price=$new_price_rimshtory;$old_price=$new_price+ceil($new_price*0.2/10) * 10;}
	echo "<table width='800' border='1' cellpadding='0' cellspacing='0'>
	<tr><td class='title_mnu'>&nbsp;&nbsp;���������:&nbsp;".$product." ".$category."</td></tr>
	</table>";
	echo "<table border='1' cellpadding='0' cellspacing='0'><tr><td width='400' align='center'>";
	echo "<a href='javascript:void(0);'><img src='$picture' width='400' onclick=\"open_pop_up('#pic$ID');\" class='zoomin' title='��������� $name' border='0'></a></td><td width='400' bgcolor='#ddddff' class='about_films'>";
			echo "<div class='blinds_name'>".$name."</div><br>";
			echo $product.":&nbsp;<b>".$name."</b><br>";
			echo "������ ����:&nbsp;<font style='text-decoration:line-through;'><b>".$old_price."</b></font><br>";
			echo "����� ����:&nbsp;<font color='#FF0000'><b>".$new_price."</b></font><br /><br /><br />";
			echo "<center><a href='product_info-$prod-$ID.html' title='���������� ��������� � ��������'>���������� ��������� � ��������</a></center>";
if ($product=='�������������'){
			echo "<div class='undertext'>* ���� ������������� �� ��������� �����<br />&nbsp;&nbsp;&nbsp;� ��������  ".$size."</div>";
}
elseif ($product=='��������'){
			echo "<div class='undertext'>* ���� �������� �� ��������� �����<br />&nbsp;&nbsp;&nbsp;(������ - 2 ������� ".$size.")</div>";
}
elseif ($product=='������� ���������'){
			echo "<div class='undertext'>* ���� ������� �������� �� ��������� ��������<br />&nbsp;&nbsp;&nbsp;(������ - ".$size.")</div>";
}
else {
			echo "<div class='undertext'>* ���� ��������� �������� �� ��������� ��������<br />&nbsp;&nbsp;&nbsp;(������ - 2 ������� ".$size.")</div>";
}
		echo "</td></tr></table>
		<div id='pic$ID' class='show_big_img'><img src='$picture' onclick=\"close_pop_up('#pic$ID');\"><img src='images/close_btn.png' id='img_close_btn' onclick=\"close_pop_up('#pic$ID');\"></div>
		<br />";
$sch++;		
						if ($sch>=15){break;}	
						}
							
						if ($sch>0) {echo "<br><br>������� ���������: ".$sch;}
						echo "</div>";
					
}
	else {echo "<div class='about_films'>������� ���� ���������� ��� ������!</div>";}

?>



			</td>
			<td width="200" valign="top">
            	<?php require ("right_col.php"); ?>
 
			</td>
		</tr>
	</table>
	  
	<?php require ("footer.php"); ?>
</div>
</body>
</html>
