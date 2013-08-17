<?php
/**
 * 文章的获取
 * 
 * @author Balsampear
 * @since 2013-4-16
 */

class Article {
	
	/*
	 * @propertyId:文章类型Id
	 * @limit ：
	 */
	public static function getList($propertyId = 0, $limit = 1) {
		$db = DB::instance();
		$where = '';
		if ($propertyId) {
			$where = ' where artpr_id='.$propertyId;
		}
		$sql = 'select art_id,title,main_img,jump_url from vg_article '.$where.' order by art_id desc limit '.$limit;
		return $db->getAll($sql);
	}
	
	public static function get($artId) {
		$db = DB::instance();
		$sql = 'select * from vg_article where art_id='.$artId;
		return $db->getOne($sql);
	}
	/*
	 * @ $art_id 根据文章id
	 * @ 返回文章类别
	 */
	public static function getArticle($art_id)
	{
		$db = DB::instance();
		$sql = "select * from vg_art_property as n left join vg_article as a on n.artpr_id = a.artpr_id where a.art_id =$art_id";
		$result =  $db->getOne($sql);
// 		print_r($result);
		return $result;
	}
	public static function getAticleByTag(&$rec, $tagId, $start, $limit = 50){
		
	}
	public static function getArticleByClass(&$rec, $classId, $start, $limit = 50)
	{
		
	}
	
}