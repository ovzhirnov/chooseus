<?php 
//Rasprodazha
$table_name="rasprodazha";
$sql = "SELECT * FROM ".$table_name." WHERE `kol`<>'0'";
$q=Mysql_query($sql, $conn) or die(); //отправляем запрос на сервер			
						while ($zap = mysql_fetch_array($q))
						{
							$ID=$zap['ID'];
							$name=$zap['name'];
							$category=$zap['category'];
							$about=$zap['about'];
							$picture=$zap['picture'];
                            $shirina=$zap['shirina'];
							$visota=$zap['visota'];
							$material=$zap['material'];
							$old_price=$zap['old_price'];
							$price=$zap['price'];
						
	echo "<table width='800' border='1' cellpadding='0' cellspacing='0'>
	<tr><td class='title_mnu'>&nbsp;&nbsp;Распродажа&nbsp;".$category."</td></tr>
	</table>";
	echo "<table border='1' cellpadding='0' cellspacing='0'><tr><td width='400' class='zoomin' onclick=\"open_pop_up('#pic$ID');\" style=\"background:url($picture) no-repeat; background-size:400px auto ;\">";
	echo "<div class='akcija'></div></td><td width='400' bgcolor='#ddddff' class='about_films'>";
			echo "<div class='blinds_name'>".$name."</div><br>";
			echo $category.":&nbsp;<b>".$name."</b><br><br>";
            echo "Материал:&nbsp;".$material."<br>";
if ($shirina<>"") {
            echo "Ширина:&nbsp;".$shirina."<br>";}
if ($visota<>"") {
            echo "Высота:&nbsp;".$visota."<br />";}
//			echo "<div class='prod_about'>".$about."</div>";
			echo "Старая цена:&nbsp;<font style='text-decoration:line-through;'><b>".$old_price."</b> руб.</font><br>";
			echo "Новая цена:&nbsp;<font color='#FF0000'><b>".$price."</b> руб.</font><br /><br />";
			echo "<a href='javascript:void(0);' onclick=\"change_prod_data('$ID'); open_pop_up('#makeorder');\" title='заказать $category $name' ><img src='images/make_order.png'></a>";
		echo "</td></tr></table>
		<div id='pic$ID' class='show_big_img'><img src='$picture' height='720' onclick=\"close_pop_up('#pic$ID');\"><img src='images/close_btn.png' id='img_close_btn' onclick=\"close_pop_up('#pic$ID');\"></div>
		<br />";
?> 
<script type="text/javascript">
id = "<?php echo $ID; ?>"; 
eval ("var name"+id+"='<?php echo $name; ?>'"); 
window ['category'+id] = "<?php echo $category; ?>"; 
window ['shirina'+id] = "<?php echo $shirina; ?>"; 
window ['visota'+id] = "<?php echo $visota; ?>"; 
window ['material'+id] = "<?php echo $material; ?>"; 
window ['price'+id] = "<?php echo $price; ?>"; 
</script>
<?php
						}
?>
<div id="makeorder"><img src="images/close_btn.png" id="close_btn" onclick="close_pop_up('#makeorder');"><hr /><center><b>Оставьте заявку и мы перезвоним Вам для оформления заказа:<br /><div id="zakaz"></div></b></center><br />
                        <form name="formazakaz" action="sent.html" method="post" onsubmit="return validate_form1 ();" class="formazakaza">
                        <div class="FormFio">
                            <input name="FormFio1" pattern=".{2,}" class="name" placeholder="* Фамилия, Имя, Отчество" type="text">
                        </div>
						 <div class="FormPhone">
                            <input name="FormPhone1" pattern=".{3,}" class="phone" placeholder="* Контактный телефон" type="text"/>
                        </div>
                        <div class="FormMail">
                            <input name="FormMail1" pattern=".{1,}[@].{4,}" class="mail" placeholder="e-mail" type="text">
                        </div>
                        <div class="FormAddress">
                            <input name="FormAddress1" pattern=".{5,}" class="adress" placeholder="Индекс и Адрес доставки" type="text">
                        </div>
                            <textarea rows='5' cols='28' name="zakazcomment" type="text" placeholder="Можете оставить комментарий к заказу(макс. 140 символов)" style="resize:none;"></textarea>
                        	<input id="name" name="product" type="hidden" value="<?php echo $name; ?>" />
                        	<input name="id" type="hidden" value="<?php echo $ID."-rasp"; ?>" />

 
							<input id="material" name="material" type="hidden" value="<?php echo $material; ?>" />
                             <input id="shir" name="shir" type="hidden" value="<?php echo $shirina; ?>" />
                             <input id="vis" name="vis" type="hidden" value="<?php echo $visota; ?>" />
                            <input id="cena" name="cena" type="hidden" value="<?php echo $price; ?>" />
                         <div class="knopka"><button type="submit" name="zakaz">Заказать</button></div>
                        </form>
      
</div>