<?php
header("Content-Type: application/json");
//$jsonData = '{
//    "u1":{ "user":"John", "age":22, "country":"US"},
//    "u2":{ "user":"Hans", "age":50, "country":"Denmark"},
//    "u3":{ "user":"Karsten", "age":25, "country":"Austria"},
//    "u4":{ "user":"Mikkel", "age":28, "country":"Polen"},
//    "u5":{ "user":"Andreas", "age":32, "country":"US"},
//    "u6":{ "user":"Kim", "age":22, "country":"UK"},
//    "u7":{ "user":"Pete", "age":11, "country":"UK"},
//    "u8":{ "user":"Josef", "age":99, "country":"Australia"},
//    "u9":{ "user":"Karl", "age":101, "country":"Germany"},
//    "u10":{ "user":"Mike", "age":69, "country":"France"},
//    "u11":{ "user":"Anton", "age":55, "country":"France"},
//    "u12":{ "user":"Jonathan", "age":23, "country":"Sweden"},
//    "u13":{ "user":"Duke", "age":27, "country":"Norway"},
//    "u14":{ "user":"Peter", "age":28, "country":"Afganisthan"},
//    "u15":{ "user":"David", "age":66, "country":"UK"},
//    "u16":{ "user":"Thor", "age":44, "country":"US"},
//    "u17":{ "user":"Karsten", "age":43, "country":"Philiphines"}
//}';
//$jsonData = file_get_contents("../json/mylist.json");
$var1 = $_POST["var1"];
$var2 = $_POST["var2"];
$jsonData = '{"obj1":{"propertyA":"'.$var1.'", "propertyB":"'.$var2.'"}}';
echo "$jsonData"; 
?>
  