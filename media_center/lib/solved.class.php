<?php

/**
 * solved.class.php 媒体类
 *
 * @version       $Id$
 * @create time   2018/10/25
 * @update time   
 * @author        tengyingzhi
 * @copyright     Copyright (c) 芝麻开发 (http://www.zhimawork.com)
 */
class solved {
    

    /**
     *solved::getInfoById()
     * 
     * @param mixed $id
     * @return
     */
    static public function getInfoById($id){
        if(empty($id)) throw new MyException('ID不能为空', 101);
        
        return Table_solved::getInfoById($id);
    }


    static public function getInfoByUrl($url){
        if(empty($url)) throw new MyException('连接不能为空', 101);

        return Table_solved::getInfoByUrl($url);
    }



    /**
     * solved::add()
     * 
     * @param array $solvedAttr
     * $solvedAttr数组键：id, siteid, cur_depth, url
     * 
     * @return void
     */
    static public function add($solvedAttr = array()){
        

        $rs = Table_solved::add($solvedAttr);

        if($rs > 0){

            return action_msg('添加任务成功', 1);
        }else{
            throw new MyException('操作失败', 106);
        }
    }
    


}
?>