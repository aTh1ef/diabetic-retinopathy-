
<?php
require_once "include/connection.php";

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['ph_no'];
    $address = $_POST['address'];
    $password = $_POST['pass'];
    $confirm_password = $_POST['confirm_pass'];

    if($password==$confirm_password)
    {
        $sql="INSERT INTO register(name, email, phone, address, password, status) VALUES('$name', '$email', '$phone_number', '$address', '$password', 'Active')";

        if(mysqli_query($conn, $sql))
        {
            echo"<script>alert('You have registered successfully');location.href='login.php';</script>";

        }
        else
        {
            echo"<script>alert('Unable to process');</script>";

        }
    }

}

?>
<?php
    require_once 'include/header-link.php';
?>
    <div class="row" style="padding-bottom:300px;background-color:cornflowerblue;">
        <div class="col-lg-4 col-md-3 col-sm-1"></div>
            <div class="col-lg-4 col-md-6 col-sm-10 mt-lg-5">
                <div class="card shadow p-5" style="background-color:gainsboro">
                        <h3 class="content text-center">Registration</h3>
                            <form method="post">
                                <label class="form-label labels">Name  </label>
                                <input type="text" name="name" class="form-control" required/>
                                <label class="form-label labels">Email </label>
                                <input type="email" name="email" class="form-control" required/>
                                <label class="form-label labels">Phone No </label>
                                <input type="text" name="ph_no" class="form-control" required pattern="[0-9]{10}" title="accept 10 digit numbers" minlength="10" maxlength="10"/>
                                <label class="form-label labels">Address </label>
                                <textarea name="address" class="form-control" required></textarea>
                                <label class="form-label labels">Password </label>
                                <input type="password" name="pass" class="form-control" required/>
                                <label class="form-label labels">Confirm Password  </label>
                                <input type="password" name="confirm_pass" class="form-control" required/>
                                <input type="submit" name="register" value="Register" class="btn btn-primary mt-3 mb-2"/><br/>
                                <label class="form-label labels">Already have an account? <a href="login.php">Login</a></label>
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
