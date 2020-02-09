<?php 
//Top 10
$table_name="photoblinds";
$sql = "SELECT * FROM ".$table_name." WHERE top='1' LIMIT 10";
$q=Mysql_query($sql, $conn) or die(); //отправляем запрос на сервер			
						while ($zap = mysql_fetch_array($q))
						{
							$ID=$zap['ID'];
							$name=$zap['name'];
							$category=$zap['category'];
							$about=$zap['about'];
							$old_price=$zap['old_price'];
							$new_price=$zap['new_price'];
							$picture=$zap['picture'];

$product="Фотошторы";
$mater="Блэкаут";
						
$size='1.5м x 2.5м';
if ($category=='Шторы для кухни'){$size='1м x 1.5м';}
if ($category=='Фототюль'){$size='1.45м x 2.5м'; $product="Фототюль";$mater="Шифон";}
	echo "<table width='800' border='1' cellpadding='0' cellspacing='0'>
	<tr><td class='title_mnu'>&nbsp;&nbsp;Категория:&nbsp;".$category."</td></tr>
	</table>";
	echo "<table border='1' cellpadding='0' cellspacing='0'><tr><td width='400' align='center'>";
	echo "<a href='javascript:void(0);'><img src='$picture' width='400' onclick=\"open_pop_up('#pic$ID');\" class='zoomin' title='фотошторы $name' border='0'></a></td><td width='400' bgcolor='#ddddff' class='about_films'>";
			echo "<div class='blinds_name'>".$name."</div><br>";
			echo $product.":&nbsp;<b>".$name."</b><br>";
			echo "Старая цена:&nbsp;<font style='text-decoration:line-through;'><b>".$old_price."</b> руб.</font><br>";
			echo "Новая цена:&nbsp;<font color='#FF0000'><b>".$new_price."</b> руб.</font><br /><br /><br />";
			echo "<center><a href='product_info-$ID.html' title='Посмотреть подробнее и заказать'>Посмотреть / заказать</a></center>";
			echo "<div class='undertext'>* цена указана для материала ".$mater."<br /> с размером одного полотна ".$size."</div>";
		echo "</td></tr></table>
		<div id='pic$ID' class='show_big_img'><img src='$picture' height='720' onclick=\"close_pop_up('#pic$ID');\"><img src='images/close_btn.png' id='img_close_btn' onclick=\"close_pop_up('#pic$ID');\"></div>
		<br />";
						}
?>