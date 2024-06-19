<?php
    session_start();
    require_once 'include/connection.php';
    // if(!empty($_SESSION['isLoggedIn']))
    // {
    //      header("Location: index.php");
    //     // echo"<script>location.href = 'index.php';</script>";
    // }
     if(isset($_SESSION['login']))
    {
        header ("Location: index.php");
    }
    if(isset($_POST['login']))
    {
        $email = $_POST['email'];
        $password = $_POST['pass'];


            $sql = "SELECT email,password FROM register WHERE email = '$email' AND password = '$password'";

            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0)
            {
                $_SESSION['isLoggedIn'] = true;
                $_SESSION['email'] = $email;

                // echo"<script>alert('Login Success');location.href = 'index.php';</script>";
                header("Location: index.php");
            }
            else
            {
                echo"<script>alert('Login Failed');</script>";
            }
    }
?>

<?php
    require_once 'include/header-link.php';
?>
<div class="row" style="padding-bottom:300px;background-color:cornflowerblue;">
        <div class="col-lg-4 col-md-3 col-sm-1"></div>
            <div class="col-lg-4 col-md-6 col-sm-10 mt-lg-5">
                <div class="abstract card shadow p-5" style="background-color:gainsboro">
                        <h3 class="content text-center">Login</h3>
                            <form method="post">
                                <div >
                                    <label class="labels form-label mt-2" required>Email </label>
                                    <input type="email" name="email" class="form-control"/>
                                    <label class="labels form-label mt-2">Password </label>
                                    <input type="password" name="pass" class="form-control"/>
                                    <input type="submit" name="login" value="Login" class="btn btn-primary mt-3 mb-2"/><br>
                                    <label class="labels form-label text-center"> Don't have an account? <a href="register.php">Register</a></label>
                                </div>
                            </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-1"></div>
        </div>

<?php
    require_once 'include/footer.php';
?>

<?php
    require_once 'include/footer-link.php';
?>
  