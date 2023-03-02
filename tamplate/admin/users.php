<?php 
    //include ob_start();
    include "includes/database.php";
   

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- nav -->
<?php include "includes/nav.php"?>
    <div id="wrapper">

    
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Welcome to admin 
                            <small>auteur</small>
                        </h1>

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>user id</th>
                                    <th>username</th>
                                    <th>password</th>
                                    <th>firstname</th>
                                    <th>lastname</th>
                                    <th>email</th>
                                    <th>user image </th>
                                    <th> role </th>
                                    <th>rand_slat </th>
                                    <th>Delete </th>
                                    <th>update </th>
                                </tr>
                            </thead>
                            <tbody>
                            <!-- afficher all post -->
                            <?php
                        $query="SELECT * FROM users";
                        $res=mysqli_query($connection,$query);
                        while($row=mysqli_fetch_assoc($res)){
                            $user_id=$row['user_id'];
                            $username=$row['username'];
                            $password=$row['password'];
                            $nom=$row['nom']; 
                            $prenom=$row['prenom'];
                            $email=$row['email'];
                            $image=$row['user_image'];
                            $rol=$row['role'];
                            $rand_slat=$row['rand_salt'];
            
                            echo"<tr>";
                            echo"<td>$user_id</td>";
                            echo"<td>$username</td>";
                            echo"<td>$password</td>";
                            echo"<td>$nom</td>";
                            echo"<td>$prenom</td>";
                            echo"<td>$email</td>";
                            echo"<td><img width='100' src=../image/$image alt='hafidi'></td>";
                            echo"<td>$rol</td>";
                            echo"<td>$rand_slat</td>";
                            echo"<td><a onClick=\"JavaScript: return confirm('you want delete')\" href='users.php?delete={$user_id}' >delete</a></td>";
                            echo"<td><a  href='add_users.php?update={$user_id}' >update</a></td>";
                            echo"</tr>";
                        }

                        if (isset($_GET['delete'])) {
                            $user_id=$_GET['delete'];
                            $delete="DELETE FROM users where user_id ='{$user_id}'";
                            $res=mysqli_query($connection,$delete);
                            if (!$res) {
                                die("error".mysqli_error($connection));
                                header("Location:users.php");
                                # code...
                            }
                            # code...
                        }
                        
                        
                        
                        
                        ?>
                               
                            </tbody>
                        </table>

 
                         
     <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
