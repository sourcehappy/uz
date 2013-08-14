<script language="javascript" type="text/javascript">
	function showSubLevel(Obj){
		Obj.className="hover";
	}
	function hideSubLevel(Obj){
		Obj.className="";
	}
</script>
<div class="header">
	<div class="top">
		<div class="logo" id="logo"><a href="/front/index.php"><img src="/assets/images/logo.jpg" /></a></div>
		<div class="right">
			<div class="like"><a href="#"><img src="/assets/images/liketip.gif" /></a></div>
			<!--  <div class ="yaoyao"><a href="/front/yaoyao.php"><img src="/assets/images/yaoyao.gif"></img></a></div>-->
		</div>
	</div>
	<div class="daohang">
		<div class="daohang950">
			<ul class="ulnav">
			<li class="linav"><a href="/front/index.php" class="anav">首页</a></li>
			<li class="linav have_child" id="fontc"><a href="/front/list.php" class="anav">宝贝</a>
			<ul class="n-h-list">
			<li>吃好睡好</li>
			<li>穿好用好</li>
			</ul>
			</li>
			<li class="linav have_child" id="fontc"><a href="/front/artl.php" class="anav">孩子那些事</a>
			<ul class="n-h-list">
			<li>育儿经</li>
			<li>怎么吃得好</li>
			</ul></li>
			<li class="linav last"><a href="/front/bbs.php" class="anav">流言板</a></li>
			</ul>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	  $(".have_child").mouseover(function(){
			thisId=$(this).attr('id');
			$(this).attr('id','navc');
		    $(this).find("a").eq(0).addClass("sub_on").removeClass("sub");
		    $(this).find("ul").show();
	  });
	  $(".have_child").mouseout(function(){
			thisId=$(this).attr('id');
			$(this).attr('id','navc');
		    $(this).find("a").eq(0).addClass("sub").removeClass("sub_on");
		    $(this).find("ul").hide();
	  });
});

</script>