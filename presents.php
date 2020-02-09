<?php   //входящие: 
		//$np-номер страницы, 
		//$product-продукт, 
		//$url_product-продукт в url
		//$h1product-продукт для заголовока, 
		//$categ-категория
		//$url_category-категория в url

$table_name = $url_product;
$sql = "SELECT * FROM ".$table_name." WHERE product='".$product."' AND category='".$categ."'"; //создаем SQL запрос
if ($categ == '')
{$sql = "SELECT * FROM ".$table_name." WHERE product='".$product."'";}
$q=Mysql_query($sql, $conn) or die(); //отправляем запрос на сервер
$ke=Mysql_num_rows($q); //количество элементов в базе c нужной категорией
$ks=10; //количество элементов на странице

	echo "<div class='title_mnu'><h1>".$h1product." ".$categ."-".$np."</h1></div>";

if ($product == 'Фототюль')
	{
	echo "<div class='blog_tul'>Фототюль с любым изображением можно так же заказать из <b>Каталога Фотоштор</b>,<br />выбрав материал - <b>Вуаль</b> и ширину одного полотна не более 1,45м.
	<br /><br /></div>";
	echo "<div class='title_mnu'></div>";
	}
	
	
//echo "<br /><div class='akcija-text'>Новогодняя Акция: Бесплатная доставка *</div>";
	
	
	$r=1;
						while ($zap = mysql_fetch_array($q))
						{
							$ID=$zap['ID'];
							$a[$r]=$ID;//создаем массив $a[] из номеров строк с нужным жанром
							$r++;
						}
	$ke=$r-1;
	$beg_row=($np-1)*$ks; //вычисление начала
	$end_row=$np*$ks;   //и конца выборки
		if ($end_row>$r-1){$end_row=$r-1;}//конец выборки на последней странице
	$beg_row++;
	$i=1;
	while ($beg_row<=$end_row)
	{
				$sql = "SELECT * FROM ".$table_name." WHERE ID='".$a[$beg_row]."' LIMIT 1";
					$q=Mysql_query($sql, $conn);
					$zap=mysql_fetch_array($q);
					
					$ID=$zap['ID'];
					$name=$zap['name'];
					$product=$zap['product'];
					$category=$zap['category'];
					$about=$zap['about'];
					$picture=$zap['picture'];
					$new_price= $new_price_minim;
					$old_price=$new_price+ceil($new_price*0.2/10) * 10;
$size='1.5м x 2.5м';
if ($product=='Фотошторы' && $category=='Для кухни'){$size='1м x 1.5м';$new_price=$new_price_kitchen;$old_price=$new_price+ceil($new_price*0.1/10) * 10;}
if ($product=='Шторы' && $category=='Кухня'){$size='1м x 1.5м';$new_price=$new_price_kitchen;$old_price=$new_price+ceil($new_price*0.1/10) * 10;}
if ($product=='Фотопокрывало'){$size='1.55м x 2.15м';$new_price=$new_price_pokrivala;$old_price=$new_price+ceil($new_price*0.2/10) * 10;}
if ($product=='Фототюль'){$size='1.45м x 2.5м';$new_price=$new_price_tuli;$old_price=$new_price+ceil($new_price*0.1/10) * 10;}
if ($product=='Римские Фотошторы'){$size='0.6м x 1.7м';$new_price=$new_price_rimshtory;$old_price=$new_price+ceil($new_price*0.1/10) * 10;}
echo "<br /><table width='800' border='1' cellpadding='0' cellspacing='0'><tr><td class='title_mnu'></td></tr></table>";
		echo "<table border='1' cellpadding='0' cellspacing='0'><tr><td width='400' align='center'>";
		echo "<a href='javascript:void(0);'><img src='$picture' width='400' onclick=\"open_pop_up('#pic$ID');\" class='zoomin' title='$product $name' border='0'></a></td>";
		echo "<td width='400' bgcolor='#ddddff' class='about_films'>";
			echo "<div class='blinds_name'>".$name."</div><br>";
			echo $product.":&nbsp;<b>".$name."</b><br>";
			echo "Старая цена:&nbsp;<font style='text-decoration:line-through;'><b>".$old_price."</b> руб.</font><br>";
			echo "Новая цена:&nbsp;<font color='#FF0000'><b>".$new_price."</b> руб.</font><br /><br /><br />";
			echo "<center><a href='product_info-$url_product-$ID.html' title='Заказать $product $name'>Посмотреть / заказать</a></center>";
if ($product=='Фотопокрывало'){
			echo "<div class='undertext'>* цена фотопокрывала из материала Атлас<br />&nbsp;&nbsp;&nbsp;с размером  ".$size."</div>";
}
elseif ($product=='Фототюль'){
			echo "<div class='undertext'>* цена фототюля из материала Вуаль<br />&nbsp;&nbsp;&nbsp;(размер - 2 полотна ".$size.")</div>";
}
elseif ($product=='Римские Фотошторы'){
			echo "<div class='undertext'>* цена Римских фотоштор из материала Габардин<br />&nbsp;&nbsp;&nbsp;(размер - ".$size.")</div>";
}
else {
			echo "<div class='undertext'>* цена комплекта фотоштор из материала Габардин<br />&nbsp;&nbsp;&nbsp;(размер - 2 полотна ".$size.")</div>";
}
		echo "</td></tr></table>
		<div id='pic$ID' class='show_big_img'><img src='$picture' height='720' onclick=\"close_pop_up('#pic$ID');\"><img src='images/close_btn.png' id='img_close_btn' onclick=\"close_pop_up('#pic$ID');\"></div>
		";
							
				$beg_row++;
	}

