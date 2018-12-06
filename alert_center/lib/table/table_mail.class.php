<?php

class Table_mail extends Table{


	static protected function struct($data){
    
        $r = array();
        $r['id']          = $data['id'];
        $r['center']      = $data['center'];
        $r['email_addr']  = $data['email_addr'];     
        return $r;
    }

    static public function getEmail($center){

        global $mypdo;
        $center = $mypdo->sql_check_input(array('string', $center));
        $center =strtoupper($center);
        $sql='select * from alert_mail where center='.$center;

        $rs =$mypdo->sqlQuery($sql);

        $r  = array();
		if($rs){
            foreach($rs as $key => $val){
                $r[$key] = self::struct($val);
            }
            return $r[0];
        }else{
            return $r;
        }

    }
    static public function getInfoById($id){

        global $mypdo;
        $center = $mypdo->sql_check_input(array('number', $id));

        $sql='select * from alert_mail where id ='.$id;

        $rs =$mypdo->sqlQuery($sql);

        $r  = array();
        if($rs){
            foreach($rs as $key => $val){
                $r[$key] = self::struct($val);
            }
            return $r[0];
        }else{
            return $r;
        }

    }
    static public function add($center,$email){

        global $mypdo;
        $param = array (
		
			'center'      => array('string', $center),
			'email_addr'     => array('string', $email)
		
		);

      return  $mypdo->sqlinsert('alert_mail',$param);

    }

    static public function update($id,$center,$email){

        global $mypdo;
        $param = array (
	        'center'=>array('string',$center),
			'email_addr'  => array('string', $email)
		
		);
        $where = array('id'=>array('number',$id));

        return $mypdo->sqlupdate('alert_mail',$param,$where);
    }

    static public function getList(){
	    global $mypdo;
	    $sql ='select * from alert_mail';

	    $rs=$mypdo->sqlQuery($sql);

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
    static public function delete($id){

	    global $mypdo;
        $where = array(
            "id" => array('number', $id)
        );
        return $mypdo->sqldelete('alert_mail', $where);
    }
}