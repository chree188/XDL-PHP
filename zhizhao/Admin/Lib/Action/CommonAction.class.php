<?php
	/*前台 后台公用的控制器*/
	class CommonAction extends Action{
	//控制器初始化方法 
	public function _initialize(){
		//后台登陆判断
		if(!isset($_SESSION['admin_id'])){
			$this->redirect('admin.php/Login/index');	
		}
	}
	/*
	 * 按照规则检查字段
	 * @param string $field 要检查的字段
	 * @param string $value 检查字段的值
	 * @param string $rule 检查规则，支持正则表达式
	 * @param string $prompt 检查不符合规则时的提示文字
	 * @param string $extra 额外的参数，例如在检查唯一性时，传递数据表名称
	 * @param string $extend 额外的搜索条件
	 * @return string
	 */
	protected function checkField($field, $value, $rule, $prompt, $extra = '', $extend = '') {
		$result = true;
		switch ($rule) {
			case 'unique' :
				$obj = M($extra);
				$where = $field.'=\''.$value.'\'';
				if ($extend != '') $where .= ' and '.$extend;
				$data = $obj->where($where)->find();
				$data = deep_htmlspecialchars_decode($data);
				if ($data != '') $result = false;
				break;
			case 'uniform' :
				if ($field != $value) $result = false;
				break;
			default :
				$result = regex($value,$rule);
		}
		if (!$result) $this->error($prompt);
	}
	
	/*
	 * 组织分类列表
	 * + 将分类列表以特定的形式进行排列为深度为2及以上的数组，便于模板输出
	 * @param array $list 分类数据
	 * @param string $grade 当前分类级数，默认为一级分类(1)
	 * @return array
	 */
	protected function setSortList($list, $grade = 1) {
		$tab = '&nbsp;&nbsp;&nbsp;&nbsp;';
		$sign = '|--&nbsp;';
		for ($i = 1; $i < $grade; $i++) {
			$string .= $tab;
		}
		foreach ($list as $key => $value) {
			//组织数据
			$data[] = array(
				'id' => $value['id'],
				'sort_name' => $string . $sign . $value['sort_name'],
				'status' => $value['status'],
				'sequence' => $value['sequence'],
			);
			//获取子菜单
			if (trim($value['child_sort']) !== '') {
				$data = array_merge($data, (array)$this->setSortList($value['child_sort'], $grade+1));
			}
		}
		return $data;
	}
	/*
	 * 获取分类及其子类的ID
	 * + 将分类及其子类以ID,ID,ID的形式组织后返回
	 * @param string $table 数据表
	 * @param integer $id 父ID
	 * @param beolean $isChild 是否是在进行子循环，若是子循环，返回值前会附有逗号
	 * @return string
	 */
	 protected function getIdList($table, $id, $isChild = false) {
		$obj = M($table);
		$id = get_integer($id);
		$data = $obj->field('`id`')->where('`parent_id`='.$id)->select();
		$data = deep_htmlspecialchars_decode($data);
		foreach ($data as $value) {
			$string = $string .','. $value['id'];
			$string = $string . $this->getIdList($table, $value['id'], true);
		}
		if ($isChild) {
			return $string;
		} else {
			return $id . $string;
		}
	 }

	/*
	 * 获取多级分类的分类列表
	 * + 将分类列表以数组的形式读取出来
	 * @param string $table 分类所在的数据表名（不需要添加数据表前缀）
	 * @param integer $parent_id 该分类作为父类的ID
	 * @param string $maxGrade 分类显示深度，-1表示不限制级数
	 + 例如 $maxGrade 的值为2， 则会罗列出$parent_id级别下（包括该级）2级分类，3级及其以上的分类就不会显示
	 * @param string $extend 扩展查询条件
	 * @param string $order 排序方式
	 * @param string $order 返回记录限制
	 * @param string $grade 当前分类级数
	 * @return array
	 */
	protected function getSortList($table, $parent_id=0, $maxGrade = -1, $extend='', $order = '`sequence` asc, `id` asc', $limit='', $grade = 1) {
		if ($maxGrade === -1 || $grade <= $maxGrade) {
			$obj = M($table);
			if ($extend === '') {
				$where = '`parent_id` = '.$parent_id;
			} else {
				$where =$extend . ' AND `parent_id`='.$parent_id;
			}
			$list = $obj->where($where)->order($order)->limit($limit)->select();
			$list = deep_htmlspecialchars_decode($list);
			foreach ($list as $key => $value) {
				$list[$key]['child_sort'] = $this->getSortList($table, $value['id'], $maxGrade, $extend, $order, $limit, $grade+1);
			}
			return $list;
		}
	}
	
}