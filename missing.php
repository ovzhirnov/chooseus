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
case 'kitchen': $categ='��� �����'; break;
case 'city': $categ='������ ����'; break;
case 'art': $categ='���'; break;
case 'nature': $categ='�������'; break;
case 'flowers': $categ='�����'; break;
case 'animals': $categ='��������'; break;
case 'cartoons': $categ='��� �������'; break;
case 'all': $categ=''; break;
case 'uzori': $categ='�����'; break;
case 'venzel': $categ='�������'; break;
case 'geometry': $categ='���������'; break;
case 'kitch': $categ='�����'; break;
case 'polosi': $categ='������'; break;
case 'provans': $categ='�������'; break;
case 'kletigor': $categ='������ � �������'; break;
case 'sredizemnom': $categ='�����������������'; break;
case 'classic': $categ='������������'; break;
case 'newyear': $categ='����������'; break;
} 
if ($url_product=='pokrivala')
{$product="�������������"; $h1product="�������������";}
if ($url_product=='tuli')
{$product="��������"; $h1product="��������";}
if ($url_product=='shtory')
{$product="���������"; $h1product="���������";}
if ($url_product=='rimshtory')
{$product="������� ���������"; $h1product="������� ���������";}
if ($url_product=='shtoryclassic')
{$product="�����"; $h1product="�����";}

					$titl=$h1product." ".$categ."-".$np." ������ � �������� �������� �������� �� �������";
					$descr=$h1product." ".$categ."-".$np.", ������ ".$h1product." - ".$np." � �������� �������� �������� �� �������";
					$keyw=$h1product." ".$categ."-".$np.", ������ ".$h1product." - ".$np." � ���������, � ��������-�������� �� �������, ��������";

					}
				if ($zapr[0]=="/product_info" | !$zapr[3])
					{
					$url_product=$zapr[1];
					$do=$zapr[2];
					if ($url_product=='?')  // �� ����� �������������� ����� url ������� � ��������
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
					$q=Mysql_query($sql, $conn)  or die("������ �� ��������!");
					$row=Mysql_fetch_array($q);
					
							$ID=$row['ID'];
							$name=$row['name'];
							$product=$row['product'];
							$category=$row['category'];
							$about=$row['about'];
							$picture=$row['picture'];
					
switch ($product)
{
case '���������': $canonicalprod='shtory'; break;
case '��������': $canonicalprod='tuli'; break;
case '�������������': $canonicalprod='pokrivala'; break;
case '������� ���������': $canonicalprod='rimshtory'; break;
}

					$titl=$product." ".$name." ".$category." ������ � �������� �������� �������� �� �������";
					$descr=$product." ".$name." ".$category." ������ � �������� �������� �������� �� �������";
					$keyw=$product." ".$name.", ������ ".$product.", ".$name." ".$category." � ���������, � ��������-��������, �� �������, ��������";
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
				echo "<noindex><center><h1>������ ������ �� ��������</h1></center></noindex>";	
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
