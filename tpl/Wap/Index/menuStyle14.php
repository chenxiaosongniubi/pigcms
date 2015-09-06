<style type="text/css">
body { margin-bottom:60px !important; }
a, button, input { -webkit-tap-highlight-color:rgba(255, 0, 0, 0); }
ul, li { list-style:none; margin:0; padding:0 }
.top_bar { position: fixed; z-index: 900; bottom: 0; left: 0; right: 0; margin: auto; font-family: Helvetica, Tahoma, Arial, Microsoft YaHei, sans-serif; }
.top_menu { display:-webkit-box; border-top: 1px solid #3D3D46; display: block; width: 100%; background: rgba(255, 255, 255, 0.7); height: 45px; display: -webkit-box; display: box; margin:0; padding:0; -webkit-box-orient: horizontal; background: -webkit-gradient(linear, 0 0, 0 100%, from(#697077), to(#3F434E), color-stop(60%, #464A53)); box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset; }
.top_bar .top_menu>li { -webkit-box-flex:1; background: -webkit-gradient(linear, 0 0, 0 100%, from(rgba(0, 0, 0, 0.1)), color-stop(50%, rgba(0, 0, 0, 0.4)), to(rgba(0, 0, 0, 0.5))), -webkit-gradient(linear, 0 0, 0 100%, from(rgba(255, 255, 255, 0.1)), color-stop(50%, rgba(255, 255, 255, 0.15)), to(rgba(255, 255, 255, 0.15))); ; -webkit-background-size:1px 100%, 1px 100%; background-size:1px 100%, 1px 100%; background-position: 1px center, 2px center; background-repeat: no-repeat; position:relative; text-align:center; width:33%; }
.top_menu>li:first-child { background:none; }
.top_bar .top_menu>li>a { line-height:45px; display:block; text-align:center; color:#d5d5d5; text-decoration:none; text-shadow: 0 1px rgba(0, 0, 0, 0.6); -webkit-box-flex:1; }
.top_bar .top_menu li a label { padding:0; font-size:14px; overflow:hidden; }
.top_bar .top_menu>li>a img { display: inline-block; height: 14px; width: 14px; margin-top:-2px; color: #fff; line-height: 40px; vertical-align:middle; }
.top_bar li:first-child a { display: block; }
.menu_font { padding: 0; position: absolute; z-index: 500; bottom: 60px; right: 10px; width: 100px; margin-left:0; background: red; border: 1px solid #3D3D46; border-radius: 5px; background: -webkit-gradient(linear, 0 0, 0 100%, from(#697077), to(#3F434E), color-stop(60%, #464A53)); box-shadow: 0 1px 5px rgba(0, 0, 0, 0.3); }
.menu_font:before, .menu_font:after { content:""; display:inline-block; position:absolute; z-index:240; bottom:0; left: 80%; margin-left:-8px; margin-bottom:-16px; width:0; height:0; border:8px solid red; border-color:#3D3D46 transparent transparent transparent; }
.menu_font:after { z-index:501; border-color:#3F434E transparent transparent transparent; margin-bottom:-15px; margin-left:-8px; }
.menu_font.hidden { display:none; }
.top_menu li:last-of-type a { background: none; }
.top_menu>li:last-of-type>a label { padding: 0 0 0 3px; }
.menu_font li:first-child { background: none; }
.menu_font li { line-height:50px; text-align:center; background: -webkit-gradient(linear, 0 0, 100% 0, from(rgba(255, 255, 255, 0)), to(rgba(255, 255, 255, 0)), color-stop(50%, rgba(255, 255, 255, 0.15))), -webkit-gradient(linear, 0 0, 100% 0, from(rgba(0, 0, 0, 0)), to(rgba(0, 0, 0, 0)), color-stop(50%, rgba(0, 0, 0, 0.4))); background-size:100% 1px, 100% 1px; background-repeat:no-repeat; background-position: center 2px, center 1px; }
.menu_font li:last-of-type { border-bottom: 0; }
.menu_font li a { height: 50px; line-height: 50px !important; position: relative; color:#d5d5d5; text-decoration:none; text-shadow: 0 1px rgba(0, 0, 0, 0.6); display: block; width: 100%; text-align:center; white-space: nowrap; text-overflow: ellipsis; overflow: hidden; }
#menu_list0 { right:0; left:10px; }
#menu_list0:before, #menu_list0:after { left: 20%; }
#sharemcover { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.7); display: none; z-index: 20000; }
#sharemcover img { position: fixed; right: 18px; top: 5px; width: 260px; height: 180px; z-index: 20001; border:0; }
.top_bar .top_menu>li>a:hover, .top_bar .top_menu>li>a:active { background-color:#333; }
.menu_font li a:hover, .menu_font li a:active { background-color:#333; }
.menu_font li:first-of-type a { border-radius:5px 5px 0 0; }
.menu_font li:last-of-type a { border-radius:0 0 5px 5px; }
#plug-wrap { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0); z-index:800; }
#cate18 .device {bottom: 49px;}
#cate18 #indicator {bottom: 240px;}
#cate19 .device {bottom: 49px;}
#cate19 #indicator {bottom: 330px;}
#cate19 .pagination {bottom: 60px;}
</style>
 

<div class="top_bar" style="-webkit-transform:translate3d(0,0,0)">
  <nav>
    <ul id="top_menu" class="top_menu">
    <volist name="catemenu" id="vo">
        <li><a <?php if($vo['vo']){echo 'onclick="javascript:displayit('.$vo['k'].')"';}else{echo 'href="'.$vo['url'].'"';}?>><label>{pigcms{$vo.name}</label></a>
        <?php if ($vo['vo']){
        	?>
            <ul id="menu_list{pigcms{$vo['k']}" class="menu_font" style=" display:none">
            <volist name="vo['vo']" id="vo">
                <li> <a href="{pigcms{$vo.url}"><label>{pigcms{$vo.name}</label></a></li>
                </volist>
            </ul>
             <?php
        }
        ?>
        </li>
        </volist>
    </ul>
  </nav>
</div>
<div id="plug-wrap" onclick="closeall()" style="display: none;"></div>