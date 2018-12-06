<?php
/**
 * Created by PhpStorm.
 * User: zhima
 * Date: 2018/11/5
 * Time: 下午1:42
 */

class Tools_url
{
    /**
     * 该函数用于网址标准化
     * @param $base  基准网址
     * @param $href  不标准的连接
     * @return string
     */
    static public function standardUrl($base,$href){
        $base=explode('?',$base);
        $batha= explode('/',$base[0]);
        $hrefa= explode('/',$href);

        if($hrefa[0] == "http:" || $hrefa[0] == "https:"){
            return  $href;
            //  print "--1";
        }else{
            $return=$batha[0]."/";
            if(count($hrefa)==1){
                for($i=1;$i< count($batha)-1 ;$i++){
                    $return .=$batha[$i]."/";

                }
                $return .=$hrefa[0];
                return  $return;
                //  print "--2";
            }else{
                $k_id=0;
                $n_id=0;
                $b_id=0;
                $w_id=0;
                foreach( $hrefa as $hrefs){
                    if($hrefs == ".."){
                        $k_id++;
                    }
                    else if($hrefs == "."){
                        $n_id++;
                    }
                    else if($hrefs == ""){
                        $b_id++;
                    }else{
                        $w_id++;
                    }

                }

                if($k_id !==0 ){
                    if($k_id > count($batha)-4){
                        return  "href: out of range"."\n";
                    }  else{
                        for($i=1;$i<count($batha)-$k_id-1;$i++)
                        {
                            $return .=$batha[$i]."/";
                        }
                        for($i=count($hrefa)-$w_id;$i<count($hrefa)-1;$i++){
                            $return.=$hrefa[$i]."/";
                        }
                        $return.=$hrefa[count($hrefa)-1];
                        //   print "kid not 0 ".$return;
                        return  $return;
                    }

                    // print "--3";
                }else{
                    for($i=1;$i<count($batha)-1;$i++)
                    {
                        $return .=$batha[$i]."/";
                    }
                    for($i=count($hrefa)-$w_id;$i<count($hrefa)-1;$i++){
                        $return.=$hrefa[$i]."/";
                    }
                    $return.=$hrefa[count($hrefa)-1];
                    return  $return;
                    //  print "--4";
                }

            }
        }
    }



    static public function getDomain($url){

        $parseInfo = parse_url($url);

        return $parseInfo["scheme"]."://".$parseInfo["host"]."/";

    }


    /**
     * @param $url
     * @param $rules_throw
     * @param $rules_save
     * @param $rules_match
     * @return array
     */
    static public function urlMatch($url,$rules_throw,$rules_save,$rules_match)
    {
        $throw_flag = 0;
        //print_r($url);
        foreach ($rules_throw as $t )
        {
            $m = preg_match($t->url ,$url);
            if($m == 1)
            {
                $throw_flag = 1;//丢弃
                break;
            }
        }


        if($throw_flag)
        {
            return array(
                "code"=>101,
                "url"=>$url
            );
        }


        $save_flag = 0;
        $match_flag = 0;
        foreach ($rules_save as $s )
        {

            $m = preg_match($s->url ,$url);
            if($m == 1)
            {
                if($s->is_param==2)
                {
                    $url = Env::getUrlIgnoreParam($url);
                }

                $save_flag = 1;//保留
                break;
            }

        }

        if($save_flag)
        {
            return array(
                "code"=>2,
                "url"=>$url
            );
        }


        foreach ($rules_match as $ma )
        {

            $m = preg_match($ma->url ,$url);
            if($m == 1)
            {

                $match_flag = 1;//匹配
                break;
            }
        }


        if($match_flag)
        {
            return array(
                "code"=>1,
                "url"=>$url
            );
        }

    }








}