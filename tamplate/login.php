<?php
include "admin/includes/database.php";
session_start();
if (isset($_POST['login'])) {
   $username=$_POST['username'];
   $password=$_POST['password'];

   $username=mysqli_real_escape_string($connection,$username);
   $password=mysqli_real_escape_string($connection,$password);
   $query="SELECT * FROM users WHERE username = '{$username}' and password='{$password}'";
   $res=mysqli_query($connection,$query);
   if (!$res) {
      die("error".mysqli_error($connection));
      # code...
   }
 

   while($col = mysqli_fetch_assoc($res)) {
            $c_username = $col['username'];
             $c_password = $col['password'];
             $nom=$col['nom'];
             $prenom=$col['prenom'];
             $role=$col['role'];



         }
         if ($username !== $c_username && $password !==$c_password) {
            header("Location: index.php");
            # code...
         }
         else if($username == $c_username && $password ==$c_password){
            $_SESSION['username']=$c_username;
            $_SESSION['password']=$c_password;
            $_SESSION['role']=$role;
            header("Location: admin/index.php");
         }
         else {
            header("Location: index.php");
            # code...
         }
         

   
}

if (!isset($_SESSION['role'])) 
{
   //  if ($_SESSION['role']!=='admin') {
         header("Location:index.php");
        
   //      # code...
   //  }
    # code...
}

?>
<?php


?>