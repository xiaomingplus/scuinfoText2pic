<?php
// header('Content-Type: application/json; charset=utf-8');

require 'vendor/autoload.php';
$config = require_once('./config.php');
require_once('./upyun-php-sdk/upyun.class.php');
if(isset($_POST['text'])){
$text=isset($_POST['text'])?$_POST['text']:"";
$footer = isset($_POST['footer'])?$_POST['footer']:"";

$by = '由scuinfo.com根据热门程度自动生成，并不一定同意此观点! '."\n".'微信关注scuinfo后可直接匿名发布内容到scuinfo.com';
$transform = new Text2pic\Transform($by,'./uploads','http://docker.dev/uploads');
$result = $transform->generate($text,$footer);

if($result['code']==200){
//到这里图片已生成，下面是上传到upyun的代码
$upyun = new UpYun($config['upyun_bucket'], $config['upyun_user'], $config['upyun_password']);
try {
     $opts = array(
        UpYun::CONTENT_MD5 => md5(file_get_contents($result['data']['path']))
    );
    $fh = fopen($result['data']['path'], 'rb');
    $fileName = '/uploads/'.md5($result['data']['path']).'.jpg';
    $rsp = $upyun->writeFile($fileName, $fh, True, $opts);   // 上传图片，自动创建目录
    fclose($fh);
    unlink($result['data']['path']); //删除服务器的图片
    $result = array(
		"code"=>200,
		"message"=>"ok",
		"data"=>array(
			"url"=>$config['upyun_base_pic_url'].$fileName
			)
		);
    echo json_encode($result,JSON_UNESCAPED_UNICODE);
}catch(Exception $e) {

    	$result = array(
		"code"=>2003,
		"message"=> $e->getMessage()
		);
      echo json_encode($result,JSON_UNESCAPED_UNICODE);
}

}else{
	$result = array(
		"code"=>2002,
		"message"=>$result['message']
		);
      echo json_encode($result,JSON_UNESCAPED_UNICODE);
}

}else{
  	$result = array(
		"code"=>2001,
		"message"=>"缺少参数 text"
		);
      echo json_encode($result,JSON_UNESCAPED_UNICODE);
}

