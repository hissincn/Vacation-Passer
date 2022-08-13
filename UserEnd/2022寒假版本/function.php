<?php
$servername="localhost";
$username="";
$password="";
$dbname = "";


global $servername,$username,$password,$dbname;
$conn=mysqli_connect($servername,$username,$password,$dbname);
global $conn;
function getall($sql_order)
{
    global $conn;
    $sql_result = mysqli_fetch_all(mysqli_query($conn,$sql_order));
    return $sql_result;
}
function getarray($sql_order)
{
    global $conn;
    $sql_result = mysqli_fetch_array(mysqli_query($conn,$sql_order));
    return $sql_result;
}
function getsql($sql_order)
{
    global $conn;   
    $sql_result = mysqli_query($conn,$sql_order);
    return $sql_result;
}
function getrow($sql_order)
{
    global $conn;
    $sql_result =mysqli_fetch_row(mysqli_query($conn,$sql_order));
    return $sql_result;
}
function getassoc($sql_order)
{
    global $conn;   
    $sql_result =mysqli_fetch_assoc(mysqli_query($conn,$sql_order));
    return $sql_result;
}
function getfield($sql_order)
{
    global $conn;   
    $sql_result =mysqli_fetch_field(mysqli_query($conn,$sql_order));
    return $sql_result;
}

function countUseNum(){
    return getrow("SELECT count(*) FROM users")[0];
}
function runDay(){
    return round((strtotime(date("Y-m-d"))-strtotime("2022-1-14"))/3600/24);
}

$domain="https://你的域名/";

function getLogs(){
    return getrow("SELECT * FROM log order BY date DESC limit 1");
}

function freecon(){
    global $conn;
    mysqli_close($conn);
}


?>