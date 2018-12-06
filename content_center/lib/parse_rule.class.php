<?php

/**
 * parse_rule.class.php 提取规则类
 *
 * @version		    $Id$
 * @createtime		2018/11/2
 * @updatetime		2018/11/2
 * @author          zhfang
 * @copyright		Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */
class Parse_rule {


    /**
     * Table_parse_rule::getInfoById() 根据ID获取详情
     *
     * @param Integer $id 规则ID
     *
     * @return array|mixed
     * @throws MyException
     */
	static public function getInfoById($id){
		if(empty($id))throw new MyException('ID不能为空', 101);

		return Table_parse_rule::getInfoById($id);
	}

    /**
     * @param $url
     * @return array|mixed
     * @throws MyException
     */
    static public function getInfoByUrl($url){
        if(empty($url))throw new MyException('URL不能为空', 101);

        return Table_parse_rule::getInfoByUrl($url);
    }

    /**
     * Table_parse_rule::getList() 获取规则列表
     *
     * @return
     */
	static public function getList(){

		return Table_parse_rule::getList();
	}

    /**
     * Table_parse_rule::add()  添加规则
     *
     * @param $ruleAttr
     * @return array|false|null|string|string[]
     * @throws MyException
     */
	static public function add($ruleAttr){
		
		//检查参数
        if(empty($ruleAttr['site_url']))throw new MyException('起始地址不能为空', 101);

		//获取信息,判断url是否重复
//		$site = Table_parse_rule::getInfoByUrl($site_url);
//		if($site) throw new MyException('站点地址已经存在', 102);

        $rs = Table_parse_rule::add($ruleAttr);
		if($rs > 0){
			$msg = '成功添加站点！';
            return action_msg($msg, 1);
		}else{

            throw new MyException('操作失败', 103);
		}

	}

    /**
     * Table_parse_rule::del() 删除规则
     *
     * @param $id
     * @return array|false|null|string|string[]
     * @throws MyException
     */
	static public function del($id){

        if(empty($id))throw new MyException('站点ID不能为空', 101);
        
        $rs = Table_parse_rule::del($id);
        if($rs > 0){
            $msg = '删除站点('.$id.')成功!';
			
            return action_msg($msg, 1);
        }else{
			throw new MyException('操作失败', 102);
        }
	}


    /**
     * Table_parse_rule::edit() 修改提取规则
     *
     * @param $r_id
     * @param $ruleAttr
     * @return array|false|null|string|string[]
     * @throws MyException
     */
	static public function edit($r_id, $ruleAttr){

        //检查参数
        if(empty($ruleAttr['site_url']))throw new MyException('起始地址不能为空', 101);

        $rs = Table_parse_rule::edit($r_id, $ruleAttr);
        if($rs >= 0){
            $msg = '修改站点('.$r_id.')信息成功!';

            return action_msg($msg, 1);
        }else{
            throw new MyException('操作失败', 108);
        }
	}

    /**
     * site::search()
     *
     * @param $params
     * @return array|int
     */
    static public function search($params){

        return Table_parse_rule::search($params);
    }


    static public function searchCount($params){

        return Table_parse_rule::searchCount($params);
    }

}

?>