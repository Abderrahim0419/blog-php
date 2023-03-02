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
        
        
        ?>
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

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php include "searsh.php";?>
        
                <?php
                $query="SELECT * FROM post ";
                $res=mysqli_query($connection,$query);
                while($row=mysqli_fetch_assoc($res)){
                    $post_id=$row['post_id'];
                    $post_tittre=$row['post_tittre'];
                    $post_auteur=$row['post_auteur']; 
                    $post_date=$row['post_date'];
                    $post_image=$row['post_image'];
                    $post_content=$row['post_content'];
                    $post_tag=$row['post_tag'];
                    $post_coment=$row['post_coment'];
                    $post_statut=$row['post_statut'];
                    ?>
                      <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_tittre; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_auteur; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="image/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

              <?php  }
                ?>
                 
                 <?php
                 $query="SELECT * FROM post WHERE post_id='3'";
                 $res=mysqli_query($connection,$query);
                 while($row=mysqli_fetch_assoc($res)){
                     $post_tittre=$row['post_tittre'];
                     $post_auteur=$row['post_auteur']; 
                     $post_date=$row['post_date'];
                     $post_image=$row['post_image'];
                     $post_content=$row['post_content'];
                     $post_tag=$row['post_tag'];
                     $post_coment=$row['post_coment'];
                     $post_statut=$row['post_statut'];
                     ?>


                     <!-- Second Blog Post -->
                     <h2>
                         <a href="#">Blog Post Title</a>
                     </h2>
                     <p class="lead">
                         by <a href="index.php"><?php echo $post_tittre;?></a>
                     </p>
                     <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                     <hr>
                     <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                     <hr>
                     <p><?php echo $post_content;?></p>
                     <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
     
                     <hr>
                 
                 
                 
                <?php }
                 ?>
                
                <!-- Second Blog Post -->
                <h2>
                    <a href="#">Blog Post Title</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, quasi, fugiat, asperiores harum voluptatum tenetur a possimus nesciunt quod accusamus saepe tempora ipsam distinctio minima dolorum perferendis labore impedit voluptates!</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>



              

                <!-- Third Blog Post -->
                <h2>
                    <a href="#">Blog Post Title</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, voluptates, voluptas dolore ipsam cumque quam veniam accusantium laudantium adipisci architecto itaque dicta aperiam maiores provident id incidunt autem. Magni, ratione.</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                   
                    <form action="" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control"name="searsh">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"name="submit" >
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                        <!--login password-->
                        <div class="well">
                    <h4>Connection</h4>
                   
                    <form action="login.php" method="post">
                        
                    <div class="input-group">
                        <input type="text" class="form-control"name="username"placeholder="entre your username"><br><br>
                        <input type="password" class="form-control"name="password"placeholder="enter your password"> <br><br>
                     
                        <input class="btn btn-primary" type="submit" name="login" value="Log In"><br><br>
                    </div>
                    </form>
                </div>
                <!--login password-->
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                                <?php
                                 $query="SELECT * FROM categorie";
                                 $res=mysqli_query($connection,$query);
                         
                                 while($row = mysqli_fetch_assoc($res)) {
                                     $id=$row['nom_cat'];
                                     echo"<li style=text-decoration:none><a href=#>{$id}</a></li>";
                                 }

                                
                                ?>

                            <ul class="list-unstyled">
                                <!-- <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li> -->
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">

                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

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
