<?php 
//Top 10
$table_name="photoblinds";
$sql = "SELECT * FROM ".$table_name." WHERE top='1' LIMIT 10";
$q=Mysql_query($sql, $conn) or die(); //���������� ������ �� ������			
						while ($zap = mysql_fetch_array($q))
						{
							$ID=$zap['ID'];
							$name=$zap['name'];
							$category=$zap['category'];
							$about=$zap['about'];
							$old_price=$zap['old_price'];
							$new_price=$zap['new_price'];
							$picture=$zap['picture'];

$product="���������";
$mater="�������";
						
$size='1.5� x 2.5�';
if ($category=='����� ��� �����'){$size='1� x 1.5�';}
if ($category=='��������'){$size='1.45� x 2.5�'; $product="��������";$mater="�����";}
	echo "<table width='800' border='1' cellpadding='0' cellspacing='0'>
	<tr><td class='title_mnu'>&nbsp;&nbsp;���������:&nbsp;".$category."</td></tr>
	</table>";
	echo "<table border='1' cellpadding='0' cellspacing='0'><tr><td width='400' align='center'>";
	echo "<a href='javascript:void(0);'><img src='$picture' width='400' onclick=\"open_pop_up('#pic$ID');\" class='zoomin' title='��������� $name' border='0'></a></td><td width='400' bgcolor='#ddddff' class='about_films'>";
			echo "<div class='blinds_name'>".$name."</div><br>";
			echo $product.":&nbsp;<b>".$name."</b><br>";
			echo "������ ����:&nbsp;<font style='text-decoration:line-through;'><b>".$old_price."</b> ���.</font><br>";
			echo "����� ����:&nbsp;<font color='#FF0000'><b>".$new_price."</b> ���.</font><br /><br /><br />";
			echo "<center><a href='product_info-$ID.html' title='���������� ��������� � ��������'>���������� / ��������</a></center>";
			echo "<div class='undertext'>* ���� ������� ��� ��������� ".$mater."<br /> � �������� ������ ������� ".$size."</div>";
		echo "</td></tr></table>
		<div id='pic$ID' class='show_big_img'><img src='$picture' height='720' onclick=\"close_pop_up('#pic$ID');\"><img src='images/close_btn.png' id='img_close_btn' onclick=\"close_pop_up('#pic$ID');\"></div>
		<br />";
						}
?>