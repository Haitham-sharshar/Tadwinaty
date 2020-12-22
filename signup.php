
<?php include "include/db.php";?>

<?php
$msg="";
 if (isset($_POST['submit'])){
    $name = $_POST['_name'];
    $email = $_POST['_Email'];
    $gender = $_POST['_gender'];
    $username = $_POST['_username'];
    $password = $_POST['_password'];
    $repassword = $_POST['_repassword'];
    if(empty($_POST['_name']))
      $msg="Your name is required!";
      else if (empty($_POST['_Email']))
      $msg="Your Email is required!";
      else if (!filter_var($_POST['_Email'],FILTER_VALIDATE_EMAIL))
      $msg="Your Email is invalid";
      else if (empty($_POST['_username']))
      $msg="Your Username is required!";
      else if (empty($_POST['_password']))
      $msg="Your password is required!";
      else if ($_POST['_password']!=$_POST['_repassword'])
      $msg="Your password not matched with confirm password!";
      else {
        $sql = "SELECT COUNT(Username)AS Num FROM users WHERE Username='$username'";
        $result = mysqli_query($conn,$sql);
       $row = mysqli_fetch_assoc($result);
        if ($row['Num'] > 0)
            $msg = "user name is already exists!";
            else { 
                $query = "INSERT INTO users(Name,Email,Gender,Username,Password,isAdmin) VALUES ('$name','$email','$gender','$username','$password','')";
                $res = mysqli_query($conn,$query);
                 header("location:login.php");
            }
        }
    }  
      ?>

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


<div  class="container">
    <h2  class="text-center">Create account</h2>
    <div class="col-sm-4 col-sm-offset-4">
   <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <tr>
                    <td colspan="2">
                     <h5 style="color:red;" class="text-center bg-warning"> <?php echo $msg; ?> </h5>
                    </td>
                </tr>
               
                 <input type="text" name="_name" class="form-control" placeholder="Name">
               <input type="text" name="_Email" class="form-control" placeholder="Email">
             <input type="radio" name="_gender" value="M" checked  class=""/> Male <br>
                <input type="radio" name="_gender" value="F" checked class="gender" /> Female 
        <input type="text" name="_username" class="form-control" placeholder="Username">
         <input type="password" name="_password" class="form-control" placeholder="password"> 
        <input type="password" name="_repassword" class="form-control" placeholder="Confirm Password">

       
        <tr>
            <td colspan="2">
                <center>
                    <input type="submit" name="submit" value="Sign Up" class="btn">
                </center>
            </td>   
       </tr>
   </form>  
  </div>
</div>

