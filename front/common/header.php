
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
			<li><a href="/front/index.php" class="sub_on">��ҳ</a></li>
			<li class="have_child"><a href="/front/list.php" >����</a>
			<ul>
			<li>�Ժ�˯��</li>
			<li>�����ú�</li>
			</ul>
			</li>
			<li class="have_child"><a href="/front/artl.php">������Щ��</a>
			<ul>
			<li>������</li>
			<li>��ô�Եú�</li>
			</ul></li>
			<li><a href="/front/bbs.php">���԰�</a></li>
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