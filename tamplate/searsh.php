<?php

include "admin/includes/database.php ";

    if (isset($_POST['submit'])) 
    {
        $searsh=$_POST['searsh'];
        $sql="SELECT * FROM post where post_tag LIKE'%$searsh%'";
        $res=mysqli_query($connection,$sql);
        if (!$res) {
            die("error".mysqli_error($connection));
            # code...
        }

        $count= mysqli_num_rows($res);
        if ($count==0) {
            echo"<h1 style=color:red>resultat not existe!!!</h1>";
            # code...
        }
        else{
              
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
                      <h1 class="page-header">
                            Page Heading
                            <small>Secondary Text</small>
                      </h1>

                                <!-- First Blog Post -->
                                <h2>
                                    <a href="#"><?php echo $post_tittre; ?></a>
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

                 <?php  
            }
                                
                                            
                                                
        }
                                            # code...
    }
?>
                        
                        
                        
                    

