<?php


class Mail {

	private $mysmtp_server      = 'ssl://smtp.126.com';
	private $mysmtp_port        = 465;
	private $mysmtp_auth        = true;
	private $mysmtp_account     = 'yuqing_tq';//邮箱账号
	private $mysmtp_pass        = 'Yuqing123';
	private $mailfrom    		= 'yuqing_tq@126.com';
	private $mailto         	= '';
	private $mailfrom_name   	= 'API-yuqing';
	//SMTP配置结束*************

	function __construct($center,$mailto,$mail_content){
		
		/*定时发送邮件*/
        $mail_subject    ='[来自： '.$center. ']舆情服务出现了一些问题,请解决；';	    //邮件标题
        $content = '<h1>这是一封来自舆情的通知邮件：您的服务['.$center.' center] 出现了异常操作;</h1>'."<br/>"."时间：".time().
            "内容：<p style='color:red'>".$mail_content."</p><br/> <p>请及时处理；</p>";
        $time = time();


		$mail_body       = $content;   //邮件内容
		$mail_type       = 'HTML';
		$mysmtp = new Smtp($this->mysmtp_server, $this->mysmtp_port, $this->mysmtp_auth,
			                $this->mysmtp_account, $this->mysmtp_pass, $this->mailfrom);
		
		//开始发送
     //   print "sending--".$mailto;
		$sent = $mysmtp->sendmail($mailto, $this->mailfrom, $this->mailfrom_name,
			                       $mail_subject, $mail_body, $mail_type);
		if($sent === TRUE){		//发送成功
			echo 'Sent OK';
		}else{
			echo 'Failed';
			echo $mysmtp->logs;	//主动输出错误
		}
		
	}




}