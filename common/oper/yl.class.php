<?php

	class YouLian{
		
		/*
		 * ����������������Ϣ
		 */
		public static function getAllLink()
		{
			$db = DB::instance();
			$sql = 'select * from df_link order by sort desc';
			
			$ret = $db->getAll($sql);
			return $ret;
		}
		
	}
