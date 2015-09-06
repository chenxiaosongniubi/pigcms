<!DOCTYPE html>
<html>    <head>
       <if condition="$zd['status'] eq 1">
            {pigcms{$zd['code']}
        </if>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>{pigcms{$tpl.wxname}</title>
        <base href="." />
        <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta name="format-detection" content="telephone=no" />
<link rel="stylesheet" href="{pigcms{$static_path}css/136/idangerous.swiper.css">
<link href="{pigcms{$static_path}css/136/iscroll.css" rel="stylesheet" type="text/css" />
<link href="{pigcms{$static_path}css/allcss/cate36_{pigcms{$tpl.color_id}.css" rel="stylesheet" type="text/css" />
<style>
  
</style>

<script src="{pigcms{$static_path}css/136/iscroll.js" type="text/javascript"></script>
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

<body id="cate17">
<if condition="$homeInfo['musicurl'] neq false">
<include file="Index:music"/>
</if>
<div id="insert1" style="z-index:10000; position:fixed; top:20px;" ></div>

<div class="banner">
<div id="wrapper">
<div id="scroller">
<ul id="thelist">
<volist name="flashbg" id="so">              
    <li>

            <img src="{pigcms{$so.img}">

    </li>
</volist>

 

</ul>
</div>
</div>
    <div id="nav" >
<div id="prev" onClick="myScroll.scrollToPage('prev', 0,400,2);return false">&larr; prev</div>
<ul id="indicator">
            
<volist name="flashbg" id="so">
    <li <if condition="$i eq 1">class="active"</if> ></li>
</volist>
 
</ul>
<div id="next" onClick="myScroll.scrollToPage('next', 0,400,2);return false">next &rarr;</div>
</div>
    <div class="clr"></div>
</div>
 

<div class="device">
    <a class="arrow-left" href="#"></a> 
    <a class="arrow-right" href="#"></a>
    <div class="swiper-container">
      <div class="swiper-wrapper">
      
      
      
         <?php 
		 $catsNum=count($info);
		 ?>
                            
              <volist name="info" id="vo">   
<?php
				 if($i%4==1){
     ?>							  
        <div class="swiper-slide">
            <div class="content-slide">

                  
	 <?php
	 }
	 ?>
                            
            
                <a href="<if condition="$vo['url'] eq ''">{pigcms{:U('Wap/Index/lists',array('classid'=>$vo['id'],'token'=>$vo['token']))}<else/>{pigcms{$vo.url|htmlspecialchars_decode}</if>">
                    <p class="ico"><img src="{pigcms{$vo.img}" /></p>
                    <p class="title">{pigcms{$vo.name}</p>
                </a>
            <?php
				 if($i%4==0||$i==$catsCount){
     ?>				
      
                     </div>
            </div>
			<?php
	 }
	 ?>
			</volist>
                 
      </div>
    </div>
  </div>
  <div class="pagination"></div>

</div>

<script src="{pigcms{$static_path}css/136/jquery-1.10.1.min.js" type="text/javascript"></script>
  <script src="{pigcms{$static_path}css/136/idangerous.swiper-2.1.min.js" type="text/javascript"></script>
  <script>
  var mySwiper = new Swiper('.swiper-container',{
    pagination: '.pagination',
    loop:true,
    grabCursor: true,
    paginationClickable: true
  })
  $('.arrow-left').on('click', function(e){
    e.preventDefault()
    mySwiper.swipePrev()
  })
  $('.arrow-right').on('click', function(e){
    e.preventDefault()
    mySwiper.swipeNext()
  })
  </script>


<script>
var count = document.getElementById("thelist").getElementsByTagName("img").length;  

var count2 = document.getElementsByClassName("menuimg").length;
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
 
 
 </div>
 
<div style="display:none"> </div>
 
<include file="Index:styleInclude"/>
<include file="$cateMenuFileName"/>
<!-- share -->
<include file="Index:share" />
</body>
</html>
