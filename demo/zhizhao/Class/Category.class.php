<?php
	class Category{
		/*-----------------------组合一维数组
		**
		**处理无限级分类-----不管你有多少级分类都会利用parent_id 让parent_id跟父级分类ID相同的分到一类去 并增加level
		**递归重组数组 压入level和html 让跟顶级分类ID 跟子分类的parent_id相同 归到一类
		**level ::代表分类等级 0：顶级分类 1:二级分类
		** html ：分割符
		** 返回重组后的数组
		**/
		static Public function unlimitedForLevel($cate,$html = '--',$parent_id = 0,$level = 0){
				$arr = array();
				foreach($cate as $v){
					if($v['parent_id'] == $parent_id){
						$v['level'] = $level + 1;
						$v['html'] = str_repeat($html,$level);
						$arr[] = $v;
						$arr = array_merge($arr,self::unlimitedForLevel($cate,$html,$v['id'],$level+1));
					}
				}
				return $arr;
		}
		
		/**-----------------------组合多维数组
		**
		**把分类的parent_id 跟分类的id 相同的子分类压入到父分类的数组里面
		**
		**超有用的 重组数组 压入数组 方便在模板遍历多维数组 从而数组数据 比如顶级菜单。。
		**---------------<volist name="XXX" id="v">  -----<volist name="$v.child" id="">---这样形式的
		**/
		static Public function unlimitedForLayer($cate,$parent_id=0){
			$arr = array();
			foreach($cate as $v){
				//给予默认值 目的是：首先从parent_id为0 即：顶级分类开始遍历
				if($v['parent_id'] == $parent_id){
					$v['child'] = self::unlimitedForLayer($cate,$v['id']);
					$arr[] = $v;
				}
			}
			return $arr;
		}
		
		/**_________________传递一个子分类ID 返回所有的父级分类
		**
		**服装》》男装》》T-shirt》》校园style
		**-----作用是：根据数据库读出的表信息 并传入分类ID 然后找到父级分类
		** $cate----传入数组    $id分类ID 
		**/
		static Public function getParents($cate,$id){
			$arr = array();
			foreach($cate as $v){
				//如果当前数组里面的id等于传进来的ID
				if($v['id'] == $id){
					//满足条件就往外面的这个数组压
					$arr[] = $v;
					$arr = array_merge(self::getParents($cate,$v['parent_id']),$arr);
					//$arr[] = $v;  放前面跟放后面一样的
				}
			}
			return $arr;
				
		}
		
		/**------------传递一个父级ID 返回所有的子分类ID  
		**							服装
		**			男装							女装
		**	 上衣 			裤子
		**羽绒服 	衬衫		...........
		.........
		**/
		static Public function getChildsId($cate,$id){
			$arr = array();
			foreach($cate as $v){
				if($v['parent_id'] == $id){
					$arr[] = $v['id'];
					$arr = array_merge($arr,self::getChildsId($cate,$v['id']));
				}
			}
			return $arr;
		}
		
				/**------------传递一个父级ID 返回所有的子分类 
		**							服装
		**			男装							女装
		**	 上衣 			裤子
		**羽绒服 	衬衫		...........
		.........
		**/
		static Public function getChilds($cate,$id){
			$arr = array();
			foreach($cate as $v){
				if($v['parent_id'] == $id){
					$arr[] = $v;
					$arr = array_merge($arr,self::getChildsId($cate,$v['id']));
				}
			}
			return $arr;
		}

	}