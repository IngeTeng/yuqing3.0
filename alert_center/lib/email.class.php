
<?php

class Email{

    public $id="";
    public $center="";
    public $email_addr="";

    public function __construct($id = 1 )
    {
        if(!empty($id)) {
            $email = self::getInfoById($id);
            if($email){
                $this->id      = $email['id'];
                $this->center = $email['center'];
                $this->email_addr     = $email['email_addr'];
            }else{
                throw new MyException('邮箱信息不存在', 902);
            }
        }
    }

    public function getList(){
        return Table_mail::getList();
    }

    static public function add($center,$email_addr){
        if(empty($center)|| empty($email_addr) ||  !Paramcheck::is_email($email_addr)){
            throw new MyException('参数不能为空 或邮箱格式不正确');
        }
        $center =strtoupper($center);
        $rs= Table_mail::add($center,$email_addr);
        if($rs > 0){

            $msg = '成功添加邮箱('.$center."-".$email_addr.')';
         //   Adminlog::add($msg);
            return action_msg($msg, 1);
        }else{
            throw new MyException('操作失败', 106);
        }
    }
    static public function update($id,$center,$email_addr){
         $rs=Table_mail::update($id,$center,$email_addr);

        if($rs > 0){

            $msg = '成功编辑邮箱('.$center."-".$email_addr.')';
            //   Adminlog::add($msg);
            return action_msg($msg, 1);
        }else{
            throw new MyException('操作失败', 106);
        }
    }
    static public function getInfoById($id){
        if(empty($id))throw new MyException('ID不能为空', 101);

        return Table_mail::getInfoById($id);
    }
    static public function delete($id){
        if(empty($id)) {
            throw  new MyException('id不能为空',101);
        }
        $rs = Table_mail::delete($id);
        if($rs == 1){
            $msg = '删除邮箱('.$id.')成功!';
          //  Adminlog::add($msg);

            return action_msg($msg, 1);
        }else{
            throw new MyException('操作失败', 102);
        }
    }

}