<?php
/**
 *
 * Author: Kitty.Cheng
 * Date: 2017/11/9
 * Time: 15:36
 * Link: www.gyang.net
 * Email: kitty.cheng@gyang.net
 */

$data = [
    ['id'=>1001,'name'=>'张三','age'=>'18','sex'=>'男','info'=>'我是"超人"'],
    ['id'=>1002,'name'=>'小思','age'=>'18','sex'=>'女','info'=>'我是"仙女"'],
    ['id'=>1003,'name'=>'小静','age'=>'16','sex'=>'女','info'=>'我是"小仙女"'],
    ['id'=>1004,'name'=>'小婷','age'=>'15','sex'=>'女','info'=>'我是"小妖精"'],
];
$str = '';
foreach ($data as $k=>$v) {

    foreach ($v as $i=>$j) {
        $temp = str_replace('"',"\"",$j);
        echo $j;
        $str .= $temp.',';
        echo "<br>";
//        echo $str;
    }
//    echo $str;
    $str .= $str."\r\n";
}
//p($str);


/**
 * 打印函数
 * @param type $arr
 */
function p($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

die;

//$file_name = uniqid().'.csv';
//
//header('Content-Type: application/download');
//header("Content-type:text/csv;");
//header("Content-Disposition:attachment;filename=" . $file_name);
//header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
//header('Expires:0');
//header('Pragma:public');
//
//
//foreach ($data as $k=>$v) {
//    foreach ($v as $i=>$j) {
//        $temp = str_replace('"',"\"\"",$j);
//        echo $temp.',';
//    }
//    echo "\r\n";
//}
//die;
