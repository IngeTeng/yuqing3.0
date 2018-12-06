<?php


class Table_wxcookie extends Table {

    static protected function struct($data){
        $r = array();

        $r['id']         = $data['id'];
        $r['cookie']       = $data['cookie'];
        $r['status']    = $data['status'];
        return $r;
    }
    static public function add($content){
        global $mypdo;
        $param = array(
            "cookie"=>array('string',$content),
            "status"=> array('number',1)
        );
        print "add"."\n";
        return $mypdo->sqlinsert('weixin_cookies',$param);

    }
    static  public function getList(){
        global $mypdo;
        $sql ='select * from spider_sogoucookies ';
        $rs =$mypdo->sqlQuery($sql);
        $r  = array();
        if($rs){
            foreach($rs as $key => $val){
                $r[$key] = self::struct($val);
            }
            return $r;
        }else{
            return $r;
        }
    }
}