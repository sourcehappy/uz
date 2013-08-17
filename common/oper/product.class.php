<?php
/**
 * 商品获取 
 * 
 * @author Balsampear
 * @since 2013-4-14
 */

class Product {

	public static function getListByClassOrTag(&$rec, $start, $limit, $classId, $tagIds, $orderBy = 1) {
		$db = DB::instance();
		
		if (is_array($tagIds)) {
			$tagIds = implode(',', $tagIds);
		}
		if ($orderBy == 1) {
			$orderBy = 'prod_id';
		}else{
			$orderBy = 'click_num desc,p.prod_id';
		}
		$fds = 'p.prod_id,p.title,price,class_id,p.main_img';
		if ($tagIds) {
			if ($classId) {
				$sql = 'SELECT distinct '.$fds.' '
					.'FROM `vg_tag_prod_list` as tpl inner join vg_product as p using(prod_id) '
					.'WHERE p.status=1 and p.class_id='.$classId.' and tpl.tag_id in ('.$tagIds.') order by p.'.$orderBy.' desc';
			}else{
				$sql = 'SELECT distinct '.$fds.' '
						.'FROM `vg_tag_prod_list` as tpl inner join vg_product as p using(prod_id) '
						.'WHERE p.status=1 and tpl.tag_id in ('.$tagIds.') order by p.'.$orderBy.' desc';
			}
		}else{
			$sql = 'SELECT '.$fds.' FROM vg_product as p WHERE p.status=1 and p.class_id='.$classId.' order by p.'.$orderBy.' desc';
		}
		if ($rec === true) {
			//echo 'select count(*) as rc from ('.$sql.') as t';
			$rec = $db->getValue('select count(*) as rc from ('.$sql.') as t');
		}
		
		$sql .= ' limit '.$start.','.$limit;
		// echo $sql;
		return $db->getAll($sql);
	}

	public static function getListByTag(&$rec, $start, $limit, $tagId) {
		if (is_array($tagId)) {
			$tagId = implode(',', $tagId);
		}
		$db = DB::instance();
		$sql = 'SELECT p.prod_id,p.title,price,class_id,p.main_img '
			.'FROM `vg_tag_prod_list` as tpl inner join vg_product as p on (p.prod_id=tpl.prod_id) '
			.'WHERE p.status=1 and tpl.tag_id in ('.$tagId.')';

		if ($rec === true) {
			//echo 'select count(*) as rc from ('.$sql.') as t';
			$rec = $db->getValue('select count(*) as rc from ('.$sql.') as t');
		}
		$sql .= ' limit '.$start.','.$limit;
// 		echo $sql;
		return $db->getAll($sql);
	}
	

	public static function getList(&$rec, $start, $limit = 50, $ids = '', $key = '') {
		$db = DB::instance();
		
		if (is_array($ids)) {
			$ids = implode(',', $ids);
		}
		$sql = '';
		if ($ids) {
			$sql = $ids ? 'prod_id in ('.$ids.') and ' : '';
		}elseif ($key) {
			$sql = 'title like '.$db->q('%'.$key.'%');
		}
		$sql = 'SELECT prod_id,title,price,class_id,main_img FROM `vg_product` where '.$sql.'status=1 order by prod_id desc';
		if ($rec === true) {
			//echo 'select count(*) as rc from ('.$sql.') as t';
			$rec = $db->getValue('select count(*) as rc from ('.$sql.') as t');
		}
		$sql .= ' limit '.$start.','.$limit;
// 		echo $sql;
		return $db->getAll($sql);
	}
	
	public static function get($id) {
		$db = DB::instance();
		
		$sql = 'select * from vg_product where prod_id='.$id;
		$ret = $db->getOne($sql);
		
		return $ret;
	}
	
	public static function addClickNum($prodId) {
		$db = DB::instance();
		
		$db->update('vg_product', array('click_num'=>new MySQLCode('click_num+1')), 'prod_id='.$prodId);
	}
	public static function getListByOrder($parentName,$num = 8){
		$db = DB::instance();
		$name = trim($parentName);
// 		echo $name;
		$sql = "SELECT * \n"
				. "FROM vg_product AS p\n"
				. "LEFT JOIN vg_class AS c ON p.class_id = c.class_id\n"
				. "LEFT JOIN vg_class AS pc ON c.parent_class_id = pc.class_id\n"
				. "WHERE pc.name = '$name'\n"
				. "ORDER BY p.order DESC limit 0,$num";
		return $db->getAll($sql);

	}
	public static function getListByParentId($parentId,$start,$limit = 50){
		$db = DB::instance();
		$parentId = intval($parentId);
		$sql = "SELECT * \n"
				. "FROM vg_product AS p\n"
				. "LEFT JOIN vg_class AS c ON p.class_id = c.class_id\n"
				. "WHERE c.parent_class_id = '$parentId'\n"
				. "ORDER BY p.order DESC limit $start,$limit";
		$ret = $db->getAll($sql);
// 		print_r($ret);
		return $ret;
		
	}
	public static function getListById($classId){
		$db = DB::instance();
		$sql = 'select * from vg_product as p where class_id ='.$classId;
		return $db->getAll($sql);
	}
	public static function getListByClassId(&$rec,$classId,$start,$limit = 50){
		$db = DB::instance();
// 		$n = trim($name);
		$sql = 'select * from vg_class where parent_class_id=0 and class_id='.$classId;
		$ret = $db->getAll($sql);
// 		print_r($ret);
		if(!empty($ret)){
			
			$sql = "SELECT * \n"
					. "FROM vg_product AS p\n"
					. "LEFT JOIN vg_class AS c ON p.class_id = c.class_id\n"
							. "WHERE c.parent_class_id = '$classId'\n"
							. "ORDER BY p.order DESC ";
			if ($rec === true) {
				//echo 'select count(*) as rc from ('.$sql.') as t';
				$rec = $db->getValue('select count(*) as rc from ('.$sql.') as t');
			}
			$sql .= ' limit '.$start.','.$limit;
			$ret = $db->getAll($sql);
// 			print_r($ret);
			
		}else{
			$sql = "select * from vg_product as p where p.class_id='$classId' order by p.order desc ";
			if ($rec === true) {
				//echo 'select count(*) as rc from ('.$sql.') as t';
				$rec = $db->getValue('select count(*) as rc from ('.$sql.') as t');
			}
			$sql .= ' limit '.$start.','.$limit;
			
			$ret = $db->getAll($sql);
// 			print_r($ret);
			
		}
		return $ret;
	
	}
	
}