<?php include "include/db.php";?>
<?php include "include/header.php";?>
<?php 

if (isset($_POST['add'])){
    $cName = $_POST['category'];
    if(empty($cName)){
        echo "<div class='alert alert-danger'>" . 'الرجاء ملئ الحقل' ."</div>";
    }elseif($cName>100){
        echo "<div class='alert alert-danger'>" . 'اسم التصنيف كبير جدا' ."</div>";
    }else{
        $query = "INSERT INTO categories (categoryName) VALUES ('$cName')";
        mysqli_query($conn,$query);
        echo "<div class='alert alert-success'>" . 'تم اضافة التصنيف بنجاح' ."</div>";

    }  
}

  if (isset ($_GET['id'])){
    $id = $_GET['id'];
      $query = "DELETE FROM categories WHERE id =$id";
      $delete = mysqli_query($conn,$query);
      if (isset($delete)){
          echo "<div class='alert alert-success'>تم حذف التصنيف بنجاح</div> ";
      }else{
        echo "<div class='alert alert-denger'>عفوا حدث خطا ما</div> ";

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
                        <a href="">
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
                        <a href="logout.php">
                            <span><i class="fas fa-sign-out-alt"></i></span>
                            <span>تسجيل الخروج</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10" id="main-area">
                <div class="add-category">
                    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                        <div class="form-group">
                            <label for="category">تصنيف جديد</label>
                            <input type="text" name="category" class="form-control">
                        </div>
                        <button class="btn-custom" name="add">اضافة</button>
                    </form>
                </div>

                <!--Display Categories-->
                <div class="display-category mt-5">
                    <table class="table table-bordered">
                        <tr>
                            <th>رقم الفئة</th>
                            <th>اسم الفئة</th>
                            <th>تاريخ الاضافة</th>
                            <th>حذف التصنيف</th>
                        </tr>
                        <?php
                            $query = "SELECT * FROM categories";
                            $result = mysqli_query($conn,$query);
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['categoryName'];?></td>
                            <td><?php echo $row['categoryDate'];?></td>
                            <td><a href="categories.php?id=<?php echo $row['id'] ?>"><button class="btn btn-secondary">حذف التصنيف</button></a></td>
                        </tr>
                        <?php
                            }
                            ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--End content-->
<?php include "include/footer.php";?>