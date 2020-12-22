<?php include "include/db.php";?>
<?php include "include/header.php";?>

<?php 
//image
 if(isset($_POST['submit'])){
    $pTitle = $_POST['title'];
    $pCat = $_POST['category'];
    $pContent = $_POST['content'];
    $pAuther = "هيثم";
    $imageName = $_FILES['postImage']['name'];
        $imageTmp = $_FILES['postImage']['tmp_name'];
     if(empty($pTitle)||empty($pContent)){
        $imageName = $_FILES['postImage']['name'];
        $imageTmp = $_FILES['postImage']['tmp_name'];
         echo "<div class='alert alert-danger'>" . 'الرجاء ملئ الحقول' ."</div>";
     }else{
         $postimage = rand(0,1000)."_" .$imageName;
         move_uploaded_file($imageTmp,"upload\\". $postimage);
         $query = "INSERT INTO posts(postTitle,postCategory,postImage,postContent,postAuthor)
         VALUES('$pTitle','$pCat','$postimage','$pContent','$pAuther')";
         $result = mysqli_query($conn,$query);
         if(isset($result)){
            echo "<div class='alert alert-success'>" . 'تم اضافة البيانات بنجاح' ."</div>";
         }else{
            echo "<div class='alert alert-danger'>" . 'حدث خطا ما' ."</div>";
         }

     }
 }
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" id="side-area">
                <h4>لوحة التحكم</h4>
                <ul>
                    <li>
                        <a href="categories.php">
                            <span><i class="fas fa-tags"></i></span>
                            <span>التصنيفات</span>
                        </a>
                    </li>
                    <!--Articles-->
                    <li data-toggle="collapse" data-target="#menu">
                        <a href="#">
                            <span><i class="far fa-newspaper"></i></span>
                            <span>المقالات</span>
                        </a>
                    </li>
                    <ul class="collapse" id="menu">
                        <li>
                            <a href="new-post.php">
                                <span><i class="far fa-edit"></i></span>
                                <span>مقال جديد</span>
                            </a>
                        </li>
                        <li>
                            <a href="posts.php">
                                <span><i class="fas fa-th-large"></i></span>
                                <span>كل المقالات</span>
                            </a>
                        </li>
                    </ul>
                    <li>
                        <a href="index.php" target="_blank">
                            <span><i class="fas fa-window-restore"></i></span>
                            <span>عرض الموقع</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span><i class="fas fa-sign-out-alt"></i></span>
                            <span>تسجيل الخروج</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10" id="main-area">
                <button class="btn-custom">مقال جديد</button>
                <div class="add-category">
                    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">عنوان المقال</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="cat">التصنيف</label>
                            <select name="category" id="cat" class="form-control">
                             <?php 
                                $query = "SELECT * FROM categories";
                                $result = mysqli_query($conn,$query);
                                while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                    <option value="<?php echo $row['id'];?>"> <?php echo $row['categoryName'];?></option> 
                                    
                                <?php
                                }

                              ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">صورة المقال</label>
                            <input type="file" id="image" class="form-control" name="postImage">
                        </div>
                        <div class="form-group">
                            <label for="content">نص المقال</label>
                            <textarea id="" cols="30" rows="10" class="form-control" name="content"></textarea>
                        </div>
                        <button class="btn-custom" name="submit" type="submit">نشر المقال</button>
                    </form>
                </div>
            </div>
            <!--BOOtstrap and jquery Scripts-->
            <script src="https://code.jquery.com/jquery-3.4.1.js"
                integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
            <script src="js/all.min.js"></script>
            <script src="js/bootstrap.min.js"></script>

            </body>

            </html>