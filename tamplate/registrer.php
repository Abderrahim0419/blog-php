<?php
include "admin/includes/database.php ";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
       
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                <?php
        $query="SELECT * FROM categorie";
        $res=mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($res)) {
            $id=$row['nom_cat'];
            echo"<li style=display:inline><a href=#>{$id}</a></li>";
        }
        
        
                    ?><li>
                    <a href="registrer.php">Registration</a>
                </li>
                    <li>
                        <a href="admin">Admin</a>
                    </li>
                    <!-- <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul> -->
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
       
    </nav>


    <?php
    if (isset($_POST['submit'])) {
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];

         if (!empty($username) && !empty($email) && !empty($password) ) {
            $username=mysqli_escape_string($connection,$username);
            $email=mysqli_escape_string($connection,$email);
            $password=mysqli_escape_string($connection,$password);
    
            $query="INSERT INTO users (username,email,password,role) VALUES('{$username}','{$email}','{$password}','subsecriber') ";
            $res=mysqli_query($connection,$query);
            if (!$res) {
                die("error".mysqli_error($connection));
                # code...
            }
            else {
                $msg="<p style=color:green  ><b>bien registrer your  </b></p>";
            }
    
    
            }
            else {
                $msg="<p style=color:red  ><b> remplire your information svp </b></p>";
            }
        
            
        
        
            # code...
    }






      
    
    ?>
    <?php
    if (isset($_GET['language'])&& !empty($_GET['language'])) {
        $_SESSION['language']=$_GET['language'];

        if (isset($_SESSION['language']) && $_SESSION['language'] != $_GET['language']) {
            echo"<script type='text/javascript'> location.reload(); </script>";

            # code...
        }
    }
    
        if (isset($_SESSION['language'])) {
            include "admin/includes/". $_SESSION['language'].".php";
            # code...
        }
        else
        {
            include "admin/includes/fr.php";
            
        }
        # code...
   
    
    
    ?>
         <!-- Page Content -->
    <div class="container">
    <form class="navbar-form navbar-right" action="" method="GET" id="language">
    <div class="form-group">
    <select  name="language"  onchange="lan()" class="form-control" >
    <option value="">language</option>
    <option value="en">english</option>
    <option value="fr">français</option>
    </select>
    </div>
    
    
    </form>
    
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                    <h1><?php echo registrer;?></h1>
                    <h6><?php echo $msg; ?></h6>
                        <form role="form" action="registrer.php" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="username" class="sr-only">username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="<?php echo username;?>">
                            </div>
                             <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="<?php echo email;?>">
                            </div>
                             <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="<?php echo password;?>">
                            </div>
                    
                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="<?php echo registrer;?>r">
                        </form>
                     
                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>
    
    
 <hr>
<script>
function lan() {

   // console.log("its work");
   document.getElementById('language').submit();
    
}
</script>    
    
    
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
