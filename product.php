<?php 	//входящие: 
		//$do - номер строки базы с выбранными фотошторами
		//$np-номер страницы, 
		//$product-продукт,
		//$name - название, 
		//$url_product-продукт в url
		//$h1product-продукт для заголовока, 
		//$categ-категория
		//$url_category-категория в url
$s=$do;

	echo "<table width='800' border='1' bgcolor='#ddddff' cellpadding='0' cellspacing='0'>
	<tr><td class='title_mnu'>".$product."&nbsp;".$name."</td></tr>
	</table>";
	echo "<table border='1' cellpadding='0' cellspacing='0'><tr><td width='800'>";
	echo "<table border='0' cellpadding='0' cellspacing='0'><tr><td width='400' bgcolor='#ddddff' valign='top' align='center'>";
	echo "<a href='javascript:void(0);'><img src='$picture' width='400' onclick=\"open_pop_up('#pic$ID');\" class='zoomin' title='$product $name' border='0'></a>";
			echo "<div class='prod_price'>";
				require ('countprice.php');
			echo "</div>";
			echo "<a href='javascript:void(0);' onclick=\"open_pop_up('#makeorder');\" title='заказать $product $name' ><img src='images/make_order.png'></a>";
			echo "<br /><br /></td>";
			echo "<td width='400' bgcolor='#ddddff' class='about_films'>";
			echo "<div class='blinds_name'>".$name."</div>";
			echo "<div class='prod_about'><h1>$product: ".$name."</h1>";
			echo "".$about."</div>";
if ($product=="Фотопокрывало") 
			{			
			echo "<div class='prod_about'><center>Фотографии <b>термостёжка - ультрастеп</b>:</center></div>";
			echo "<table width='380' border='0' cellpadding='0' cellspacing='0' bgcolor='#ddddff'><tr><td width='190' align='center'>";
			echo "<img src='images/pokrivalo-ultrastep.jpg' height='90' onclick=\"open_pop_up('#pokr1');\" class='zoomin' title='термостёжка - ультрастеп' border='0'>";
			echo "</td><td align='center'>";
			echo "<img src='images/pokrivalo-ultrastep-obr.jpg' height='90' onclick=\"open_pop_up('#pokr2');\" class='zoomin' title='термостёжка - ультрастеп' border='0'>";
			echo "</td></tr></table>";
			}
			echo "</td></tr>";
			echo "<tr><td colspan='2' bgcolor='#ddddff' class='prod_about' style='text-align:justify;'>";

			echo "&nbsp;&nbsp;Чтобы купить $product \"$name\" недорого, выберите нужные размеры, материал, и Вы увидите окончательную цену со скидкой на $product без стоимости доставки.</br> Затем нажмите кнопку оформления заказа и заполните заявку на $product \"$name\", при необходимости, заполните строку с комментарием к заказу $product \"$name\" недорого.</br>
Через некоторое время после оформления заявки на $product с Вами, по указанному в заявке телефону, свяжется наш менеджер для подтверждения заказа на $product \"$name\", обсудит все детали, а также условия оплаты и способы доставки.</br>
После подтверждения, Ваш заказ – $product отправится в изготовление. Сроки производства Фотоштор, Штор, Фототюли – 3-4 рабочих дня, а Римских Фотоштор и Фотопокрывал – 5-7 рабочих дней.</br>
По окончании изготовления, Ваш заказ $product \"$name\" будет Вам отправлен наиболее удобным для Вас способом, о чем мы известим Вас в SMS-сообщении.</br></br>
<center>Приятных Вам покупок!</center>";
	
			echo "</td></tr></table>";
		echo "</td></tr></table>
		<div id='pic$ID' class='show_big_img'><img src='$picture' height='720' onclick=\"close_pop_up('#pic$ID');\"><img src='images/close_btn.png' id='img_close_btn' onclick=\"close_pop_up('#pic$ID');\"></div>";
		echo "<div id='pokr1' class='show_big_img'><img src='images/pokrivalo-ultrastep.jpg' height='720' onclick=\"close_pop_up('#pokr1');\"><img src='images/close_btn.png' id='img_close_btn' onclick=\"close_pop_up('#pokr1');\"></div>";
		echo "<div id='pokr2' class='show_big_img'><img src='images/pokrivalo-ultrastep-obr.jpg' height='720' onclick=\"close_pop_up('#pokr2');\"><img src='images/close_btn.png' id='img_close_btn' onclick=\"close_pop_up('#pokr2');\"></div>";