echo "<div class='prod_about' style='text-align:center;'>На данной странице представлены $h1product $categ-$np нашего производства. <br />Для перехода в карточку товара и оформления заказа на $h1product, необходимо напротив выбранного изображения нажать на ссылку - <font color=\"#990000\">Посмотреть / заказать.</font></div>";

// Подсчет количества выводимых страниц в зависимости от количества элементов
$kolstr=ceil($ke/$ks); //количество страниц, дополненное до следующего целого числа

// показываем ссылки на все страницы
echo "<div class='listing'><ul>";
$idnp='ref';
if ($np==1) {$idnp='pres_ref';}
echo "<li><a id='".$idnp."' href='show-$url_product-$url_category-1.html'>1</a></li>&nbsp;&nbsp;";
if ($kolstr>10)
{
if ($np>=6 & $np<=($kolstr-5))
{
for ($s=($np-4);$s<=($np+4);$s++)
	{
	if ($s==$np)
	{echo "<li><a id='pres_ref' href='show-$url_product-$url_category-$s.html'>$s</a></li>";}//текущая страница
	else 
	{echo "<li><a id='ref' href='show-$url_product-$url_category-$s.html'>$s</a></li>";}//показываем ссылки на следующие страницы
	}
}
elseif ($np<6)
{
for ($s=2;$s<=10;$s++)
	{
	if ($s==$np)
	{echo "<li><a id='pres_ref' href='show-$url_product-$url_category-$s.html'>$s</a></li>";}//текущая страница
	else 
	{echo "<li><a id='ref' href='show-$url_product-$url_category-$s.html'>$s</a></li>";}//показываем ссылки на следующие страницы
	}
}
elseif ($np>($kolstr-5))
{
for ($s=($kolstr-9);$s<=($kolstr-1);$s++)
	{
	if ($s==$np)
	{echo "<li><a id='pres_ref' href='show-$url_product-$url_category-$s.html'>$s</a></li>";}//текущая страница
	else 
	{echo "<li><a id='ref' href='show-$url_product-$url_category-$s.html'>$s</a></li>";}//показываем ссылки на следующие страницы
	}
}
}
else
{
for ($s=2;$s<=$kolstr;$s++)
	{
	if ($s==$np)
	{echo "<li><a id='pres_ref' href='show-$url_product-$url_category-$s.html'>$s</a></li>";}//текущая страница
	else 
	{echo "<li><a id='ref' href='show-$url_product-$url_category-$s.html'>$s</a></li>";}//показываем ссылки на следующие страницы
	}

}
$idnp='ref';
if ($np==$kolstr) {$idnp='pres_ref';}
if ($kolstr>10)
{echo "&nbsp;&nbsp;<li><a id='".$idnp."' href='show-$url_product-$url_category-$kolstr.html'>$kolstr</a></li>";}
echo "</ul></div>";	



/*	echo "<table width='800' border='1' bgcolor='#ddddff' cellpadding='0' cellspacing='0'>
			<tr><td><br />
<div class='comment'>* - бесплатная доставка действует для центральных регионов России при заказе фотоштор:<br />
&nbsp;&nbsp;&nbsp;- из материалов Блэкаут, Сатен, Атлас и Вуаль  на сумму превышающую 5000 руб.;<br />
&nbsp;&nbsp;&nbsp;- из материала Габардин на сумму превышающую 4500 руб.;</div><br />

			</td></tr></table>";*/


			
	echo "<br />";	
?>
