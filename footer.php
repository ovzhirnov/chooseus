<div class="footer">
<div class="footprint">
<a href='/' title="�� �������">* &copy; 2011 - <?php echo date('Y');?> ��������� - �������� ������� � ��������� �� ������ � ��� *</a>
</div>

<?php/*
if (strstr($zapros,'info-10'))
{echo "<a style='color:#666; font-size:0.7em; text-align:center;' target='_blank' title='������� ������ manyweb.ru' href='http://manyweb.ru/page_24_1.html'>������� ������� � ����� �� manyweb.ru, ����� ��������</a>";} 
if (strstr($zapros,'info-11'))
{echo "<a style='color:#666; font-size:0.7em; text-align:center;' target='_blank' title='������� ���������� ����� ���������� 495ru.ru' href='http://495ru.ru/'>��������� ���� ���������� �� ���������� ���� 495ru.ru</a>";}
if (strstr($zapros,'info-12'))
{echo "<a style='color:#666; font-size:0.7em; text-align:center;' target='_blank' href='http://glavboard.ru/'>���������� � ��������� �� ����� GlavBoard.ru - ������ ����������</a>";}
if (strstr($zapros,'info-13'))
{echo "<a style='color:#666; font-size:0.7em; text-align:center;' target='_blank' title='���������� ������ � �������� stronglink.ru' href='http://stronglink.ru'>���������� ������ � �������� stronglink.ru</a>";}
*/?>

<div class="confid">&copy; <?php echo date('Y');?> ��� ����� ��������<br /><a href="/confid.html" title="�������� ������������������">�������� ������������������</a></div>
<div class="foot_cont">
<table align="right" border="0"><tr>
<td width="50">
<!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='//www.liveinternet.ru/click' "+
"target=_blank rel='nofollow'><img src='//counter.yadro.ru/hit?t44.11;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet' "+
"border='0' width='31' height='31'><\/a>")
//--></script><!--/LiveInternet-->
</td>
<td align="center">
<img src="images/phone.png" /><br />
<a href="mailto:chooseus@yandex.ru">chooseus@yandex.ru</a>
</td></tr></table>
</div>
</div>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter25825046 = new Ya.Metrika({id:25825046,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/25825046" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<?php 
Mysql_close($conn); 
	$_SESSION['ring']='true ring';	
?>



<div id="callback"><img src="images/close_btn.png" id="close_btn" onclick="close_pop_up('#callback');"><hr /><center><b>�������� ������ � �� ���������� ���:</b></center><br />
                        <form name="formcallback" action="sent-callback.html" method="post" onsubmit="return validate_form ();" class="formazakaza">
                        <div class="FormFio">
                            <input name="FormFio" pattern=".{2,}" class="name" placeholder="* �������, ���" type="text">
                        </div>
						 <div class="FormPhone">
                            <input name="FormPhone" pattern=".{3,}" class="phone" placeholder="* ���������� �������" type="text"/>
                        </div>
                        <div class="FormMail">
                            <input name="FormMail" pattern=".{1,}[@].{4,}" class="mail" placeholder="e-mail" type="text">
                        </div>
                            <textarea rows='5' cols='28' name="callbackcomment" type="text" placeholder="������ ������� ������� ���� ������(����. 140 ��������)" style="resize:none;"></textarea>
                          <div class="knopka"><button type="submit" name="callback">��������</button></div>
                        </form>
      
</div>

<div id="overlay"></div>
