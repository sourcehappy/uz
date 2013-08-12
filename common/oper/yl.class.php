<?php

	class YouLian{
		
		/*
		 * 返回所有友链的信息
		 */
		public static function getAllLink()
		{
			$db = DB::instance();
			$sql = 'select * from df_link order by sort desc';
			
			$ret = $db->getAll($sql);
			return $ret;
		}
		
	}
