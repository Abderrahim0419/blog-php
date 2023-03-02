<?php
include "database.php";
function user_online()
{
        
            global $connection;

                    $session= session_id();
                    $time= time();
                    $sec=30;
                    $time_out=$time-$sec;
                    $sql="SELECT * FROM user_online WHERE session='$session'";
                    $res=mysqli_query($connection,$sql);
                    $count=mysqli_num_rows($res);
                    if ($count==NULL) {
                        mysqli_query($connection,"INSERT INTO user_online(session,time) VALUES('{$session}','{$time}')");
                        # code...
                    }
                    else {
                        mysqli_query($connection,"UPDATE user_online SET time=$time WHERE session='$session'");

                        # code...
                    }
                    $user=mysqli_query($connection,"SELECT * FROM user_online where time>'$time_out'");
                    return $count_u=mysqli_num_rows($user);

                    //  $count_u=mysqli_num_rows($user);
                
            # code...
        }



?>