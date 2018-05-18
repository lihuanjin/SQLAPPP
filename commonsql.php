<?php
require_once 'mysql.php';
/* 配置连接参数 */
$config = array(
  'type' => 'mysql',
  'host' => 'localhost',
  'username' => 'test',
  'password' => '123456',
  'database' => 'usertest',
  'port' => '3306'
);

// 生成一个PHP数组
$data = array();
$data['type'] = 'mysql';
$data['host'] = 'localhost';
$data['username'] ='test';
$data['password'] ='123456';
$data['database'] ='usertest';
$data['port'] ='3306';

// 把PHP数组转成JSON字符串
$json_string = json_encode($data);

// 写入文件
file_put_contents('database.json', $json_string);



/* 连接数据库 */
$mysql = new mysql();
$mysql->connect($config);
/* 查询数据 */
//1、查询所有数据
$table = 'mysqli';//数据表
$num = $mysql->select($table);
echo '共查询到' . $num . '条数据';
print_r($mysql->fetchAll());
//2、查询部分数据
$field = array('username', 'password'); //过滤字段
$where = 'id % 2 =0';          //过滤条件
$mysql->select($table, $field, $where);
print_r($mysql->fetchAll());
/* 插入数据 */
$table = 'mysqli';//数据表
$data = array(  //数据数组
 'username' => 'admin',
  'password' => sha1('admin')
);
$id = $mysql->insert($table, $data);
echo '插入记录的ID为' . $id;
/* 修改数据 */
$table = 'mysqli';//数据表
$data = array(
  'password' => sha1('nimda')
);
$where = 'id = 44';
$rows = $mysql->update($table, $data, $where);
echo '受影响的记录数量为' . $rows . '条';
/* 删除数据 */
$table = 'mysqli';
$where = 'id = 45';
$rows = $mysql->delete($table, $where);
echo '已删除' . $rows . '条数据';