$sql = "SELECT * FROM shtory WHERE name='".$name."'
UNION
SELECT * FROM pokrivala WHERE name='".$name."'
UNION
SELECT * FROM tuli WHERE name='".$name."'
UNION
SELECT * FROM rimshtory WHERE name='".$name."'
UNION
SELECT * FROM shtoryclassic WHERE name='".$name."'
";
$q=Mysql_query($sql, $conn);
$ke=Mysql_num_rows($q); //количество найденых элементов в базе
if ($ke>1) 
{
	$sch=1;
	echo "<table width='798' border='1' bgcolor='#ddddff' align='center' cellpadding='0' cellspacing='0'><tr><td>";
	echo "<center><div style=\"color:#930; font-size:15px;\"><br />Возможно Вас так же заинтересует:</div></center><br /></td></tr>";
	echo "<tr><td><br />";
	echo "<table width='798' bgcolor='#ddddff' align='center' border='0' cellpadding='0' cellspacing='0'><tr>";
							while ($zap = mysql_fetch_array($q))
						{
							$dopID=$zap['ID'];
							if ($dopID<>$ID) 
							{
							$dopname=$zap['name'];
							$doppicture=$zap['picture'];
							$dopproduct=$zap['product'];
							
							switch ($dopproduct)
{
case 'Фотошторы': $prod='shtory'; break;
case 'Фототюль': $prod='tuli'; break;
case 'Фотопокрывало': $prod='pokrivala'; break;
case 'Римские Фотошторы': $prod='rimshtory'; break;
case 'Шторы': $prod='shtoryclassic'; break;
}

	if ($sch>3) {$sch=1; echo "</tr><tr>";}
	echo "<td width='266' class='dop_page_pic'><a href='/product_info-$prod-$dopID.html'><img src='$doppicture' width='250' title='Заказать $dopproduct $dopname' id='main_img".$sch."' onmouseover='mainpicover(this.id);' onmouseout='mainpicout(this.id);'/><br />$dopproduct $dopname</a></td>";
	$sch++;
							}
						}
	echo "</tr></table>";
	echo "</td></tr></table>";
}

/*	echo "<table width='800' border='1' bgcolor='#ddddff' cellpadding='0' cellspacing='0'>
			<tr><td><br />
<div class='comment'>* - бесплатная доставка действует для центральных регионов России при заказе фотоштор:<br />
&nbsp;&nbsp;&nbsp;- из материалов Блэкаут, Сатен, Атлас и Вуаль на сумму превышающую 5000 руб.;<br />
&nbsp;&nbsp;&nbsp;- из материала Габардин на сумму превышающую 4500 руб.;</div><br />

			</td></tr></table>";*/


			
	echo "<br />";	

		
		
$_SESSION['order']='true order';	
?>

<div id="makeorder"><img src="images/close_btn.png" id="close_btn" onclick="close_pop_up('#makeorder');"><hr /><center><b>Оформите заявку и мы свяжемся с Вами для подтверждения заказа:<br /><?php echo $product." - ".$name; ?></b></center><br />
                        <form name="formazakaz" action="sent.html" method="post" onsubmit="return validate_form1 ();" class="formazakaza">
                        <div class="FormFio">
                            <input name="FormFio1" pattern=".{2,}" class="name" placeholder="* Фамилия, Имя, Отчество" type="text">
                        </div>
						 <div class="FormPhone">
                            <input name="FormPhone1" pattern=".{3,}" class="phone" placeholder="* Контактный телефон" type="text"/>
                        </div>
                        <div class="FormMail">
                            <input name="FormMail1" pattern=".{1,}[@].{4,}" class="mail" placeholder="e-mail для уведомлений" type="text">
                        </div>
                        <div class="FormAddress">
                            <input name="FormAddress1" pattern=".{5,}" class="adress" placeholder="Индекс и Адрес доставки" type="text">
                        </div>
                            <textarea rows='5' cols='28' name="zakazcomment" type="text" placeholder="Можете оставить комментарий к заказу(макс. 140 символов)" style="resize:none;"></textarea>
                        	<input name="name" type="hidden" value="<?php echo $name; ?>" />
                        	<input name="id" type="hidden" value="<?php echo $ID; ?>" />
<?php 
 $mat = 'Габардин';
 if ($product=="Фототюль") { $mat = 'Вуаль';}
 if ($product=="Фотопокрывало") { $mat = 'Атлас';}
?>
							<input id="product" name="product" type="hidden" value="<?php echo $product; ?>" />
							<input id="material" name="material" type="hidden" value="<?php echo $mat; ?>" />
 <?php if ($product<>"Фотопокрывало") { ?>
  <?php if ($product=="Фототюль")  { ?>
                             <input id="shir" name="shir" type="hidden" value="1.45 м" />
 <?php } elseif ($category=="Для кухни" || $category=="Кухня") {?>                       
                            <input id="shir" name="shir" type="hidden" value="1 м" />
	<?php } elseif ($product=="Римские Фотошторы") {?>
    						<input id="shir" name="shir" type="hidden" value="0.6 м" />
    <?php } else {?>                       
                            <input id="shir" name="shir" type="hidden" value="1.5 м" />
	<?php } 
	if ($category=="Для кухни" || $category=="Кухня") {	?>
    						<input id="vis" name="vis" type="hidden" value="1.5 м" />
    <?php } elseif ($product=="Римские Фотошторы") {?>
							<input id="vis" name="vis" type="hidden" value="1.7 м" />
		<?php } else { ?>
                            <input id="vis" name="vis" type="hidden" value="2.5 м" /> <?php } ?>
                            <?php } ?>
                            <input id="cena" name="cena" type="hidden" value="<?php echo $cen; ?>" />
                         <div class="knopka"><button type="submit" name="zakaz" >Заказать</button></div>
                        </form>
      
</div>
	<script language="javascript" type="text/javascript">
	changeprice();
	</script>
