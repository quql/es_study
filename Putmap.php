<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/17 0017
 * Time: 16:46
 */
require 'vendor/autoload.php';    //加载自动加载文件

use Elasticsearch\ClientBuilder;

$client = ClientBuilder :: create()->setHosts(['localhost:9200'])->build();


//Put Mappings API 允许你更改或增加一个索引的映射。修改text,可用排序
//$params = [
//    'index' => 'index_001',
//    'type' => 'type_001',
//    'body' => [
//        'type_001' => [
//            '_source' => [
//                'enabled' => true
//            ],
//            'properties' => [
//                'con_price' => [
//                    'type' => 'text',
//                    'fielddata' => true
//                ]
//            ]
//        ]
//    ]
//];



// Update the index mapping
//$client->indices()->putMapping($params);
echo '<pre>';
//获取索引映射信息
var_dump($response = $client->indices()->getMapping());