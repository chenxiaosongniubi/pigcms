<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>{pigcms{$thisCard.cardname}会员特权</title>
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<link href="{pigcms{$static_path}card/style/style.css" rel="stylesheet" type="text/css">
<script src="/static/js/jquery.min.js" type="text/javascript"></script>
<script src="/static/js/alert.js" type="text/javascript"></script>
<script src="{pigcms{$static_path}card/js/accordian.pack.js" type="text/javascript"></script>
<style>
.window .title{background-image: linear-gradient(#179f00, #179f00);}
</style>
</head>
<body id="cardnews" onLoad="new Accordian('basic-accordian',5,'header_highlight');" class="mode_webapp">
	<div class="qiandaobanner">
		<a href="javascript:history.go(-1);"><img src="{pigcms{$thisCard.vip}" /></a> 
	</div>
	
	<div id="basic-accordian">
		<volist name="list" id="item">
			<div id="test{pigcms{$item.id}-header" class="accordion_headings  <?php if ($item['id']==$firstItemID){?>header_highlight<?php } ?>">
				<div class="tab  vip ">
					<span class="title">{pigcms{$item.title}<p><?php if ($item['type']&&$item['enddate']){?>有效期至{pigcms{$item.enddate|date='Y年m月d日',###}<?php }else{ ?>无限期<?php } ?></p></span>
				</div>
				<div id="test{pigcms{$item.id}-content">
					<div class="accordion_child">
						<div id="queren{pigcms{$item.id}" style="display:none;">
							<form action="/wap.php?g=Wap&c=Card&a=action_usePrivelege&token={pigcms{$token}" method="post" id="payform{pigcms{$item.id}">
								<p style="margin:10px 0;text-align:center">
									<input type="radio" name="paytype" onchange="radiochange(this,{pigcms{$item.id})" class="paytype{pigcms{$item.id}" value="0" checked />
									<label for="paytype{pigcms{$item.id}" style="font-size:12px;">线下支付</label> &nbsp; &nbsp; &nbsp; &nbsp;
									<input type="radio" name="paytype" onchange="radiochange(this,{pigcms{$item.id})" class="paytype{pigcms{$item.id}" value="1" />
									<label for="paytype{pigcms{$item.id}" style="font-size:12px;">会员卡支付</label>
								</p>
								<p style="margin:10px 0">
									<input name="money" type="text" class="px" id="money{pigcms{$item.id}" value="" placeholder="请输入实际消费金额">
								</p>
								<!--  
								<p style=" margin:10px 0" id="usetime_p{pigcms{$item.id}">
									<input name="s_money" type="text" class="px" id="s_money{pigcms{$item.id}" value="" placeholder="请再输入消费金额">
								</p>-->
								<p style="margin:10px 0 0 0">
									<input name="username" class="px" id="username{pigcms{$item.id}" value="" type="text" placeholder="请输入商家用户名">
								</p>
								
								<p style="margin:10px 0 0 0">
									<input name="password" class="px" id="password{pigcms{$item.id}" value="" type="password" placeholder="请输入商家密码">
								</p>
								<p style="margin:10px 0 0 0">
									<textarea placeholder="备注信息" class="px" id="notes{pigcms{$item.id}" name="notes"></textarea>
								</p>
								<p style="margin:10px 0">
									<input type="hidden" name="itemid" value="{pigcms{$item.id}" />
									<input type="hidden" name="wecha_id" value="{pigcms{$_GET['wecha_id']}" />
									<a id="showcard0" class="submit" href="javascript:void(0)" onclick="payformsubmit({pigcms{$item.id})">确定使用</a>
								</p>
							</form>	
						</div>
						<p class="explain_sn" id="shiyong{pigcms{$item.id}" style="width: 100%;margin: 0px auto;color: #fff;">
							<a style="height: 25px;line-height: 25px;" class="submit" href="###" onclick="this.style.display='none';document.getElementById('queren{pigcms{$item.id}').style.display=''">点击立即使用</a>
						</p>
						<b>详情说明</b>
						<ul style="min-height:250px;">{pigcms{$item.info}</ul>
					</div> 
					<div style="clear:both;height:20px;"></div>
				</div>
			</div>
		</volist>
	</div>
	
	<script>
	
	var jQ = jQuery.noConflict();
	
	function radiochange(e,tid){
		var ptype = e.value;
				if(ptype == 1){
					jQ('#password'+tid).css('display','none');
					jQ('#username'+tid).css('display','none');
					jQ('#notes'+tid).css('display','none');
				}else{
					jQ('#password'+tid).css('display','').attr('placeholder','请输入商家密码');
					jQ('#username'+tid).css('display','');
					jQ('#notes'+tid).css('display','');
	
				}
	}
	
	function payformsubmit(itemid){
		if(jQ('.paytype'+itemid+':checked').val() == 1){
			jQ('#payform'+itemid).submit();
		}else{
			use(itemid);
		}
	}
	
	
	function use(i){
		var paytype =  jQ('.paytype'+i+':checked').val()
		var password =  jQ('#password'+i).val();
		var money 	 =  jQ('#money'+i).val();
		var username =  jQ('#username'+i).val();
		var notes 	 =  jQ('#notes'+i).val();
		var prg 	= /^-?(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/;
		if(!prg.test(money)){
			alert('请输入正确金额');
			return false;
		}
		if(!username){
			alert('请输入商家用户名');
			return false;
		}
		if(!password){
			alert('请输入商家密码');
			return false;
		}
		if(!notes){
			alert('请输入备注信息');
			return false;
		}
	
		var itemid=i;
		var submitData = {
			password:password,
			itemid:itemid,
			money: money,
			username:username,
			notes:notes,
			paytype: paytype,
			wecha_id:'{pigcms{$wecha_id}',
			cat:0,
		};
		
		jQ.post('/wap.php?g=Wap&c=Card&a=action_usePrivelege&token={pigcms{$token}', submitData,
		
		function(data) {
			if (data.success == 1) {
				document.getElementById('queren'+i).style.display='none';
				document.getElementById('password'+i).value = '';
				document.getElementById('money'+i).value='';
				alert(data.msg);
			}else{
				alert(data.msg);
			}
		}, "json");
	}
	
	
	
	</script>
	<include file="Card:cardFooter"/>
	<include file="Card:share"/>
</body>
</html>