<?php //изменение кодировки на UTF-8
if ($product=="Ôîòîïîêðûâàëî")
{
?>
<script language="javascript" type="text/javascript">
function changepricepokr()
{

		var mater = $('input[name="material"]:checked').val();
		var cena = $('input[name="razmer"]:checked').val();

		$('#material').val(mater);
		$('#cena').val(cena);
}
</script>

<br />
<div style="color:#930; font-size:16px;"><b>Âûáåðèòå ìàòåðèàë ôîòîïîêðûâàëà:</b></div><br />
<input type="radio" name='material' value="Àòëàñ" onchange="changepricepokr();"/> Àòëàñ <input type="radio" name='material' value="Ñàòåí" onchange="changepricepokr();" /> Ñàòåí <input type="radio" name='material' value="Ãàáàðäèí" onchange="changepricepokr();" /> Ãàáàðäèí<br /><br />
<div style="color:#930; font-size:16px;"><b>Âûáåðèòå ðàçìåðû ôîòîïîêðûâàëà:</b></div><br />
<input type="radio" name='razmer' value="150ñì õ 215ñì - 3000" onchange="changepricepokr();"/> 150ñì õ 215ñì - <div id="price-pokr">3000&nbsp;ðóá.</div><br />
<input type="radio" name='razmer' value="175ñì õ 215ñì - 3900" onchange="changepricepokr();"/> 175ñì õ 215ñì - <div id="price-pokr">4000&nbsp;ðóá.</div><br />
<input type="radio" name='razmer' value="215ñì õ 240ñì - 4200" onchange="changepricepokr();"/> 215ñì õ 240ñì - <div id="price-pokr">4300&nbsp;ðóá.</div><br />
<br /><br />
<?php 
}

elseif ($product=="Ðèìñêèå Ôîòîøòîðû")
{
$row = 1;
$handle = fopen("prices/opt-rimblackout.csv", "r");
while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) 
	{
    $num = count($data);
    for ($col=0; $col < $num; $col++) {
		$dat[$row][($col+1)]=$data[$col];
    }
	$row++;
}
fclose($handle);

$row = 101;
$handle = fopen("prices/opt-rimgabardin.csv", "r");
while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) 
	{
    $num = count($data);
    for ($col=0; $col < $num; $col++) {
		$dat[$row][($col+1)]=$data[$col];
    }
	$row++;
}
fclose($handle);

$row = 201;
$handle = fopen("prices/opt-rimatlas.csv", "r");
while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) 
	{
    $num = count($data);
    for ($col=0; $col < $num; $col++) {
		$dat[$row][($col+1)]=$data[$col];
    }
	$row++;
}
fclose($handle);
?>
<script language="javascript" type="text/javascript">
function changeprice_rim()
{
	var nacenka = 1000;
		var mater = $('#MaterShtor_rim').val();
		var shirina = $('#ShirinaShtor_rim').val();
		var visota = $('#VisotaShtor_rim').val();
		dat = <?php echo json_encode( $dat ); ?>;

		if (mater=='Ãàáàðäèí')
		{shirina = Number(shirina) + 100;}

		if (mater=='Àòëàñ')
		{shirina = Number(shirina) + 200;}


		var shi=$(':selected','#ShirinaShtor_rim').text();
		var vi=$(':selected','#VisotaShtor_rim').text();
		$('#material').val(mater);
		$('#shir').val(shi);
		$('#vis').val(vi);
		tsena=parseInt(dat[shirina][visota])+parseInt(nacenka);
		$('#cena').val(tsena);
		
		var endprice="Öåíà:&nbsp;"+tsena+"&nbsp;ðóá.";
		document.getElementById("price").innerHTML=(endprice);
}
</script>
<br />
<div style="color:#930; font-size:16px;"><b>
Âûáåðèòå ìàòåðèàë è ðàçìåðû<br />ðèìñêèõ ôîòîøòîð:
</b></div><br />
<table border="0" cellpadding="0" cellspacing="0" width="400"><tr><th>Ìàòåðèàë</th><th>Øèðèíà</th><th>Âûñîòà</th></tr>
		<tr>
        <td width="150" align="center" style="padding-left:10px;">
        <div class="SKU_Mater">
                <select class="MaterShtor" id="MaterShtor_rim" onchange="changeprice_rim();">
                  <option class="Mater" value="Áëýêàóò" style="display: block;">Áëýêàóò</option> 
                  <option class="Mater" value="Àòëàñ" style="display: block;">Àòëàñ</option> 
                  <option class="Mater" value="Ãàáàðäèí" selected="selected" style="display: block;">Ãàáàðäèí</option>                 
                </select>
            </div>
        </td>
        <td width="140" align="center"><div style="float:left; padding-left:20px;"></div>
            <div class="SKU">
                  <select  class="ShirinaShtor" id="ShirinaShtor_rim" onchange="changeprice_rim();">
                         <option class="shirina" selected="selected" value="1" style="display: block;">0.6 ì</option>                    
                         <option class="shirina"  value="2" style="display: block;">0.8 ì</option>                     
                         <option class="shirina"  value="3" style="display: block;">1.0 ì</option>                       
                         <option class="shirina"  value="4" style="display: block;">1.2 ì</option>
                         <option class="shirina"  value="5" style="display: block;">1.4 ì</option>
                </select>
            </div>
        </td>
        <td width="110" align="center">
            <div class="SKU">
                <select class="VisotaShtor" id="VisotaShtor_rim" onchange="changeprice_rim();">
                    <option class="visota"  selected="selected" value="1" style="display: block;">1.7 ì</option>
                </select>
            </div>
        </td>
