
<div class="header">
	<div class="top">
		<div class="logo" id="logo"><a href="/front/index.php"><img src="/assets/images/logo.jpg" /></a></div>
		<div class="right">
			<div class="like"><a href="#"><img src="/assets/images/liketip.gif" /></a></div>
			<div class ="yaoyao"><a href="/front/yaoyao.php"><img src="/assets/images/yaoyao.gif"></img></a></div>
		</div>
	</div>
	<div class="nav">
		<div class="nav950">
			<ul>
			<li><a href="/front/index.php" class="sub_on">首页</a></li>
			<li class="have_child"><a href="/front/list.php" >宝贝</a>
			<ul>
			<li>吃好睡好</li>
			<li>穿好用好</li>
			</ul>
			</li>
			<li class="have_child"><a href="/front/artl.php">孩子那些事</a>
			<ul>
			<li>育儿经</li>
			<li>怎么吃得好</li>
			</ul></li>
			<li><a href="/front/bbs.php">流言板</a></li>
			</ul>
		</div>
	</div>
</div>
<script>
$(".have_child").hover(function() {
	thisId=$(this).attr('id');
	$(this).attr('id','navc');
    $(this).find("a").eq(0).addClass("sub_on").removeClass("sub");
    $(this).find("ul").show();
},function() {
	if(typeof(thisId) == "undefined"){
		thisId='';	
	}
	$(this).attr('id',thisId);
    $(this).find("a").eq(0).addClass("sub").removeClass("sub_on");
    $(this).find("ul").hide()
});	
</script>