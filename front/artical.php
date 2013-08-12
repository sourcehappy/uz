<?php
require './common/header.php';

?>
<div class="clearboth"></div>
<div class="art_main">
	<div class="art_main art_left">
		<h3 class="art_title">文章标题</h3>
		<span class="art_leibie">类别  | 原创：为乐      发表时间：2013-2-1</span>
		<div class="art_text"><img src="/assets/test.jpg"></img><br />庄子的物质生活虽然贫困，但精神生活却异常丰富，读书、漫游、观察、遐想，追求“至人无己”的自由境界。庄子的思想较为复杂：在政治上，他激烈而深刻地抨击统治阶级，赞同老子的“无为而治”，主张摈弃一切社会制度和文化知识；在思想意识上，他片面夸大一切事物的相对性，否定客观事物的差别，否定客观真理，属于主观唯心主义思想；在生活态度上，他顺应自然，追求绝对的自由</div>
		<div class="art_pl">
		<div class="sns-widget" data-comment='{
	"isAutoHeight":false,
   "param":{
    	"target_key":"artical<?php echo '123'?>",
        "type_id":"1100035",
        "rec_user_id":"-1",
        "view":"detail_list",
        "title":"活动",
        "moreurl":"http://doufuwang.uz.taobao.com/front/artical.php?id=<?php echo '12'?>" },
    "paramList":{"view":"list_trunPage"}}'>
</div>   
		</div>
	</div>
	<!-- 左侧结束 -->
	<div class="art_main art_right">
	<div class="art_top">
				<div class="art_like">
					<div
						data-like='{
    		text:"喜欢",
    		skinType:2,
   			type:3,
   			key:"",
    		client_id:68
			}'
						class="sns-widget">喜欢</div>
				</div>
				<div class="art_share">
					<div
						data-sharebtn='{
			skinType:1,
			type:"item",
			key:"<?php echo '12121'?>",
			comment:"",
			pic:"",
			client_id:68,
			isShowFriend:true
			}'
						class="sns-widget">分享</div>
				</div>

			</div>
		<div id="clearboth"></div>
		<h3 style="color: #666666;font-size:14px;margin:30px 0 0 10px;">喜欢这文章的人还还喜欢</h3>
		<div class="art_relative">
			<ul>
				<li><a href="#">文章标题</a></li>
				<li><a href="#">文章标题</a></li>
				<li><a href="#">文章标题</a></li>
			</ul>
		</div>
	</div>
</div>

<?php require './common/footer.php';?>