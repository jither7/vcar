<?php
namespace App;

class Helpers {

	public static function slug($str) {
		$unicode = array(
			'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
			'd'=>'đ|Đ',
			'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
			'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
			'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
			'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
			'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
		);
		foreach($unicode as $nonUnicode=>$uni) {
			$str = preg_replace("/($uni)/i", $nonUnicode, mb_strtolower($str));
			$str = str_replace(" ","-",$str);
		}
		return $str;
	}

	public static function create_list($list, $parent_id = null){
		$html = '<ul>';
		foreach($list as $key => $row){
			if($row['parent'] == $parent_id){
				$html .= '<li>'.$row['name'] . self::create_list($list, $row['id']) .'</li>';
			}
		}
		$html .= '</ul>';
		if ( strpos($html, '<li>')===false){
			$html = '';
		}
		return $html;
	}

	public static function printTree($tree, $checked = 0, $r = 0, $p = null) {
		$isChecked = '';
		foreach ($tree as $i => $t) {
			if($checked != 0 AND $t['id'] == $checked) {
				$isChecked = "selected";
			}

			$dash = ($t['parent'] == 0) ? '' : str_repeat('--', $r) .' ';
			printf("\t<option  value='%d' %s >%s%s</option>\n", $t['id'], $isChecked, $dash, $t['name'] );
			if ($t['parent'] == $p) {
				// reset $r
				$r = 0;
			}
			if (isset($t['_children'])) {
				self::printTree($t['_children'], null, ++$r, $t['parent']);
			}
		}
	}

	public static function buildTree(Array $data, $parent = 0) {
		$tree = array();
		foreach ($data as $d) {
			if ($d['parent'] == $parent) {
				$children = self::buildTree($data, $d['id']);
				// set a trivial key
				if (!empty($children)) {
					$d['_children'] = $children;
				}
				$tree[] = $d;
			}
		}
		return $tree;
	}

}