</tr></table>
<br />
<div id="price"></div><br />
<div id="freesell" class="freesell">&nbsp;</div>

	<script language="javascript" type="text/javascript">
	changeprice_rim();
	</script>

<?php }

else  //ôîòîøòîðû
{
$row = 1;
$handle = fopen("prices/opt-blackout.csv", "r");
while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
    $num = count($data);
    for ($col=0; $col < $num; $col++) {
		$dat[$row][($col+1)]=$data[$col];
    }
	$row++;
}
fclose($handle);

$row = 101;
$handle = fopen("prices/opt-gabardin.csv", "r");
while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
    $num = count($data);
    for ($col=0; $col < $num; $col++) {
		$dat[$row][($col+1)]=$data[$col];
    }
	$row++;
}
fclose($handle);

$row = 201;
$handle = fopen("prices/opt-atlas.csv", "r");
while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
    $num = count($data);
    for ($col=0; $col < $num; $col++) {
		$dat[$row][($col+1)]=$data[$col];
    }
	$row++;
}
fclose($handle);

$row = 301;
$handle = fopen("prices/opt-saten.csv", "r");
while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
    $num = count($data);
    for ($col=0; $col < $num; $col++) {
		$dat[$row][($col+1)]=$data[$col];
    }
	$row++;
}
fclose($handle);

