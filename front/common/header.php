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
			<li class="linav"><a href="/front/index.php" class="anav">��ҳ</a></li>
			<li class="linav have_child" id="fontc"><a href="/front/list.php" class="anav">����</a>
			<ul class="n-h-list">
			<li>�Ժ�˯��</li>
			<li>�����ú�</li>
			</ul>
			</li>
			<li class="linav have_child" id="fontc"><a href="/front/artl.php" class="anav">������Щ��</a>
			<ul class="n-h-list">
			<li>������</li>
			<li>��ô�Եú�</li>
			</ul></li>
			<li class="linav last"><a href="/front/bbs.php" class="anav">���԰�</a></li>
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