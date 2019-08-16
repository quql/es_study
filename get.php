<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/17 0017
 * Time: 18:06
 */
require 'vendor/autoload.php';    //加载自动加载文件

use Elasticsearch\ClientBuilder;

$client = ClientBuilder :: create()->setHosts(['localhost:9200'])->build();

//$params = [
//    'index'=>'my_index',
//    'type'=>'my_type',
//    'id'=>'88'
//];
//
////在/ my_index / my_type / my_id获取文档
//$response = $client->get($params);
//var_dump($response);
//模糊匹配中文
//$params = [
//    'index' => 'index_002',
//    'type' => 'type_002',
//    "size" => 100, //每页个数
//    'body' => [
//        'query' => [
//            'match' => [
//                'con_ser_name' => '惠'
//            ]
//        ],
//        'sort' => ['con_price'=>['order'=>'desc']]
//    ],
//];

//Bool查询
//$params = [
//    'index'=>'index_002',
//    'type'=>'type_002',
//    "size" => 100, //每页个数
////    "from"=>1,
//    'body'=> [
//        'query'=> [
//            'bool'=> [
//                'must' => [
//                    [
//                        'match' => [ 'con_ser_name' => '惠' ],
//                    ],
//                    [
//                        'match' => [ 'con_info' => '胡浩航' ],
//                    ]
//                ],
//                'filter'=>[
//                    'term'=>['status'=>3] //完全匹配某个值
//                ],
//                'must_not'=>[
//                    [ 'match' => [ 'con_info' => '555' ] ], //筛选不等于此值的
//                ]
//            ]
//        ],
//        'sort' => ['con_price'=>['order'=>'desc']]
//    ]
//];



$params = [
    'index'=>'index_002',
    'type'=>'type_002',
    "size" => 100, //每页个数
//    "from"=>1,
    'body'=> [
        'query'=> [
            'bool'=> [
                'should'=>[
                    [
                        'match' => [ 'con_ser_name' => '惠' ],
                    ],
                    [
                        'match' => [ 'con_ser_name' => '商标' ],
                    ]
                ],
                'filter'=>[
                    'term'=>['status'=>3] //完全匹配某个值
                ]
            ]
        ],
        'sort' => ['con_price'=>['order'=>'desc']]
    ]
];
//var_dump(json_encode($params));
//$client->search($params);
//$params = [
//    'index'=>'my_index',
//    'type'=>'my_type',
//    'body'=> [
//    'query'=> [
//        'bool'=> [
//            'filter' => [
//                'term' => [
//                    'testField' => 'aa20'
//                    ]
//                ]
//            ]
//        ]
//    ]
//];


//查询字符串首先进行分析，会产生词项 [surprize, me] ，并且每个词项根据指定的 fuzziness 进行模糊化。
//$params = [
//    'index'=>'index_001',
//    'type'=>'type_001',
//    'body'=> [
//    'query'=> [
//        'match' => [
//            'con_ser_name' => [
//                'query' => '商标',
//                'fuzziness'=>"AUTO",
//                'operator'=> 'and'
//                ]
//            ]
//        ]
//
//    ]
//];


//同样， multi_match 查询也 支持 fuzziness ，但只有当执行查询时类型是 best_fields 或者 most_fields
//$params = [
//    'index'=>'my_index',
//    'type'=>'my_type',
//    'body'=> [
//        'query'=> [
//            'multi_match' => [
//                'fields' =>  ["first_name", "last_name"],
//                'query' => 'are',
//                'fuzziness' =>  'AUTO',
//            ]
//        ]
//
//    ]
//];

//$params = [
//    'index'=>'index_001',
//    'type'=>'type_001',
//    'body'=> [
//        'query'=> [
//            'fuzzy' => [
//                'con_ser_name' =>  '商标',
//            ]
//        ]
//
//    ]
//];




$results = $client->search($params);
echo '<pre>';
print_r($results);