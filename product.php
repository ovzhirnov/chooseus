<?php 	//��������: 
		//$do - ����� ������ ���� � ���������� �����������
		//$np-����� ��������, 
		//$product-�������,
		//$name - ��������, 
		//$url_product-������� � url
		//$h1product-������� ��� ����������, 
		//$categ-���������
		//$url_category-��������� � url
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
			echo "<a href='javascript:void(0);' onclick=\"open_pop_up('#makeorder');\" title='�������� $product $name' ><img src='images/make_order.png'></a>";
			echo "<br /><br /></td>";
			echo "<td width='400' bgcolor='#ddddff' class='about_films'>";
			echo "<div class='blinds_name'>".$name."</div>";
			echo "<div class='prod_about'><h1>$product: ".$name."</h1>";
			echo "".$about."</div>";
if ($product=="�������������") 
			{			
			echo "<div class='prod_about'><center>���������� <b>���������� - ����������</b>:</center></div>";
			echo "<table width='380' border='0' cellpadding='0' cellspacing='0' bgcolor='#ddddff'><tr><td width='190' align='center'>";
			echo "<img src='images/pokrivalo-ultrastep.jpg' height='90' onclick=\"open_pop_up('#pokr1');\" class='zoomin' title='���������� - ����������' border='0'>";
			echo "</td><td align='center'>";
			echo "<img src='images/pokrivalo-ultrastep-obr.jpg' height='90' onclick=\"open_pop_up('#pokr2');\" class='zoomin' title='���������� - ����������' border='0'>";
			echo "</td></tr></table>";
			}
			echo "</td></tr>";
			echo "<tr><td colspan='2' bgcolor='#ddddff' class='prod_about' style='text-align:justify;'>";

			echo "&nbsp;&nbsp;����� ������ $product \"$name\" ��������, �������� ������ �������, ��������, � �� ������� ������������� ���� �� ������� �� $product ��� ��������� ��������.</br> ����� ������� ������ ���������� ������ � ��������� ������ �� $product \"$name\", ��� �������������, ��������� ������ � ������������ � ������ $product \"$name\" ��������.</br>
����� ��������� ����� ����� ���������� ������ �� $product � ����, �� ���������� � ������ ��������, �������� ��� �������� ��� ������������� ������ �� $product \"$name\", ������� ��� ������, � ����� ������� ������ � ������� ��������.</br>
����� �������������, ��� ����� � $product ���������� � ������������. ����� ������������ ��������, ����, �������� � 3-4 ������� ���, � ������� �������� � ������������ � 5-7 ������� ����.</br>
�� ��������� ������������, ��� ����� $product \"$name\" ����� ��� ��������� �������� ������� ��� ��� ��������, � ��� �� �������� ��� � SMS-���������.</br></br>
<center>�������� ��� �������!</center>";
	
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
$ke=Mysql_num_rows($q); //���������� �������� ��������� � ����
if ($ke>1) 
{
	$sch=1;
	echo "<table width='798' border='1' bgcolor='#ddddff' align='center' cellpadding='0' cellspacing='0'><tr><td>";
	echo "<center><div style=\"color:#930; font-size:15px;\"><br />�������� ��� ��� �� ������������:</div></center><br /></td></tr>";
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
case '���������': $prod='shtory'; break;
case '��������': $prod='tuli'; break;
case '�������������': $prod='pokrivala'; break;
case '������� ���������': $prod='rimshtory'; break;
case '�����': $prod='shtoryclassic'; break;
}

	if ($sch>3) {$sch=1; echo "</tr><tr>";}
	echo "<td width='266' class='dop_page_pic'><a href='/product_info-$prod-$dopID.html'><img src='$doppicture' width='250' title='�������� $dopproduct $dopname' id='main_img".$sch."' onmouseover='mainpicover(this.id);' onmouseout='mainpicout(this.id);'/><br />$dopproduct $dopname</a></td>";
	$sch++;
							}
						}
	echo "</tr></table>";
	echo "</td></tr></table>";
}

/*	echo "<table width='800' border='1' bgcolor='#ddddff' cellpadding='0' cellspacing='0'>
			<tr><td><br />
<div class='comment'>* - ���������� �������� ��������� ��� ����������� �������� ������ ��� ������ ��������:<br />
&nbsp;&nbsp;&nbsp;- �� ���������� �������, �����, ����� � ����� �� ����� ����������� 5000 ���.;<br />
&nbsp;&nbsp;&nbsp;- �� ��������� �������� �� ����� ����������� 4500 ���.;</div><br />

			</td></tr></table>";*/


			
	echo "<br />";	

		
		
$_SESSION['order']='true order';	
?>

<div id="makeorder"><img src="images/close_btn.png" id="close_btn" onclick="close_pop_up('#makeorder');"><hr /><center><b>�������� ������ � �� �������� � ���� ��� ������������� ������:<br /><?php echo $product." - ".$name; ?></b></center><br />
                        <form name="formazakaz" action="sent.html" method="post" onsubmit="return validate_form1 ();" class="formazakaza">
                        <div class="FormFio">
                            <input name="FormFio1" pattern=".{2,}" class="name" placeholder="* �������, ���, ��������" type="text">
                        </div>
						 <div class="FormPhone">
                            <input name="FormPhone1" pattern=".{3,}" class="phone" placeholder="* ���������� �������" type="text"/>
                        </div>
                        <div class="FormMail">
                            <input name="FormMail1" pattern=".{1,}[@].{4,}" class="mail" placeholder="e-mail ��� �����������" type="text">
                        </div>
                        <div class="FormAddress">
                            <input name="FormAddress1" pattern=".{5,}" class="adress" placeholder="������ � ����� ��������" type="text">
                        </div>
                            <textarea rows='5' cols='28' name="zakazcomment" type="text" placeholder="������ �������� ����������� � ������(����. 140 ��������)" style="resize:none;"></textarea>
                        	<input name="name" type="hidden" value="<?php echo $name; ?>" />
                        	<input name="id" type="hidden" value="<?php echo $ID; ?>" />
<?php 
 $mat = '��������';
 if ($product=="��������") { $mat = '�����';}
 if ($product=="�������������") { $mat = '�����';}
?>
							<input id="product" name="product" type="hidden" value="<?php echo $product; ?>" />
							<input id="material" name="material" type="hidden" value="<?php echo $mat; ?>" />
 <?php if ($product<>"�������������") { ?>
  <?php if ($product=="��������")  { ?>
                             <input id="shir" name="shir" type="hidden" value="1.45 �" />
 <?php } elseif ($category=="��� �����" || $category=="�����") {?>                       
                            <input id="shir" name="shir" type="hidden" value="1 �" />
	<?php } elseif ($product=="������� ���������") {?>
    						<input id="shir" name="shir" type="hidden" value="0.6 �" />
    <?php } else {?>                       
                            <input id="shir" name="shir" type="hidden" value="1.5 �" />
	<?php } 
	if ($category=="��� �����" || $category=="�����") {	?>
    						<input id="vis" name="vis" type="hidden" value="1.5 �" />
    <?php } elseif ($product=="������� ���������") {?>
							<input id="vis" name="vis" type="hidden" value="1.7 �" />
		<?php } else { ?>
                            <input id="vis" name="vis" type="hidden" value="2.5 �" /> <?php } ?>
                            <?php } ?>
                            <input id="cena" name="cena" type="hidden" value="<?php echo $cen; ?>" />
                         <div class="knopka"><button type="submit" name="zakaz" >��������</button></div>
                        </form>
      
</div>
	<script language="javascript" type="text/javascript">
	changeprice();
	</script>
