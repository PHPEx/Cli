<?php
$array = array();
$params = array_slice($argv, 1);
foreach($params as $key){
    if(strpos($key,'--')>-1){
        list($param,$value) = explode('=',$key);
        $array[str_replace('--','',$param)] = $value;
    }
}
//print_r($argv);
print_r($array);



$str = 'nome' . PHP_EOL;
$str .= 'didata' . PHP_EOL;
//print_r($str);
//print_r($params);
//print_r($argv);
//$array = array();
//foreach($params as $key => $value){
//    if(is_array($value))
//    {
//        $val = array_values($value);
//        $index = array_keys($value);
//        $array[$index[0]]=$val[0];
//    }
//}
//
//print_r($array);