$row = 401;
$handle = fopen("prices/opt-shifon.csv", "r");
while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
    $num = count($data);
    for ($col=0; $col < $num; $col++) {
		$dat[$row][($col+1)]=$data[$col];
    }
	$row++;
}
fclose($handle);
?>
<script language="javascript" type="text/javascript">
function changeprice()
{
	var nacenka = 1000;
		var mater = $('#MaterShtor').val();
		var shirina = $('#ShirinaShtor').val();
		var visota = $('#VisotaShtor').val();
		dat = <?php echo json_encode( $dat ); ?>;

		if (mater=='Ãàáàðäèí')
		{visota = Number(visota) + 100;}

		if (mater=='Àòëàñ')
		{visota = Number(visota) + 200;}

		if (mater=='Ñàòåí')
		{visota = Number(visota) + 300;}

		if (mater=='Âóàëü')
		{visota = Number(visota) + 400;}

//		document.getElementById("material").value = mater;


		var shi=$(':selected','#ShirinaShtor').text();
		var vi=$(':selected','#VisotaShtor').text();
		$('#material').val(mater);
		$('#shir').val(shi);
		$('#vis').val(vi);
//		$('#cena').toString(parseInt(dat[visota][shirina])+parseInt(nacenka));
		var tsena=parseInt(dat[visota][shirina])+parseInt(nacenka);
		/*if (mater=='Ãàáàðäèí') {var tsena=(parseInt(dat[visota][shirina])*0.85+parseInt(nacenka)).toFixed();}*/
		$('#cena').val(tsena);
		var endprice="Öåíà:&nbsp;"+tsena+"&nbsp;ðóá.";
		if (mater=='Âóàëü' && shi=='1.5 ì') {endprice="<font size='4'>Èçìåíèòå øèðèíó - íå áîëåå 1,45 ì.</font>"}
		document.getElementById("price").innerHTML=(endprice);

/*		if (mater=='Áëýêàóò' && tsena>=5000 || mater=='Ñàòåí' && tsena>=5000 || mater=='Àòëàñ' && tsena>=5000 || mater=='Ãàáàðäèí' && tsena>=4500 || mater=='Âóàëü' && tsena>=4980)
		{	
		frees="Áåñïëàòíàÿ äîñòàâêà *";
		document.getElementById("freesell").innerHTML=(frees);
		}
			else 
					{
					frees="&nbsp;";
					document.getElementById("freesell").innerHTML=(frees);
					}*/

}
</script>
<br />
<div style="color:#930; font-size:16px;"><b>
<?php 
if ($product=="Ôîòîòþëü") {echo "Âûáåðèòå ðàçìåðû ôîòîòþëè:";}
elseif ($product=="Øòîðû") {echo "Âûáåðèòå ìàòåðèàë è ðàçìåðû øòîð:";}
else {echo "Âûáåðèòå ìàòåðèàë è ðàçìåðû ôîòîøòîð:";}
?>
</b></div><br />
<table border="0" cellpadding="0" cellspacing="0" width="400"><tr><th>Ìàòåðèàë</th><th>Øèðèíà</th><th>Âûñîòà</th></tr>
		<tr>
        <td width="150" align="center" style="padding-left:10px;">
        <div class="SKU_Mater">
                <select class="MaterShtor" id="MaterShtor" onchange="changeprice();">
<?php  if ($product=="Ôîòîòþëü") { ?>
                  <option class="Mater" value="Âóàëü" style="display: block;">Âóàëü</option> 
<?php }
else { ?>
                  <option class="Mater" value="Áëýêàóò" style="display: block;">Áëýêàóò</option> 
                  <option class="Mater" value="Àòëàñ" style="display: block;">Àòëàñ</option> 
                  <option class="Mater" value="Ãàáàðäèí" selected="selected" style="display: block;">Ãàáàðäèí</option>                 
                  <option class="Mater" value="Ñàòåí" style="display: block;">Ñàòåí</option>
                  <option class="Mater" value="Âóàëü" style="display: block;">Âóàëü</option>                 
            <?php } ?>
                </select>
            </div>
        </td>
        <td width="140" align="center"><div style="float:left; padding-left:20px;">2&nbsp;x</div>
            <div class="SKU">
                  <select  class="ShirinaShtor" id="ShirinaShtor" onchange="changeprice();">
                         <option class="shirina"  value="1" style="display: block;">1.0 ì</option>                      
                         <option class="shirina"  value="2" style="display: block;">1.05 ì</option>                     
                         <option class="shirina"  value="3" style="display: block;">1.1 ì</option>                       
                         <option class="shirina"  value="4" style="display: block;">1.15 ì</option>
                         <option class="shirina"  value="5" style="display: block;">1.2 ì</option>
                         <option class="shirina"  value="6" style="display: block;">1.25 ì</option>
                         <option class="shirina"  value="7" style="display: block;">1.3 ì</option> 
                         <option class="shirina"  value="8" style="display: block;">1.35 ì</option>
                         <option class="shirina"  value="9" style="display: block;">1.4 ì</option>
