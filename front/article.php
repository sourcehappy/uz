<?php
require('../common/global.inc.php');
require './common/header.php';
$aid = intval($_GET['aid']);
$p = intval($_GET['p']);
$act = trim($_GET['act']);
$aid = $aid>0 ? $aid:1;

$article = Article::get($aid); // ���������Ϣ
$cname = Article::getArticle($aid);
// print_r($cname);

?>
<div class="clearboth"></div>
<div class="art_main">
	<div class="art_main art_left">
		<h3 class="art_title"><?php echo $article['title'];?></h3>
		<span class="art_leibie">���:<a href="/front/artl.php?tagid=<?=$cname['artpr_id']?>" target="_blank">
		<?=$cname['name'];?></a>  | ԭ����<?php echo $article['author']?>&nbsp;&nbsp;&nbsp;
		����ʱ�䣺<?php echo $article['create_time'];?></span>
		<div class="art_text"><?php if(!empty($article['main_img'])){?><img src="<?=$article['main_img']?>"></img><?php }?><?php echo $article['text'];?></div>
		<div class="art_pl">
		<div class="sns-widget" data-comment='{
		"isAutoHeight":false,
   		"param":{
    	"target_key":"doufu_<?php echo $article['art_id'];?>",
        "type_id":"1100035",
        "rec_user_id":"-1",
        "view":"detail_list",
        "title":"[������-Uվ]<?php $article['title'];?>",
        "moreurl":"http://doufuwang.uz.taobao.com/front/article.php?aid=<?php echo $article['art_id'];?>" },
    "paramList":{"view":"list_trunPage"}}'>
</div>   
		</div>
	</div>
	<!-- ������ -->
	<div class="art_main art_right">
	<div class="art_top">
				<div class="art_like">
			<div
			data-like='{
    		text:"ϲ��",
    		skinType:2,
   			type:3,
   			key:"http://doufuwang.uz.taobao.com/article.php?aid=<?=$article['prod_id']?>",
    		client_id:68
			}'
			class="sns-widget">ϲ��</div>
			</div>
			<div class="art_share">
			<div
			data-sharebtn='{
			skinType:1,
			type:"webpage",
			key:"http://doufuwang.uz.taobao.com/article.php?aid=<?=$article['prod_id']?>",
			comment:"��ƪ���»���������һ�£�",
			pic:"<?php echo $article['main_img'];?>",
			title:"[������-Uվ]<?php echo $article['title'];?>",
			client_id:68,
			isShowFriend:false
			}'
		class="sns-widget">����</div></div></div>
		
		<div id="clearboth"></div>
		<h3 style="color: #666666;font-size:14px;margin:30px 0 0 10px;">ϲ�������µ��˻���ϲ��</h3>
		<div class="art_relative">
			<ul>
				<li><a href="#">���±���</a></li>
				<li><a href="#">���±���</a></li>
				<li><a href="#">���±���</a></li>
			</ul>
		</div>
	</div>
</div>

<?php require './common/footer.php';?>