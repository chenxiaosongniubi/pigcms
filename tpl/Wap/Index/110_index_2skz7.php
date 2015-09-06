<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
        <head>
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
        <link href="{pigcms{$static_path}css/allcss/cate10_{pigcms{$tpl.color_id}.css" rel="stylesheet" type="text/css" />
        <link href="{pigcms{$static_path}css/110/iscroll.css" rel="stylesheet" type="text/css" />
		
        <style>
            #cate10 .catemenu li:nth-child(n+4) img {
                display: block;
            }
            #cate10 .catemenu li:nth-child(n+4) a {
                padding: 20px 5px 10px;
            }
            #cate10 .catemenu li a {
                background-image: -webkit-gradient(linear, right bottom, left top, from(#282828), to(#272727), color-stop(47%, #676767));
                background-image: -webkit-linear-gradient(bottom right, #282828, #272727 47%, #676767);
                background-image: linear-gradient(to top left, #282828, #272727 47%, #676767);/*黑色渐变的3个颜色，可以自由更换*/
                margin:0;
                border-radius: 0;
            }
            #cate10 .catemenu li:nth-child(2n) a {
                background-image: -webkit-gradient(linear, right bottom, left top, from(#2f5d97), to(#557dab), color-stop(47%, #9bb4d4));
                background-image: -webkit-linear-gradient(bottom right, #2f5d97, #557dab 47%, #9bb4d4);
                background-image: linear-gradient(to top left, #2f5d97, #557dab 47%, #9bb4d4);/*蓝色渐变的3个颜色，可以自由更换*/
                color:#fff;/*文字的颜色，可以自由更换*/
            }
            #cate10 .catemenu {
                margin:0;
                border-radius: 0;
            } 
            #cate10 .catemenu a {
                border:0; color:#ccc;/*文字的颜色，可以自由更换*/
            } 
            #cate10 {
                background-color:#000000;/*黑色背景，可以自由更换*/
            }

        </style>
        <script src="{pigcms{$static_path}css/110/iscroll.js" type="text/javascript"></script>
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

    <body id="cate10">
    <!--背景音乐-->
    <if condition="$homeInfo['musicurl'] neq false">
<include file="Index:music"/>
</if>
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

        <div id="insert1"></div>

        <div class="catemenu">
            <ul> 
                <volist name="info" id="vo">
                <li>
                    <a href="<if condition="$vo['url'] eq ''">{pigcms{:U('Wap/Index/lists',array('classid'=>$vo['id'],'token'=>$vo['token']))}<else/>{pigcms{$vo.url|htmlspecialchars_decode}</if>">
                        <img src="{pigcms{$vo.img}" />{pigcms{$vo.name}
                    </a>
                </li>
                </volist>

                <div class="clr"></div>
            </ul>
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
        <div id="insert2"></div>
        <div style="display:none"> </div>
<if condition="$homeInfo['copyright']">
<div class="copyright">{pigcms{$homeInfo.copyright}</div> 
</if>
<include file="Index:styleInclude"/>
<include file="$cateMenuFileName"/>
<!-- share -->
<include file="Index:share" />
</body></html>