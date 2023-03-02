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
                        <!-- afficher all post -->
                         
                        
                        
                        
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>post id</th>
                                    <th>post categorie</th>
                                    <th>post tiitre</th>
                                    <th>post auteur</th>
                                    <th>post date</th>
                                    <th>post image</th>
                                    <th>post content </th>
                                    <th>post tag </th>
                                    <th>post comment </th>
                                    <th>post statut </th>
                                    <th>Delete </th>
                                    <th>update </th>
                                </tr>
                            </thead>
                            <tbody>
                            <!-- afficher all post -->
                            <?php
                        $query="SELECT * FROM post";
                        $res=mysqli_query($connection,$query);
                        while($row=mysqli_fetch_assoc($res)){
                            $post_id=$row['post_id'];
                            $post_cat=$row['post_cat'];
                            $post_tittre=$row['post_tittre'];
                            $post_auteur=$row['post_auteur']; 
                            $post_date=$row['post_date'];
                            $post_image=$row['post_image'];
                            $post_content=$row['post_content'];
                            $post_tag=$row['post_tag'];
                            $post_coment=$row['post_coment'];
                            $post_statut=$row['post_statut'];
                            echo"<tr>";
                            echo"<td>$post_id</td>";
                            echo"<td>$post_cat</td>";
                            echo"<td>$post_tittre</td>";
                            echo"<td>$post_auteur</td>";
                            echo"<td>$post_date</td>";
                            echo"<td><img width='100' src=../image/$post_image alt='hafidi'></td>";
                            echo"<td>$post_content</td>";
                            echo"<td>$post_tag</td>";
                            echo"<td>$post_coment</td>";
                            echo"<td>$post_statut</td>";
                            echo"<td><a href='post.php?delete={$post_id}' >delete</a></td>";
                            echo"<td><a href='add_post.php?update={$post_id}' >update</a></td>";
                            echo"</tr>";
                        }

                        if (isset($_GET['delete'])) {
                            $post_id=$_GET['delete'];
                            $delete="DELETE FROM post where post_id='$post_id'";
                            $res=mysqli_query($connection,$delete);
                            if (!$res) {
                                die("error".mysqli_error($connection));
                                header("Location:post.php");
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
