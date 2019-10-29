<?php


namespace app\lib\source;


class JwglLogin extends Recognition
{

    /**
     * @var int
     */
//    protected $rbg = 150;

    /**
     * @var array
     */
    public $data = [[31,53],[53,75],[73,95],[95,118]];

    public $id;

    public $cookieUrl;

    public $UserAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:68.0) Gecko/20100101 Firefox/68.0';

    public $yzmHost = 'http://jwgl.thxy.cn/yzm';

    public $headers = array(
        'Content-Type' =>  'application/x-www-form-urlencoded; charset=UTF-8',
    );

    public $yzm;

    public function __construct()
    {

        $this -> id = session_id();
        $_SESSION['id'] = $this -> id;
        $this -> cookieUrl = APP_PATH.'lib/source/cookie/'.$_SESSION['id'].'.txt';

        $data = $this -> data;

        parent::__construct($data);

    }

    public function yzmRequest ()
    {
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,$this->yzmHost);
        curl_setopt($curl, CURLOPT_USERAGENT, $this->UserAgent);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT,60);    // 超时设置
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);     // curl获取页面内容，不直接输出到页面
        curl_setopt($curl, CURLOPT_COOKIEJAR, $this->cookieUrl);     // 保存模拟访问时得到的cookie（这里是关键）
        curl_exec($curl);
        curl_close($curl);


        $fp = fopen(APP_PATH."lib/source/image/yzm.jpg","w");
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,$this->yzmHost);
        curl_setopt($curl, CURLOPT_USERAGENT, $this->UserAgent);
        curl_setopt($curl, CURLOPT_REFERER, 'http://jwgl.thxy.cn/');
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT,60);      // 超时设置
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);        // curl获取页面内容，不直接输出到页面
        curl_setopt($curl, CURLOPT_HEADER,0);              //设置头文件的信息作为数据流输出
        curl_setopt($curl, CURLOPT_HTTPHEADER,$this->headers);         //设置请求头
        curl_setopt($curl, CURLOPT_COOKIEFILE, $this->cookieUrl);     // 这里就是使用验证码cookie文件的地方
//        curl_setopt($curl, CURLOPT_COOKIEJAR, $this->cookieUrl);            // 保存模拟访问时得到的cookie（这里是关键）    curl_setopt($curl, CURLOPT_HEADER, 0);           // 不需要头文件
        curl_setopt($curl,CURLOPT_FILE,$fp);
        curl_exec($curl);
        fclose($fp);
        curl_close($curl);
//        $this -> loginRequest();
    }

    public function loginRequest ()
    {
        $this -> yzm = $this->run();
        $post = array(
            'account' => '20170406430121',
            'pwd' => '260033260033',
            'verifycode' => $this -> yzm,
        );
        $host = "http://jwgl.thxy.cn/login!doLogin.action";
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,$host);
        curl_setopt($curl, CURLOPT_USERAGENT, $this->UserAgent);
        curl_setopt($curl, CURLOPT_REFERER, 'http://jwgl.thxy.cn/');
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT,60);    // 超时设置
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);     // curl获取页面内容，不直接输出到页面
        curl_setopt($curl, CURLOPT_HEADER,0);           //设置头文件的信息作为数据流输出
        curl_setopt($curl, CURLOPT_HTTPHEADER,$this->headers);                         //设置请求头
        curl_setopt($curl, CURLOPT_COOKIEFILE, $this->cookieUrl);                     // 这里就是使用验证码cookie文件的地方
//        curl_setopt ( $curl , CURLOPT_COOKIE,'JSESSIONID=8DCFDE21AC119C6C80E23CDFD52E080A; browserID=3435150555');
        curl_setopt($curl, CURLOPT_POST, 1);                             //以POST方式提交
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));        //要执行的信息
        $res = curl_exec($curl);
        curl_close($curl);
//        return json_decode($res, true);
        return $res;
    }

    public function courseRequest ()
    {
        // xsbjkbcx!getKbRq.action?xnxqdm=
        // 'http://jwgl.thxy.cn/xsgrkbcx!getXsgrbkList.action';
        // http://jwgl.thxy.cn/xsgrkbcx!xskbList.action?xnxqdm=201901&zc=2
        $host = "http://jwgl.thxy.cn/xsgrkbcx!getKbRq.action?xnxqdm=201901&zc=10";
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,$host);
        curl_setopt($curl, CURLOPT_USERAGENT, $this->UserAgent);
        curl_setopt($curl, CURLOPT_REFERER, 'http://jwgl.thxy.cn/');
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT,60);    // 超时设置
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);     // curl获取页面内容，不直接输出到页面
        curl_setopt($curl, CURLOPT_HEADER,0);           //设置头文件的信息作为数据流输出
        curl_setopt($curl, CURLOPT_HTTPHEADER,$this->headers);                         //设置请求头
        curl_setopt($curl, CURLOPT_COOKIEFILE, $this->cookieUrl);                     // 这里就是使用验证码cookie文件的地方
//        curl_setopt($curl, CURLOPT_COOKIEFILE, 'JSESSIONID=8DCFDE21AC119C6C80E23CDFD52E080A; browserID=3435150555');

//        curl_setopt($curl, CURLOPT_POST, 1);                             //以POST方式提交
//        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));        //要执行的信息
        $res = curl_exec($curl);
        curl_close($curl);

        return $res;
    }


}