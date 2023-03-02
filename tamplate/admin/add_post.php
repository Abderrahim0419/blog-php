<?php 
    //include ob_start();
    include "includes/database.php";
   // include "includes/function.php";

 
   

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
                            $post_id=$_GET['update'];
                            $aff="SELECT * FROM post WHERE post_id='$post_id'";
                            $resaff=mysqli_query($connection,$aff);
                            while ($row=mysqli_fetch_assoc($resaff)) {
                                $post_cat=$row['post_cat'];
                                $post_tittre=$row['post_tittre'];
                                $post_auteur=$row['post_auteur'];
                                $post_image=$row['post_image'];
                                $post_content=$row['post_content'];
                                $post_tag=$row['post_tag'];
                                # code...
                            }
                            
                            # code...
                        }
                        
                        ?>
                        <?php
                        if (isset($_POST['create_post'])) {
                           // $post_id=$_POST['post_id'];
                            $post_cat=$_POST['post_cat'];
                            $post_tittre=$_POST['post_tittre'];
                            $post_auteur=$_POST['post_auteur'];
                            $post_date=date('d-m-y');
                            $post_image=$_FILES['image']['name'];
                            $post_image_temp   = $_FILES['image']['tmp_name'];
                            $post_content=$_POST['post_content'];
                            $post_tag=$_POST['post_tag'];
                          //$post_coment=$_POST['post_coment'];
            
                           // $post_statut=$_POST['post_statut'];
                            move_uploaded_file($post_image_temp,"../image/$post_image");



                            
                          $insert="INSERT INTO post(post_cat,post_tittre,post_auteur,post_image,post_content,post_tag)
                          VALUES($post_cat,'{$post_tittre}','{$post_auteur}','{$post_image}','{$post_content}','{$post_tag}')";
                             $res=mysqli_query($connection,$insert);
                             if (!$res) {
                                 die("error".mysqli_error($connection));
                                 # code...
                             }
                            # code...
                        }
                        ?>
                              <?php
                    if (isset($_POST['update_post'])) {
                        // $post_id=$_POST['post_id'];
                        $post_cat=$_POST['post_cat'];
                        $post_tittre=$_POST['post_tittre'];
                        $post_auteur=$_POST['post_auteur'];
                        $post_date=date('d-m-Y:h-m-s');
                        $post_image=$_FILES['image']['name'];
                        $post_image_temp   = $_FILES['image']['tmp_name'];
                        $post_content=$_POST['post_content'];
                        $post_tag=$_POST['post_tag'];
                        $post_id=$_GET['update'];
                      //  $post_coment=$_POST['post_coment'];
        
                       // $post_statut=$_POST['post_statut'];
                        move_uploaded_file($post_image_temp,"../image/$post_image");
                        $query="UPDATE post SET post_cat='{$post_cat}',post_auteur='{$post_auteur}',post_image='{$post_image}',
                        post_content='{$post_content}',post_tag='{$post_tag}' WHERE post_id=$post_id";
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
                    <label for="category">Category</label>
                    <select name="post_cat" id="" value="<?php     if (isset($post_id)){
                        echo $nom_cat;
                        }
                        ?>">
                      <?php
                        $sql="SELECT * FROM categorie";
                        $res=mysqli_query($connection,$sql);
                        while ($row=mysqli_fetch_assoc($res)) {
                            $id=$row['id'];
                            $nom_cat=$row['nom_cat'];
                            echo "<option value='{$id}'>{$nom_cat}</option>";
                    
                            # code...
                        }
                        if (isset($post_id)){
                        echo $nom_cat;
                        }

                        
                      
                      ?>
                        
                    </select>
                    
                    </div>
     
                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input type="text" class="form-control" name="post_tittre" value="<?php if (isset($post_id)) {
                            echo $post_tittre;
                            # code...
                        } ?>">
                        </div>

                     


                    <!-- <div class="form-group">
                    <label for="users">Users</label>
                    <select name="post_user" id="">
                        
                    
                
                        
                    </select>
                    
                    </div> -->





                    <div class="form-group">
                        <label for="title">Post Author</label>
                        <input type="text" class="form-control" name="post_auteur" value="<?php if (isset($post_id)) {
                            echo $post_auteur;
                            # code...
                        } ?>">
                    </div>
                    
                    

                    <div class="form-group">
                    <label for="title">statut</label>
                        <select name="post_status" id="">
                            <option value="draft">Post Status</option>
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                    
                    
                    
                    <div class="form-group">
                        <label for="post_image">Post Image</label>
                        <img whith="90" height="90" src="../image/<?php echo $post_image?>" alt="">
                        <input type="file"  name="image" >
                    </div>

                    <div class="form-group">
                        <label for="post_tags">Post Tags</label>
                        <input type="text" class="form-control" name="post_tag">
                    </div>
                    
                    <div class="form-group">
                        <label for="post_content">Post Content</label>
                        <textarea class="form-control "name="post_content" id="" cols="30" rows="10" >
                         <?php if (isset($post_id)) {
                            echo $post_content;# code...
                        }
                        ?>
                        </textarea>
                    </div>
                    
                    

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="update_post" value="update post">
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
