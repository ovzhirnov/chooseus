<table width="195" border="0" cellpadding="0" cellspacing="0">
<tr><td class="title_mnu">О магазине</td></tr>
	<tr><td class="menu_r">
    <ul>
	<li><a href="/about.html" title="О нас">О нас</a></li>
	<li><a href="/how-to-buy.html" title="Как купить">Как купить</a></li>
	<li><a href="/send-and-pay.html" title="Доставка и оплата">Доставка и оплата</a></li>
    </ul>
    </td></tr> 
</table>
 <br /><br />
<table align="center" width="200" border="0" cellpadding="0" cellspacing="0">
<tr><td class="title_mnu">Информация</td></tr>
	<tr><td class="menu_r">
    <ul>
	<li><a href="/materials.html" title="О тканях">о тканях</a></li>
    </ul>
    <br /><br />
    </td></tr> 
<tr><td class="title_mnu">Отзывы</td></tr>
<tr><td>
<?php
$conn1 = Mysql_connect("localhost", "nlijumml_zovcho", "14zov09choose14")
or die("Невозможно установить соединение с базой данных: ". Mysql_error());
$database1="nlijumml_chooseus";
$table_name1="otzivi";
	$sql1 = "SELECT * FROM ".$table_name1." WHERE `status` = 1 LIMIT 3";
	$q1=Mysql_query($sql1, $conn1) or die("Запрос не выполнен!"); //отправляем запрос на сервер
				echo "<div class='otzivi-rightcol'>";
                        while ($zap = mysql_fetch_array($q1))
						{
							$ID=$zap['ID'];
							$pername=$zap['pername'];
							$profession=$zap['profession'];
							$city=$zap['city'];
							$textotziva=substr ($zap['textotziva'],0,110);
							$data=$zap['data'];

				
				echo "<div id='otz_data'>".$data."</div>
				<b>".$pername."</b>";
                
                echo "<br /><br />".$textotziva."...<br /><br />";
						}
                echo "</div>";
?>
</td></tr>
	<tr><td class="menu_r">
    <ul>
	<li><a href="/otzivi.html" title="Смотреть отзывы">все отзывы</a></li>
    </ul>
    <br /><br />
    </td></tr> 
<tr><td class="title_mnu">Поиск по названию</td></tr>
<tr><td align="center">
	<form name="searchform" method="post" action="search.php">
    	<input type="text" size="24" name="searchstring" pattern=".{3,}">
<input type="image" src="images/lens.png" title="поиск" style="margin:0 0 -6px 0;" />
    </form>
</td></tr>
</table>
