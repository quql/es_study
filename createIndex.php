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

/**
 * 创建索引,指定字段映射类型
 */

$params = [
    'index' => 'index_002',
    'body' => [
        'settings' => [
            'number_of_shards' => 3,
            'number_of_replicas' => 2
        ],
        'mappings' => [
            'type_002' => [
                '_source' => [
                    'enabled' => true
                ],
                'properties' => [
                    'contract_id' => [
                        'type' => 'text',
                    ],
                    'con_bu_id' => [
                        'type' => 'integer',
                    ],
                    'con_ser_id' => [
                        'type' => 'integer',
                    ],
                    'con_ser_name' => [
                        'type' => 'text',
                    ],
                    'con_price' => [
                        'type' => 'float',
                    ],
                    'con_info' => [
                        'type' => 'text',
                    ],
                    'con_creater' => [
                        'type' => 'text',
                    ],
                    'status' => [
                        'type' => 'integer',
                    ],
                    'now_uid' => [
                        'type' => 'text',
                    ],
                    'party_A' => [
                        'type' => 'text',
                    ],
                    'information' => [
                        'type' => 'text',
                    ],
                ]
            ]
        ]
    ]
];
$response = $client->indices()->create($params);
var_dump($response);





