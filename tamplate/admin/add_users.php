<?php 
    //include ob_start();
    include "includes/database.php";
  //  include "includes/function.php";

 
   

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
                        <?php
                        if (isset($_GET['update'])) {
                            $user_id=$_GET['update'];
                            $aff="SELECT * FROM users WHERE user_id='$user_id'";
                            $resaff=mysqli_query($connection,$aff);
                            while ($row=mysqli_fetch_assoc($resaff)) {
                                $username=$row['username'];
                                $password=$row['password'];
                                $nom=$row['nom'];
                                $prenom=$row['prenom'];
                                $email=$row['email'];
                                $image=$row['user_image'];
                                $role=$row['role'];
                               
                                # code...
                            }
                            
                            # code...
                        }
                        
                        ?>
                        <?php
                        if (isset($_POST['add_user'])) {
                           
                            $username=$_POST['username'];
                            $password=$_POST['password'];
                            $nom=$_POST['nom'];
                            $prenom=$_POST['prenom'];
                            $email=$_POST['email'];
                            $user_image=$_FILES['image']['name'];
                            $user_image_temp   = $_FILES['image']['tmp_name'];
                            
                            $role=$_POST['role'];
                          //  $post_coment=$_POST['post_coment'];
            
                           // $post_statut=$_POST['post_statut'];
                            move_uploaded_file($user_image_temp,"../image/$user_image");
                        

                            $password=password_hash($password,PASSWORD_BCRYPT,array('const'>=12));
                            
                          $insert="INSERT INTO users(username,password,nom,prenom,email,user_image,role)
                          VALUES('{$username}','{$password}','{$nom}','{$prenom}','{$email}','{$user_image}','{$role}')";
                             $res=mysqli_query($connection,$insert);
                             if (!$res) {
                                 die("error".mysqli_error($connection));
                                 # code...
                             }
                            # code...
                        }
                        ?>
                              <?php
                    if (isset($_POST['update_user'])) {
                        $username=$_POST['username'];
                            $password=$_POST['password'];
                            $nom=$_POST['nom'];
                            $prenom=$_POST['prenom'];
                            $email=$_POST['email'];
                            $user_image=$_FILES['image']['name'];
                            $user_image_temp   = $_FILES['image']['tmp_name'];
                            
                            $role=$_POST['role'];
                          //  $post_coment=$_POST['post_coment'];
            
                           // $post_statut=$_POST['post_statut'];
                            move_uploaded_file($user_image_temp,"../image/$user_image");
                        
                        $query="UPDATE users SET username='{$username}',password='{$password}',nom='{$nom}',
                        prenom='{$prenom}',email='{$email}',user_image='{$user_image}' WHERE user_id=$user_id";
                        $upr=mysqli_query($connection,$query);
                        if (!$upr) {
                            die("error".mysqli_error($connection));
                            # code...
                        }else{
                            echo"<p style=color:green >update done</p>";
                        }



                        # code...
                    }
                    
                    
                    
                    ?>
                        <form action="" method="post" enctype="multipart/form-data">    

                        <div class="form-group">
                    <label for="category">username</label>
                    <input type="text" class="form-control" name="username" value="<?php
                    if (isset($user_id)) {
                        echo $username;
                        # code...
                    }
                    
                    ?>">
                    
                    </div>
     
                        <div class="form-group">
                            <label for="title">password</label>
                            <input type="text" class="form-control" name="password" value="<?php
                    if (isset($user_id)) {
                        echo $password;
                        # code...
                    }
                    
                    ?>" >
                        </div>

                     


                    <!-- <div class="form-group">
                    <label for="users">Users</label>
                    <select name="post_user" id="">
                        
                    
                
                        
                    </select>
                    
                    </div> -->





                    <div class="form-group">
                        <label for="title">first name</label>
                        <input type="text" class="form-control" name="nom"value="<?php
                    if (isset($user_id)) {
                        echo $nom;
                        # code...
                    }
                    
                    ?>">
                    </div>
                    <div class="form-group">
                        <label for="title">last name</label>
                        <input type="text" class="form-control" name="prenom"value="<?php
                    if (isset($user_id)) {
                        echo $prenom;
                        # code...
                    }
                    
                    ?>">
                    </div>
                    <div class="form-group">
                        <label for="title">email</label>
                        <input type="email" class="form-control" name="email"value="<?php
                    if (isset($user_id)) {
                        echo $email;
                        # code...
                    }
                    
                    ?>">
                    </div>

                    <div class="form-group">
                        <label for="post_image">user Image</label>
                        <img whith="90" height="90" src="../image/<?php echo $image?>" alt="">
                        <input type="file"  name="image" >
                    </div>

                    <div class="form-group">
                    <label for="title">role</label>
                        <select name="role" id="">
                        <option value=""><?php
                    if (isset($user_id)) {
                        echo $role;
                        # code...
                    }
                    
                    ?></option>
                            <option value="admin">admin</option>
                            <option value="subsecriber">subsecriber</option>
                         
                        </select>
                    </div>
                    
                    
                    
                    

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="add_user" value="add user">
                         <input class="btn btn-primary" type="submit" name="update_user" value="update user">
                    </div>
                    


</form>
    


 
                         
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