<?php  if ($product=="Ôîòîòþëü") { ?>
                         <option class="shirina" selected="selected" value="10" style="display: block;">1.45 ì</option>
<?php }
else { ?>
                         <option class="shirina"  value="10" style="display: block;">1.45 ì</option>
                         <option class="shirina" selected="selected" value="11" style="display: block;">1.5 ì</option>  
            <?php } ?>
                </select>
            </div>
        </td>
        <td width="110" align="center">
            <div class="SKU">
                <select class="VisotaShtor" id="VisotaShtor" onchange="changeprice();">
                    <option class="visota" value="1" style="display: block;">1.5 ì</option>
                    <option class="visota" value="2" style="display: block;">1.55 ì</option>
                    <option class="visota" value="3" style="display: block;">1.6 ì</option>
                    <option class="visota" value="4" style="display: block;">1.65 ì</option>
                    <option class="visota" value="5" style="display: block;">1.7 ì</option>
                    <option class="visota" value="6" style="display: block;">1.75 ì</option>
                    <option class="visota" value="7" style="display: block;">1.8 ì</option>
                    <option class="visota" value="8" style="display: block;">1.85 ì</option>
                    <option class="visota" value="9" style="display: block;">1.9 ì</option>
                    <option class="visota" value="10" style="display: block;">1.95 ì</option>
                    <option class="visota" value="11" style="display: block;">2 ì</option>
                    <option class="visota" value="12" style="display: block;">2.05 ì</option>
                    <option class="visota" value="13" style="display: block;">2.1 ì</option>
                    <option class="visota" value="14" style="display: block;">2.15 ì</option>
                    <option class="visota" value="15" style="display: block;">2.2 ì</option>
                    <option class="visota" value="16" style="display: block;">2.25 ì</option>
                    <option class="visota" value="17" style="display: block;">2.3 ì</option>
                    <option class="visota" value="18" style="display: block;">2.35 ì</option>
                    <option class="visota" value="19" style="display: block;">2.4 ì</option>
                    <option class="visota" value="20" style="display: block;">2.45 ì</option>
                    <option class="visota" selected="selected" value="21" style="display: block;">2.5 ì</option>
                    <option class="visota" value="22" style="display: block;">2.55 ì</option>
                    <option class="visota" value="23" style="display: block;">2.6 ì</option>
                    <option class="visota" value="24" style="display: block;">2.65 ì</option>
                    <option class="visota" value="25" style="display: block;">2.7 ì</option>
                    <option class="visota" value="26" style="display: block;">2.75 ì</option>
                    <option class="visota" value="27" style="display: block;">2.8 ì</option>
                    <option class="visota" value="28" style="display: block;">2.85 ì</option>
                    <option class="visota" value="29" style="display: block;">2.9 ì</option>
                    <option class="visota" value="30" style="display: block;">2.95 ì</option>
                    <option class="visota" value="31" style="display: block;">3 ì</option>
                    <option class="visota" value="32" style="display: block;">3.05 ì</option>
                    <option class="visota" value="33" style="display: block;">3.1 ì</option>
                    <option class="visota" value="34" style="display: block;">3.15 ì</option>
                    <option class="visota" value="35" style="display: block;">3.2 ì</option>
                    <option class="visota" value="36" style="display: block;">3.25 ì</option>
                    <option class="visota" value="37" style="display: block;">3.3 ì</option>
                    <option class="visota" value="38" style="display: block;">3.35 ì</option>
                    <option class="visota" value="39" style="display: block;">3.4 ì</option>
                    <option class="visota" value="40" style="display: block;">3.45 ì</option>
                    <option class="visota" value="41" style="display: block;">3.5 ì</option>
                </select>
                
            </div>
        </td>
</tr></table>
<br />
<div id="price"></div><br />
<div id="freesell" class="freesell">&nbsp;</div>
<?php  
if ($category=="Äëÿ êóõíè" || $category=="Êóõíÿ")
{ ?>
	<script language="javascript" type="text/javascript">
	$("#ShirinaShtor option[value='1']").prop("selected", true);
	$("#VisotaShtor option[value='1']").prop("selected", true);
	</script>
<?php }
?>
	<script language="javascript" type="text/javascript">
	changeprice();
	</script>
<?php }
?>

