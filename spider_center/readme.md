接口：

1.url：spider_center/api/api.php

method: POST


params:  http body  form-data   
        1.url:
        2.method:query
        3.sign:
        4 timestamp:
return: json

2.url：spider_center/api/auto.php (暂时废弃)
       期望用命令行后台启动 自动更新cookie入库，维护可用proxy列表； cookie是否真的有用有待确认；


各大网站ip测试 ：不使用代理，测试频率20次每分钟

1.360搜索：不会被封，测试时长15分钟，

 测试$url="https://www.so.com/s?ie=utf-8&fr=none&src=360sou_newhome&q=".$word[$num];
 
2.搜狗搜索：2分钟被封，

 测试$url="https://weixin.sogou.com/weixin?
 
 type=2&query=".$word[$num]."&ie=utf8&s_from=input&_sug_=n&_sug_type_=";
 
3.微博搜索：不会被封，测试时长15分钟，

 $url ="https://s.weibo.com/weibo?q=". $word[$num]."&Refer=index";
 
4.chinaso：1分钟被封，

 测试$url="http://www.chinaso.com/search/pagesearch.htm?q=".$word[$num];
 
5.汽车之家：不会被封，测试时长6分钟，

 $url="http://sou.autohome.com.cn/zonghe?q=".$word[$num]."&pvareaid=100834&entry=42";
 
6.今日头条：不会被封，测试时长4分钟，

 $url="https://www.toutiao.com/search/?keyword=".$word[$num];
 
7.一点资讯：不会被封，测试时长4分钟，

 $url = "http://www.yidianzixun.com/channel/w/$serch?searchword=$serch";

ps:今日头条和一点资讯，由于网站加载方式问题，获取不到搜索内容
