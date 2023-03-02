<?php
$server='localhost';
$username='root';
$password='';
$bd='projet';
global $connection;
$connection= mysqli_connect($server,$username,$password,$bd);
if(!$connection){
    die("error".mysqli_error($connection));


}
else{
   // echo "we are connected";
}









?>