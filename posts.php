<?php include "include/db.php";?>
<?php include "include/header.php";?>

<?php
 if (isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM posts WHERE id =$id";
    $delete = mysqli_query($conn,$query);
    if (isset($delete)){
        echo "<div class='alert-success'>تم حذف المقال بنجاح</div> ";
    }else{
      echo "<div class='alert-denger'>عفوا حدث خطا ما</div> ";

    }
 }
?>


<!--start content-->
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
                <!--Display All-->
  
                <table class="table table-bordered">
                    <tr>
                        <th>رقم المقال</th>
                        <th>عنوان المقال</th>
                        <th>كاتب المقال</th>
                        <th>صورةالمقال</th>
                        <th>تاريخ المقال</th>
                        <th>حذف المقال</th>
                    </tr>
                <?php
            $query = "SELECT * FROM posts";
            $result = mysqli_query($conn,$query);
            

            while ($row = mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['postTitle'];?></td>
                        <td><?php echo $row['postAuthor'];?></td>
                        <td><img src="upload/<?php echo $row['postImage'];?>" width="70px" height="50px"></td>
                        <td><?php echo $row['postDate'];?></td>
                        <td><a href="posts.php?id=<?php echo $row['id'];?>"><button class="btn btn-secondary">حذف المقال</button></a></td>
                    </tr>

             <?php
            
            } 
            ?>
                </table>
            </div>
        </div>
    </div>
</div>

<!--End content-->










<?php include "include/footer.php";?>