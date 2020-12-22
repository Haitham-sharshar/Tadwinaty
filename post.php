<?php include "include/db.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تدويناتى</title>
    <!--Bootstrap-->

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-rtl.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!--Start NavBar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">تدويناتى</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav  ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="#">عن المدونة</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">شروحات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">منوعات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">تواصل معنا</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--End NavBar-->

    <!--Start Content-->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <?php 
                    $id = $_GET['id'];
                    $query = "SELECT posts.postTitle , posts.postImage ,posts.id, posts.postAuthor , posts.postContent , posts.postDate , categories.categoryName  FROM posts INNER JOIN categories on categories.id = posts.postCategory WHERE posts.id =$id  ";
                    $result = mysqli_query($conn,$query);
                  $row = mysqli_fetch_assoc($result);
                        ?>
                    <div class="post">
                        <div class="post-image">
                            <img src="upload/<?php echo $row['postImage'];?>">
                        </div>
                        <div class="post-title">
                            <h4><?php echo $row['postTitle'];?></h4>
                        </div>
                        <div class="post-details">
                            <p class="post-info">
                                <span><i class="fas fa-user"></i> <?php echo $row['postAuthor'];?></span>
                                <span><i class="far fa-calendar-alt"></i> <?php echo $row['postDate'];?></span>
                                <span><i class="fas fa-tags"> </i> <?php echo $row['categoryName'];?></span>
                            </p>
                         <p class="post-Content">
                          <?php echo $row['postContent'];?>
                         </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <!--Categories-->
                    <div class="categories">
                        <h4>التصنيفات</h4>
                        <ul>
                            <?php
                            $sql = "SELECT * FROM categories";
                            $res = mysqli_query($conn,$sql);
                            while ($row = mysqli_fetch_assoc($res)){
                            ?>
                            <li>
                                <a href="category.php?category_id=<?php echo $row['id'];?>">
                                    <span><i class="fas fa-tags"> </i> </span>
                                    <span><?php echo $row['categoryName'];?></span>
                                </a>
                            </li>
                      <?php
                        } 
                        ?>
                        </ul>
                    </div>
                    <!--End Categories-->

                    <!-- Start Latest posts-->
                    <div class="last-posts">
                        <h4>احدث المنشورات</h4>
                        <ul>
                        <?php
                            $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 5";
                            $res = mysqli_query($conn,$sql);
                            while ($row = mysqli_fetch_assoc($res)){
                            ?>
                            <li>
                               
                            <a href="post.php?id=<?php echo $row['id'];?>">
                                    <span class="span-image"><img src="upload/<?php echo $row['postImage']; ?>" alt="img"></span>
                                    <span><?php echo $row ['postTitle'];?></span>
                                </a>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>


                    <!-- End Latest posts-->
                </div>
            </div>
        </div>
    </div>


    <!--End Content-->

    <!-- Start Footer-->
    <footer>
        <p>جميع الحقوق محفوظة <i class="fa fa-copyright" aria-hidden="true"></i> 2020 </p>
    </footer>

    <!-- End Footer-->


    <!--BOOtstrap and jquery Scripts-->
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="js/all.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>