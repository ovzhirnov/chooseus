<?php   //��������: 
		//$np-����� ��������, 
		//$product-�������, 
		//$url_product-������� � url
		//$h1product-������� ��� ����������, 
		//$categ-���������
		//$url_category-��������� � url

$table_name = $url_product;
$sql = "SELECT * FROM ".$table_name." WHERE product='".$product."' AND category='".$categ."'"; //������� SQL ������
if ($categ == '')
{$sql = "SELECT * FROM ".$table_name." WHERE product='".$product."'";}
$q=Mysql_query($sql, $conn) or die(); //���������� ������ �� ������
$ke=Mysql_num_rows($q); //���������� ��������� � ���� c ������ ����������
$ks=10; //���������� ��������� �� ��������

	echo "<div class='title_mnu'><h1>".$h1product." ".$categ."-".$np."</h1></div>";

if ($product == '��������')
	{
	echo "<div class='blog_tul'>�������� � ����� ������������ ����� ��� �� �������� �� <b>�������� ��������</b>,<br />������ �������� - <b>�����</b> � ������ ������ ������� �� ����� 1,45�.
	<br /><br /></div>";
	echo "<div class='title_mnu'></div>";
	}
	
	
//echo "<br /><div class='akcija-text'>���������� �����: ���������� �������� *</div>";
	
	
	$r=1;
						while ($zap = mysql_fetch_array($q))
						{
							$ID=$zap['ID'];
							$a[$r]=$ID;//������� ������ $a[] �� ������� ����� � ������ ������
							$r++;
						}
	$ke=$r-1;
	$beg_row=($np-1)*$ks; //���������� ������
	$end_row=$np*$ks;   //� ����� �������
		if ($end_row>$r-1){$end_row=$r-1;}//����� ������� �� ��������� ��������
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
$size='1.5� x 2.5�';
if ($product=='���������' && $category=='��� �����'){$size='1� x 1.5�';$new_price=$new_price_kitchen;$old_price=$new_price+ceil($new_price*0.1/10) * 10;}
if ($product=='�����' && $category=='�����'){$size='1� x 1.5�';$new_price=$new_price_kitchen;$old_price=$new_price+ceil($new_price*0.1/10) * 10;}
if ($product=='�������������'){$size='1.55� x 2.15�';$new_price=$new_price_pokrivala;$old_price=$new_price+ceil($new_price*0.2/10) * 10;}
if ($product=='��������'){$size='1.45� x 2.5�';$new_price=$new_price_tuli;$old_price=$new_price+ceil($new_price*0.1/10) * 10;}
if ($product=='������� ���������'){$size='0.6� x 1.7�';$new_price=$new_price_rimshtory;$old_price=$new_price+ceil($new_price*0.1/10) * 10;}
echo "<br /><table width='800' border='1' cellpadding='0' cellspacing='0'><tr><td class='title_mnu'></td></tr></table>";
		echo "<table border='1' cellpadding='0' cellspacing='0'><tr><td width='400' align='center'>";
		echo "<a href='javascript:void(0);'><img src='$picture' width='400' onclick=\"open_pop_up('#pic$ID');\" class='zoomin' title='$product $name' border='0'></a></td>";
		echo "<td width='400' bgcolor='#ddddff' class='about_films'>";
			echo "<div class='blinds_name'>".$name."</div><br>";
			echo $product.":&nbsp;<b>".$name."</b><br>";
			echo "������ ����:&nbsp;<font style='text-decoration:line-through;'><b>".$old_price."</b> ���.</font><br>";
			echo "����� ����:&nbsp;<font color='#FF0000'><b>".$new_price."</b> ���.</font><br /><br /><br />";
			echo "<center><a href='product_info-$url_product-$ID.html' title='�������� $product $name'>���������� / ��������</a></center>";
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
		<div id='pic$ID' class='show_big_img'><img src='$picture' height='720' onclick=\"close_pop_up('#pic$ID');\"><img src='images/close_btn.png' id='img_close_btn' onclick=\"close_pop_up('#pic$ID');\"></div>
		";
							
				$beg_row++;
	}

echo "<div class='prod_about' style='text-align:center;'>�� ������ �������� ������������ $h1product $categ-$np ������ ������������. <br />��� �������� � �������� ������ � ���������� ������ �� $h1product, ���������� �������� ���������� ����������� ������ �� ������ - <font color=\"#990000\">���������� / ��������.</font></div>";

// ������� ���������� ��������� ������� � ����������� �� ���������� ���������
$kolstr=ceil($ke/$ks); //���������� �������, ����������� �� ���������� ������ �����

// ���������� ������ �� ��� ��������
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
	{echo "<li><a id='pres_ref' href='show-$url_product-$url_category-$s.html'>$s</a></li>";}//������� ��������
	else 
	{echo "<li><a id='ref' href='show-$url_product-$url_category-$s.html'>$s</a></li>";}//���������� ������ �� ��������� ��������
	}
}
elseif ($np<6)
{
for ($s=2;$s<=10;$s++)
	{
	if ($s==$np)
	{echo "<li><a id='pres_ref' href='show-$url_product-$url_category-$s.html'>$s</a></li>";}//������� ��������
	else 
	{echo "<li><a id='ref' href='show-$url_product-$url_category-$s.html'>$s</a></li>";}//���������� ������ �� ��������� ��������
	}
}
elseif ($np>($kolstr-5))
{
for ($s=($kolstr-9);$s<=($kolstr-1);$s++)
	{
	if ($s==$np)
	{echo "<li><a id='pres_ref' href='show-$url_product-$url_category-$s.html'>$s</a></li>";}//������� ��������
	else 
	{echo "<li><a id='ref' href='show-$url_product-$url_category-$s.html'>$s</a></li>";}//���������� ������ �� ��������� ��������
	}
}
}
else
{
for ($s=2;$s<=$kolstr;$s++)
	{
	if ($s==$np)
	{echo "<li><a id='pres_ref' href='show-$url_product-$url_category-$s.html'>$s</a></li>";}//������� ��������
	else 
	{echo "<li><a id='ref' href='show-$url_product-$url_category-$s.html'>$s</a></li>";}//���������� ������ �� ��������� ��������
	}

}
$idnp='ref';
if ($np==$kolstr) {$idnp='pres_ref';}
if ($kolstr>10)
{echo "&nbsp;&nbsp;<li><a id='".$idnp."' href='show-$url_product-$url_category-$kolstr.html'>$kolstr</a></li>";}
echo "</ul></div>";	



/*	echo "<table width='800' border='1' bgcolor='#ddddff' cellpadding='0' cellspacing='0'>
			<tr><td><br />
<div class='comment'>* - ���������� �������� ��������� ��� ����������� �������� ������ ��� ������ ��������:<br />
&nbsp;&nbsp;&nbsp;- �� ���������� �������, �����, ����� � �����  �� ����� ����������� 5000 ���.;<br />
&nbsp;&nbsp;&nbsp;- �� ��������� �������� �� ����� ����������� 4500 ���.;</div><br />

			</td></tr></table>";*/


			
	echo "<br />";	
?>
