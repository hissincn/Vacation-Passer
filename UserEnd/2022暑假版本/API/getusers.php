<?php require('../function.php');



$asksql = getsql("SELECT * FROM users");
while($row = mysqli_fetch_assoc($asksql))
{
    $all[]=$row;
    
}
//print_r($all);
//$arr = array('phone'=>$row["phone"],'pass'=>$row["password"],'stu'=>$row["stunum"]);
//    header('Content-Type:application/json; charset=utf-8');
   
mysqli_free_result($asksql);
 exit(json_encode($all));



