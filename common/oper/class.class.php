<?php

class FenLei{
	
	/*
	 * 
	 */
	public static function getClassByName($name)
	{
		$db = DB::instance();
		$n = trim($name);
		$sql = 'select * from vg_class where name='.$n;
		return $db->getAll($sql);
	}
	/*
	 * 
	 */
	public static function getClassById($id)
	{
		$db = DB::instance();
		$n = intval($id);
		$sql = 'select * from vg_class where name='.$n;
		return $db->getAll($sql);
	}
	/*
	 * $id == 1,��parent_class_id�������࣬$id == 2 ���������ֲ���
	 * $parent,��$id =1ʱΪid,$id=2ʱΪ��������
	 */
	public static function getChildClass($parent,$id = 1)
	{
		if($id == 1)
		{
			
		}
		if($id == 2){
			
		}
	}
	
}