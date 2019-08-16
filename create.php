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
 * 创建索引
 */

//$params = [
//    'index'=>'my_index',
//    'type'=>'my_type',
//    'id'=>1,
//    'body'=> [
//        'testField'=>'abcaaa',
//        'title' => '商品编码000'
//    ]
//];
//$response = $client->index($params);


/**
 *批量 创建索引
 */
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname="employees";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM contract";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
        $params['body'][] = [
            'index' => [
                '_index' => 'index_002',
                '_type' => 'type_002',
            ]
        ];

        $params['body'][] = [
            'contract_id' => $row['contract_id'],
            'con_bu_id' => $row['con_bu_id'],
            'con_ser_id'=>$row['con_ser_id'],
            'con_ser_name'=>$row['con_ser_name'],
            'con_price'=>$row['con_price'],
            'con_info'=>$row['con_info'],
            'con_creater'=>$row['con_creater'],
            'status'=>$row['status'],
            'now_uid'=>$row['now_uid'],
            'party_A'=>$row['party_A'],
            'information'=>$row['information']
        ];
    }
    $responses = $client->bulk($params);
} else {
    echo "0 results";
}
$conn->close();

//$sql = "SELECT * FROM employees WHERE first_name LIKE '%Ar%'";
//$result = $conn->query($sql);
//if ($result->num_rows > 0) {
//    while($row = $result->fetch_assoc()) {
//        var_dump($row);
//    }
//}

/**
 * 删除索引
 */
//my_index/_delete_by_query?refresh  post方式
//$params = [
//    'index'=>'my_index',
//    'type'=>'my_type',
//    'id'=>'my_id',
//];
//$response = $client->delete($params);
//$params = [
//    'index' => 'my_index'
//];
//$res = $client->indices()->delete($params);




