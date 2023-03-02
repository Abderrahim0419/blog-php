<?php 
    //include ob_start();
 
   

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


<div class="col-xs-6">
                            <?php
                            include "includes/database.php";
                            if (isset($_POST['add'])) {
                                $nom_cat=$_POST['nom_cat'];
                                if ($nom_cat==""|empty($nom_cat)) {
                                    echo"<p style=color:red>ce champs ne peu pas etre vide</p>";
                                    # code...
                                }
                                else{
                                    $sql="INSERT INTO categorie (nom_cat) values('$nom_cat')";
                                    $result=mysqli_query($connection,$sql);
                                    if (!$result) {
                                        die("error".mysqli_error($connection));
                                        # code...
                                    }


                                }
                               
                                # code...
                            }
                            ?>
                          


                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-tittre">add Categories</label>
                                    <?php 
                                    if (isset($_GET['update'])) {
                                        $id_cat=$_GET['update'];
                                                $query="SELECT * FROM categorie where id=$id_cat";
                                        $res=mysqli_query($connection,$query);
                                
                                        while($row = mysqli_fetch_assoc($res)) {
                                            $id_cat=$row['id'];
                                            $nom_cat=$row['nom_cat'];
                                            
                                        }
                                            
                                        # code...
                                    }
                                 
                                    ?>
                                    <input type="text" value="<?php if (isset($id_cat)) {
                                        echo $nom_cat;
                                        # code...
                                    } ?>" class="form-control" name="nom_cat">
                                </div>
                                <div class="form-group">
                                    <input type="submit"  class="btn btn-primary" name="add" value="add category">
                                    <input type="submit"  class="btn btn-primary" name="update" value="update category">
                                </div>

                            </form>
                            

                                  
                                
                            <?php
                            if (isset($_POST['update'])) {
                                $id_cat=$_GET['update'];
                                $nom_cat=$_POST['nom_cat'];

                                $query_="UPDATE categorie SET nom_cat='$nom_cat'  WHERE id=$id_cat";
                                $up_res=mysqli_query($connection,$query_);
                                if (!$up_res) {
                                    die("error".mysqli_error($connection));
                                        # code...
                                }
                                header("Location:categorie.php");
                            }
                            
                            ?>

</div>
                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->
                    
                
                <!-- add cat -->
                    <div class="col-xs-6">
                            <div>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th> nom Categories </th>
                                </tr>
                            </thead>
                            <tbody>
                                <thead>
                                    <tr>
                                        
                                    </tr>
                                </thead>
                            </tbody>

                            <?php
                   include "includes/database.php";
                            $query="SELECT * FROM categorie";
                            $res=mysqli_query($connection,$query);
                            while ($a=mysqli_fetch_assoc($res)) {
                                $id=$a['id'];
                                $nom_cat=$a['nom_cat'];
                                echo"<tr>";
                                echo"<td>{$id}</td>";
                                echo"<td>{$nom_cat}</td>";
                                echo"<td><a href='categorie.php?delete={$id}'>delete</a></td>";
                                echo"<td><a href='categorie.php?update={$id}'>update</a></td>";
                                echo"</tr>";
                                # code...
                            }

                        ?>
                           
                           <?php
                          //  include "includes/database.php";
                            if (isset($_GET['delete'])) {
                                $id_cat=$_GET['delete'];
                                $query_="DELETE FROM categorie WHERE id={$id_cat}";
                                $del_res=mysqli_query($connection,$query_);
                               header("Location : categorie.php");
                                # code...
                            }
                            ?>
                           
                            
                           
                        </table>
                        </div>

                </div>

                  
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
