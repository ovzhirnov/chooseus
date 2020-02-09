<?php
session_start(); 
Header("HTTP/1.0 200 OK");
//Header("Status: 200");
//Header("Last-Modified: ".gmdate("D, M d Y H:i:s",filemtime(basename($_SERVER['PHP_SELF'])))." GMT");
Header("Last-Modified: ".gmdate("D, M d Y H:i:s")." GMT");
Header("Connection: close");
require ('config.php');
			
/*				$zapros = parse_url($_SERVER['REQUEST_URI']);
				$zapros=str_replace(".html","",$zapros['path']);
				$zapr = preg_split ("/-/", $zapros);
*/
				$zapr[0]=$_GET['zapr0'];
				$zapr[1]=$_GET['zapr1'];
				$zapr[2]=$_GET['zapr2'];
				$zapr[3]=$_GET['zapr3'];

				$do=$zapr[0];
				$url_product=$zapr[1];
				$url_category=$zapr[2];
				$np=$zapr[3];

				
				if ($zapr[0]=="/show" || $zapr[0]=="/snow")
					{
					switch ($url_category)
{
case 'kitchen': $categ='Для кухни'; break;
case 'city': $categ='Города мира'; break;
case 'art': $categ='Арт'; break;
case 'nature': $categ='Природа'; break;
case 'flowers': $categ='Цветы'; break;
case 'animals': $categ='Животные'; break;
case 'cartoons': $categ='Для детской'; break;
case 'all': $categ=''; break;
case 'uzori': $categ='Узоры'; break;
case 'venzel': $categ='Вензель'; break;
case 'geometry': $categ='Геометрия'; break;
case 'kitch': $categ='Кухня'; break;
case 'polosi': $categ='Полосы'; break;
case 'provans': $categ='Прованс'; break;
case 'kletigor': $categ='Клетка и горошек'; break;
case 'sredizemnom': $categ='Средиземноморские'; break;
case 'classic': $categ='Классические'; break;
case 'newyear': $categ='Новогодние'; break;
} 
if ($url_product=='pokrivala')
{$product="Фотопокрывало"; $h1product="Фотопокрывала";}
if ($url_product=='tuli')
{$product="Фототюль"; $h1product="Фототюли";}
if ($url_product=='shtory')
{$product="Фотошторы"; $h1product="Фотошторы";}
if ($url_product=='rimshtory')
{$product="Римские Фотошторы"; $h1product="Римские Фотошторы";}
if ($url_product=='shtoryclassic')
{$product="Шторы"; $h1product="Шторы";}

					$titl=$h1product." ".$categ."-".$np." купить в интернет магазине недорого со скидкой";
					$descr=$h1product." ".$categ."-".$np.", купить ".$h1product." - ".$np." в интернет магазине недорого со скидкой";
					$keyw=$h1product." ".$categ."-".$np.", купить ".$h1product." - ".$np." в интернете, в интернет-магазине со скидкой, недорого";

					}
				if ($zapr[0]=="/product_info" | !$zapr[3])
					{
					$url_product=$zapr[1];
					$do=$zapr[2];
					if ($url_product=='?')  // НА время переиндексации новых url страниц с товарами
					{
					$sql = "SELECT * FROM shtory WHERE ID='".$do."'
					UNION
					SELECT * FROM pokrivala WHERE ID='".$do."'
					UNION
					SELECT * FROM tuli WHERE ID='".$do."'
					UNION
					SELECT * FROM rimshtory WHERE ID='".$do."'
					";						
					}
					else
					{
					$table_name = $url_product;
					$sql = "SELECT * FROM ".$table_name." WHERE ID='".$do."'";
					}
					$q=Mysql_query($sql, $conn)  or die("Запрос не выполнен!");
					$row=Mysql_fetch_array($q);
					
							$ID=$row['ID'];
							$name=$row['name'];
							$product=$row['product'];
							$category=$row['category'];
							$about=$row['about'];
							$picture=$row['picture'];
					
switch ($product)
{
case 'Фотошторы': $canonicalprod='shtory'; break;
case 'Фототюль': $canonicalprod='tuli'; break;
case 'Фотопокрывало': $canonicalprod='pokrivala'; break;
case 'Римские Фотошторы': $canonicalprod='rimshtory'; break;
}

					$titl=$product." ".$name." ".$category." купить в интернет магазине недорого со скидкой";
					$descr=$product." ".$name." ".$category." купить в интернет магазине недорого со скидкой";
					$keyw=$product." ".$name.", купить ".$product.", ".$name." ".$category." в интернете, в интернет-магазине, со скидкой, недорого";
					}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?php echo $titl; ?></title>
<meta name="title" content='<?php echo $titl; ?>' />
<META http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<META name="description" content="<?php echo $descr; ?>">
<META name="keywords" content="<?php echo $keyw; ?>">
<meta name="revisit-after" content="7 day">
<META content="index, follow" name="robots">
<link href="style.css" type="text/css" rel="stylesheet">
<?php
//if ($zapr[0]=="/show" || $zapr[0]=="/snow") {echo "<link rel=\"canonical\" href=\"http://chooseus.ru/show-$url_product-$url_category-$np.html\" />";} 
?>
<?php
//if ($zapr[0]=="/product_info" && $canonicalprod) {echo "<link rel=\"canonical\" href=\"http://chooseus.ru/product_info-$canonicalprod-$ID.html\" />";} 
?>
<script type="text/javascript" src="jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="show_block.js"></script>
<script type="text/javascript" src="valid.js"></script>
</head>


<body>
<div align="center">
	<?php require ("header.php"); ?>
	<table border="0" cellpadding="0" cellspacing="0" align="center">	
			<tr><td width="200" valign="top">
				<?php require ("basic_menu.php"); ?>
			</td>
		
			<td width="800" valign="top">
			<?php 
/*				$zapros = parse_url($_SERVER['REQUEST_URI']);
				$zapros=str_replace(".html","",$zapros['path']);
				$zapr = preg_split ("/-/", $zapros);
*/
				$do=$zapr[0];
				$url_product=$zapr[1];
				$url_category=$zapr[2];
				$np=$zapr[3];
				if ((!$zapr[0]) | (!$zapr[1]))
				{
				echo "<noindex><center><h1>ДАННЫЙ ЗАПРОС НЕ ВЫПОЛНЕН</h1></center></noindex>";	
				}
				else
				{
				if ($zapr[0]=="/show" || $zapr[0]=="/snow")
					{
					require ("presents.php");
					}
				if ($zapr[0]=="/product_info")
					{
					$url_product=$zapr[1];
					$do=$zapr[2];
					require ("product.php");
					}
				}
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
