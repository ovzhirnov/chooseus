// JavaScript Document
function change_prod_data(iii)
{
	$("#name").val(eval ('name'+iii));
	$("#material").val(window ['material'+iii]);
	$("#shir").val(window ['shirina'+iii]);
	$("#vis").val(window ['visota'+iii]);
	$("#cena").val(window ['price'+iii]);
	document.getElementById("zakaz").innerHTML=(eval ('category'+iii)+" - "+eval ('name'+iii));
}

function open_pop_up(box) {
$("#overlay").show();
$(box).center_pop_up();
$(box).show(500);
}
 
function close_pop_up(box) {
$(box).hide(500);
$("#overlay").delay(550).hide(1);
}
 
$(document).ready(function(){
 
jQuery.fn.center_pop_up = function(){
this.css('position','absolute'); 
var topstep=0;
var leftstep=0;
if (($(window).height() - this.height())<0) {topstep=(this.height()-$(window).height())/2;}
if (($(window).width() - this.width())<0) {leftstep=(this.width()-$(window).width())/2;}
this.css('top', ($(window).height() - this.height()) / 2+$(window).scrollTop()+topstep + 'px');
this.css('left', ($(window).width() - this.width()) / 2+$(window).scrollLeft()+leftstep + 'px');
//this.css('left', ($(window).width() - this.width()) / 2 + 'px');
//this.css('top', ($(window).height() - this.height()) / 2 + 'px'); 
}
 
});

function mainpicover(ii)
{
	document.getElementById(ii).style.boxShadow = '#000 0px 2px 10px';
}
function mainpicout(ii)
{
	document.getElementById(ii).style.boxShadow = '0 2px 7px rgba(0, 0, 0, 1)';
}

