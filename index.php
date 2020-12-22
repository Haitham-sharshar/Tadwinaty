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
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">


</head>

<body>

    <!--Start NavBar-->

    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <li style="list-style: none">
                    <?php session_start();
				if(!empty($_SESSION['username'])){
					echo "<label style=color:black;> مرحبا"." ". $_SESSION['username'] ." </label> <a style=color:firebrick; href=logout.php> (تسجيل خروج)</a>";
						}
						else
						echo "<a style=color:firebrick; href=signup.php>تسجيل </a> or <a style=color:firebrick; href=login.php>تسجيل دخول</a>";
                        ?></li>
            </div>
            <div class="col-sm-2">
                <a href="https://www.facebook.com/haitham.sharshar.1" target="_blanck"><i
                        class="fab fa-facebook fa-1x"></i></a>
                <a href="https://www.instagram.com/haitham.sharshar/" style="color: brown" target="_blanck"> <i
                        class="fab fa-instagram fa-1x"></i></a>
                <a href="https://twitter.com/Haythamsharshar" target="_blanck"> <i class="fab fa-twitter"></i></a>
                <a href="contact.php" target="_blanck" style="color: green;" target="_blanck"><i
                        class="fab fa-whatsapp"></i></a>
            </div>

        </div>
    </div>











    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">

            <a class="navbar-brand" href="index.php">تطبيقاتي</a>
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
                        <a class="nav-link" href="#fff">شروحات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">منوعات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.facebook.com/haitham.sharshar.1" target="_blanck">تواصل
                            معنا</a>
                    </li>


                    <li>
                        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                            <input class="form-control mr-sm-4" type="search" placeholder="البحث فى المدونة ..."
                                aria-label="search" name="search">
                    </li>
                    <li>
                        <input class="btn2 btn-secondary " name="submit1" type="submit" value="بحث" style=" border-radius: 10px;  margin-top: 3px;
"> </form>
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
                    <!--Start Search Code-->
                    <?php                    
                      if(isset($_POST['submit1'])){
                           $sub = $_POST['search'];
                           $sql = "SELECT posts.postTitle , posts.postImage ,posts.id, posts.postAuthor , posts.postContent , posts.postDate , categories.categoryName  FROM posts INNER JOIN categories on categories.id = posts.postCategory WHERE (postTitle) LIKE '%%$sub%%' ";
                           $resu = mysqli_query($conn,$sql);        
                         while( $row = mysqli_fetch_assoc($resu)){ 
                       ?>
                    <div class="post">
                        <div class="post-image">
                            <a href="post.php?id=<?php echo $row['id'];?>"><img
                                    src="upload/<?php echo $row['postImage'];?>"></a>
                        </div>
                        <div class="post-title">
                            <h4><a href="post.php?id=<?php echo $row['id'];?>"><?php echo $row['postTitle'];?></a></h4>
                        </div>
                        <div class="post-details">
                            <p class="post-info">
                                <span><i class="fas fa-user"></i> <?php echo $row['postAuthor'];?></span>
                                <span><i class="far fa-calendar-alt"></i> <?php echo $row['postDate'];?></span>
                                <span><i class="fas fa-tags"> </i> <?php echo $row['categoryName'];?></span>
                            </p>
                            <p class="post-Content">
                                <?php 
                           if (strlen($row['postContent'])>150){
                               $row['postContent'] = substr($row['postContent'],0,300)."...";
                           }
                           echo $row['postContent'];
                            ?>

                            </p>
                            <a href="post.php?id=<?php echo $row['id'];?>"> <button class="btn btn-custom">اقرا
                                    المزيد</button></a>
                        </div>
                    </div>
                    <?php
                         }
                         // End Search Code //
                       // Start Home Posts Code //  
                        }else{
                    
                    $query = "SELECT posts.postTitle , posts.postImage ,posts.id, posts.postAuthor , posts.postContent , posts.postDate , categories.categoryName  FROM posts INNER JOIN categories on categories.id = posts.postCategory ORDER BY posts.id DESC";
                    $result = mysqli_query($conn,$query);
                    while ($row = mysqli_fetch_assoc($result)){                                  
                       ?>

                    <div class="post">
                        <div class="post-image">
                            <a href="post.php?id=<?php echo $row['id'];?>"><img
                                    src="upload/<?php echo $row['postImage'];?>"></a>
                        </div>
                        <div class="post-title" id="fff">
                            <h4><a href="post.php?id=<?php echo $row['id'];?>"><?php echo $row['postTitle'];?></a></h4>
                        </div>
                        <div class="post-details">
                            <p class="post-info">
                                <span><i class="fas fa-user"></i> <?php echo $row['postAuthor'];?></span>
                                <span><i class="far fa-calendar-alt"></i> <?php echo $row['postDate'];?></span>
                               
                                <span><i class="fas fa-tags"> </i> <?php echo $row['categoryName'];?></span>
                            </p>
                            <p class="post-Content">
                                <?php 
                            if (strlen($row['postContent'])>150){
                                $row['postContent'] = substr($row['postContent'],0,300)."...";
                            }
                            echo $row['postContent'];
                             ?>

                            </p>
                            <a href="post.php?id=<?php echo $row['id'];?>"> <button class="btn btn-custom">اقرا
                                    المزيد</button></a>
                        </div>
                    </div>
                    <?php
                    }
                        }
                  
                ?>
                    <!-- End Home posts code -->
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
                                    <span class="span-image"><img src="upload/<?php echo $row['postImage']; ?>"
                                            alt="img"></span>

                                    <span class="span-image"><?php echo $row ['postTitle'];?></span>
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