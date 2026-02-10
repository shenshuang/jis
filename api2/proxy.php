<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: text/javascript; charset=utf-8');

// 接收前端传递的目标接口地址
$targetUrl = $_GET['url'] ?? '';
if (empty($targetUrl)) {
    echo 'console.error("缺少目标接口地址")';
    exit;
}

// 转发请求并返回原始数据
$ch = curl_init($targetUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1');
$response = curl_exec($ch);
curl_close($ch);

// 原样输出接口返回的原始数据
echo $response ?: 'console.error("请求失败")';
exit;
?>
