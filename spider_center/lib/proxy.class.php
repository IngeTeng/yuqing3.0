<?php 
// require_once('./common/curl.class.php');
class Proxy {
    public $proxy = '';
    public $port = '';
    public $type = '';
    public $detail = '';
    private $list=array(
        'http://www.xicidaili.com/nn',
        'http://www.ip3366.net/free/',
        'http://www.66ip.cn/',
    );
  
    /**
     * 构造方法：获取一个代理地址与端口
     */
    public function __construct(){
    $this->getOneProxy();
    }

    public function __get($property){
        if(property_exists($this,$property)){
            return $this->$property;
        }
    }
    public function __set($property,$value){
        if(property_exists($this,$property)){
            $this->$property =$value;
        }
        return $this;
    }
    /**
     * 更新代理
     * @param $page
     */
    public function updateProxy($page = 2){
        $this->handleProxy0();
        $this->handleProxy1($page);
        $this->handleProxy2($page);
        $this->saveProxyList();
    }
    /**
     * 获取http://xicidaili.com/nn
     */
    public function handleProxy0(){
       
        $website=$this->list[0];
        echo "get proxy : ".$website."\n";
        
        $html=Curl::get_html($website);
        $proxy_info=$this->getTd($html);
        $this->save2file($website,1,$proxy_info);

    }
    /**
     * 获取 http://www.ip3366.net/free/
     * @param $page
     */
    public function handleProxy1($page){
       
        for($i=1;$i<=$page;$i++){
            $website=$this->list[1]."?page=".$i;
            echo "get proxy : ".$website."\n";
           
            $html=Curl::get_html($website);
            $html = iconv("GBK", "UTF-8", $html);
          //  $table=$this->getTbody($html);
            $proxy_info=$this->getTd($html);
            $this->save2file($website,$i,$proxy_info);
        }

    }
    /**
     * 获取 http://www.66ip.cn/
     * @param $page
     */
    public function handleProxy2($page){
       
        for($i=1;$i<=$page;$i++){
            $website=$this->list[2].$i.".html";
            echo "get proxy : ".$website."\n";
           
            $html=Curl::get_html($website);
            $html = iconv("GBK", "UTF-8", $html);
          //  $table=$this->getTbody($html);
            $proxy_info=$this->getTd($html);
            unset($proxy_info[0]);
            $this->save2file($website,$i,$proxy_info);
        }

    }
    /**
     * 匹配 tbody
     * @param $html 地址
     * @param $proxy_reg 匹配规则
     */
    public function getTbody($html,$proxy_reg='/<tbody>(.*?)<\/tbody>/s'){

        $html = iconv("GBK", "UTF-8", $html);    
        preg_match($proxy_reg, $html, $proxy_list);
        echo "proxy list : ".var_dump($proxy_list)."\n";
     
        return $proxy_list;
    }
    /**
     * 匹配 td 
     * @param $html 地址
     */
    public function getTd($html){
    
        $proxy_list_reg = '/<tr(.*?)<\/tr>/s';
        preg_match_all($proxy_list_reg, $html, $proxy_li, PREG_SET_ORDER);
        $proxy_infos =array();
        foreach ($proxy_li as $li ) {
               
            $proxy_li_reg = '/<td>(.*?)<\/td>/s';
            preg_match_all($proxy_li_reg, $li[1], $proxy_info, PREG_SET_ORDER);
          // print_r($proxy_info);

            if(empty($proxy_info) ) {//or strcmp($proxy_info[3][1], 'HTTP')
            
                continue;
            }
           
            $proxy_info[0][1]=strip_tags($proxy_info[0][0]);
            $proxy_info[1][1]=strip_tags($proxy_info[1][0]);
            $proxy_info[2][1]=strip_tags($proxy_info[2][1]);
            $proxy_info[3][1]=strip_tags($proxy_info[3][0]);
            $proxy_info[4][1]=strip_tags($proxy_info[4][0]);

            $proxy_infos[] = array(
                'proxy' => $proxy_info[0][1],
                'port' => $proxy_info[1][1],
                'type' => $proxy_info[3][1],
                'detail' => $proxy_info[2][1].$proxy_info[4][1],
            );
            
          
        }

        return $proxy_infos;    

    }
    /**
     * 代理地址保存为文件
     * @param $website
     * @param $page
     * @param $contents 
     */
    public function save2file($website,$page,$contents){
        $contents=serialize($contents);
        $webName=explode('.',$website);
        $bath='../proxy/'.$webName[1]."_".$page;
        file_put_contents($bath,$contents);
    }
    /**
     * 从保存的所有代理中找出能用的做保存，改方法运行耗时；
     * 
     */
    public function saveProxyList(){
        print "进入代理过滤方法 "."\n";
        $dir = '../proxy/';
        $files = scandir($dir);
        $proxy_list=array();
        //var_dump($files);
        $files = array_diff($files,array('.','..','all_list'));
   
        foreach($files as $file){  
            
            $proxy_list_f = file_get_contents($dir.$file);
            $proxy_list_l = unserialize($proxy_list_f);     
            $proxy_list = array_merge($proxy_list,$proxy_list_l);

        }
        //验证代理是否有效
        $pid=0;
        foreach($proxy_list as $proxy_info){
            
            $back = Curl::get_html('http://www.baidu.com','',$proxy_info['proxy'],$proxy_info['port']);
            if(empty($back)){
                unset($proxy_list[$pid]);
                print "无效代理".$pid."\n";
                $pid++;
            }else{
                print "有效代理 ".$pid."\n";
                $pid++;
            }
           
        } 
        $con = serialize($proxy_list);
        file_put_contents($dir."all_list"."_".time(),$con);

    }
    /**
     * 
     * 从all_list有效代理中随机获取一个有效代理
     */
    public function getOneProxy(){

        $dir = '../proxy/all_list';
        if(file_exists($dir)){
            $proxy_list = file_get_contents($dir);
            $proxy_list=unserialize($proxy_list);
           
            $random_key = array_rand($proxy_list,1); 
            $singe = $proxy_list[$random_key];
            $this->proxy = $singe['proxy'];
            $this->port = $singe['port'];
            $this->type = $singe['type'];
        }else 
        {
            echo "请先调用updateProxy()";
        }
       
    }
    public function saveZMproxy($proxyurl){
        $proxy = Curl::get($proxyurl);
        $proxya=explode("\n" ,$proxy);
        unset($proxya[20]);
        var_dump($proxya);

        file_put_contents("../proxy/zm_proxy",serialize($proxya));
        return $proxya;
    }
    public function getZMproxy(){
        $dir = '../proxy/zm_proxy';
        if(file_exists($dir)){
            $proxy_list = file_get_contents($dir);
            $proxy_list=unserialize($proxy_list);

            return $proxy_list;
        }
        else{
            $this->saveZMproxy();
            $this->getZMproxy();
        }
    }
}
// $proxy = new Proxy;

// $proxy->updateProxy();
// $res  =  $proxy->proxy.":".$proxy->port;
// echo $res."\n";