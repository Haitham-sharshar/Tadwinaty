<?php include "connection.php";?>
<?php 
$msg="";
if(isset($_POST['submit']))
{
  $sql="SELECT * FROM users WHERE Username=? and password=?";
  $result=$conn->prepare($sql);
  $result->execute(Array($_POST['_username'],$_POST['_password']));
  if($result->rowCount()==1)
  {
    $row=$result->fetch();
    session_start();
    $_SESSION['username']=$_POST['_username'];
    if($row['isAdmin']=="")
    header("location:index.php");
  else
    header("location:categories.php");
  }
    else{
    $msg="Username or password is invalid!";
  }
}
?>

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


    <div class="main">
        <div class="container">
            <div class="col-sm-4 col-sm-offset-4">
                <form class="form" method="POST" id="signup-form" class="signup-form" action="" style="color: red">
                    <h2 class="text">Login</h2>

                    <tr>
                        <td colspan="2">
                            <h5 class="warning" style= "color:red ;text-align:center;" class="text-center bg-warnin " ><?php echo $msg;?></h5>
                        </td>
                    </tr>
                    <table>
                        <tr>
                            <input type="text" class="form-control" name="_username" id="_username"
                                placeholder="User Name" /><br>
                        </tr>
                        <tr>
                            <input type="password" class="form-control" name="_password" id="password"
                                placeholder="Password" /> <br>
                        </tr>
                        <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>

                        <center> <input type="submit" name="submit" value="Login" class="btn btn-primary"> </center>

                    </table>
            </div>
        </div>
    </div>