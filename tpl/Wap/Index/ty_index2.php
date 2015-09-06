<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>{pigcms{$tpl['wxname']}</title>
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta charset="utf-8">
<link href="{pigcms{$static_path}css/ty/news.css" rel="stylesheet" type="text/css" />
<script src="{pigcms{$static_path}js/ty/iscroll.js" type="text/javascript"></script>

<style>
#cate6 .mainmenu li.li0:nth-child(5) .menumesg {
    background-color: #990000;
}
#cate6 .mainmenu li.li0:nth-child(1) .menumesg {
    background-color: #01AA0A;
}
#cate6 .mainmenu li.li0:nth-child(9) .menumesg {
    background-color: #8B4500;
}

#cate8 .mainmenu li .menubtn {
    border-radius: 5px;
}
#cate8 .mainmenu li div img {
    border-radius: 5px;
}

 .themeStyle{background:#DE0C04}  
</style>
<script src="{pigcms{$static_path}css/flash/js/iscroll.js" type="text/javascript"></script>
<script type="text/javascript">
var myScroll;

function loaded() {
myScroll = new iScroll('wrapper', {
snap: true,
momentum: false,
hScrollbar: false,
onScrollEnd: function () {
document.querySelector('#indicator > li.active').className = '';
document.querySelector('#indicator > li:nth-child(' + (this.currPageX+1) + ')').className = 'active';
}
 });
 
 
}

document.addEventListener('DOMContentLoaded', loaded, false);
</script>
</head>

<body id="cate1">
<div class="banner">
<div id="wrapper">
<div id="scroller">
<ul id="thelist"> 
<volist name="flash" id="so">
		<li><p>{pigcms{$so.info}</p><a href="{pigcms{$so.url}"><img src="{pigcms{$so.img}" /></a></li>
	</volist>
</ul>
</div>
</div>
<div id="nav">
<div id="prev" onclick="myScroll.scrollToPage('prev', 0,400,3);return false">&larr; prev</div>
<ul id="indicator">
<volist name="flash" id="so">
<li   <if condition="$i eq 1">class="active"</if>  >{pigcms{$i}</li>
</volist>
 
</ul>
<div id="next" onclick="myScroll.scrollToPage('next', 0);return false">next &rarr;</div>
</div>
<div class="clr"></div>
</div>

<script>


var count = document.getElementById("thelist").getElementsByTagName("img").length;	


for(i=0;i<count;i++){
 document.getElementById("thelist").getElementsByTagName("img").item(i).style.cssText = " width:"+document.body.clientWidth+"px";

}

document.getElementById("scroller").style.cssText = " width:"+document.body.clientWidth*count+"px";


 setInterval(function(){
myScroll.scrollToPage('next', 0,400,count);
},3500 );

window.onresize = function(){ 
for(i=0;i<count;i++){
document.getElementById("thelist").getElementsByTagName("img").item(i).style.cssText = " width:"+document.body.clientWidth+"px";

}

 document.getElementById("scroller").style.cssText = " width:"+document.body.clientWidth*count+"px";
} 

</script>
<ul class="mainmenu">

  <volist name="info" id="vo">   
<li>
<div class="menubtn">
<a href="<if condition="$vo['url'] eq ''">{pigcms{:U('Wap/Index/lists',array('classid'=>$vo['id'],'token'=>$vo['token']))}<else/>{pigcms{$vo.url|htmlspecialchars_decode}</if>">
<div class="menumesg">
<div class="menuimg"><img src="{pigcms{$vo.img}" /></div>
<div class="menutitle">{pigcms{$vo.name}</div>
</div>
</a>
</div>

</li>
 </volist>	
<div class="clr"></div>
</ul>

<eq name="copyright" value="0">
<div class="copyright"  >
<php>echo htmlspecialchars_decode(C('copyright'))</php>
</div>
</eq>
<div style="display:none">{pigcms{$tpl.tongji|htmlspecialchars_decode}</div>
	<if condition="ACTION_NAME eq 'index'">
		<script type="text/javascript">
			window.shareData = {  
					"moduleName":"Index",
					"moduleID": '0',
					"imgUrl": "{pigcms{$homeInfo.picurl}", 
					"timeLineLink": "{pigcms{:C('site_url')}{pigcms{:U(Index/ACTION_NAME,array('token'=>$_GET['token']))}",
					"sendFriendLink": "{pigcms{:C('site_url')}{pigcms{:U(Index/ACTION_NAME,array('token'=>$_GET['token']))}",
					"weiboLink": "{pigcms{:C('site_url')}{pigcms{:U(Index/ACTION_NAME,array('token'=>$_GET['token']))}",
					"tTitle": "{pigcms{$homeInfo.title}",
					"tContent": "{pigcms{$homeInfo.info}"
				};
		</script>
	<else />
		<script type="text/javascript">
			window.shareData = {  
				"moduleName":"Index",
				"moduleID": '1',
				"imgUrl": "{pigcms{$homeInfo.picurl}", 
				"timeLineLink": "{pigcms{:C('site_url')}{pigcms{:U(Index/ACTION_NAME,array('token'=>$_GET['token'],'classid'=>$_GET['classid']))}",
				"sendFriendLink": "{pigcms{:C('site_url')}{pigcms{:U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token'],'classid'=>$_GET['classid']))}",
				"weiboLink": "{pigcms{:C('site_url')}{pigcms{:U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token'],'classid'=>$_GET['classid']))}",
				"tTitle": "{pigcms{$homeInfo.title}",
				"tContent": "{pigcms{$homeInfo.info}"
			};
		</script>	
	
	</if>
{pigcms{$shareScript}
</body>
</html>
