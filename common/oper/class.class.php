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
	 * $id == 1,按parent_class_id查找子类，$id == 2 按父类名字查找
	 * $parent,当$id =1时为id,$id=2时为父类名称
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