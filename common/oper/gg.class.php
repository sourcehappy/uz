<?php
/**
 * 广告获取
 *
 * @author soppy
 * @since 2013-8-9
 */

class GG{
	
	public static function getAll(){
		$db = DB::instance();
		
		$sql = 'select * from df_gg order by gg_id';
		
		return $db->getAll($sql);
	}
	
}