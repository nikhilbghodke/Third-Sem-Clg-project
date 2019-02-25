<?php
include "connection.php";
$arr=$database->getReference('cms')->getChild('learn')->getChild('1')->getValue();
//var_dump($arr->push(['shreyas'=>'nothing']));
//$varr=$arr->getChild('shreyas')->remove();
//$cat=$arr['categories'];
foreach($arr as $key=>$value)
  {
	  
  }
print_r($arr);
?>