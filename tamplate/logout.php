<?php
session_start();

$_SESSION['username']=null;
$_SESSION['password']=null;
$_SESSION['role']=null;
header("location:index.php");





?>