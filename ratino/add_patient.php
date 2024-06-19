<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

    session_start();

    require_once 'include/connection.php';

    // if(!isset($_SESSION['login']))
    // {
    //     header("Location: login.php");
    // }
    if(isset($_POST['submit']))
    {
        // $username = $_POST['username'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $injuries = $_POST['injuries'];
        $num = $_POST['contact'];
        $pass = "PAss".rand(100000,999999);
       

        if(mysqli_query($conn, "insert into patient_master(full_name, email, phone, status, image, gender, age, address, injuries, dob)values('$name','$email', '$num', true, 'user/patient_image.jpg','$gender', '$age', '$address', '$injuries', '$dob')"))
        {
          if(mysqli_query($conn, "insert into login(email,password, status)values('$email','$pass',true)")){
            $appname = "ratino";

                 try {
                        require 'vendor-email/autoload.php';

                        $mail = new PHPMailer();
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->Port = 465;
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                        $mail->SMTPAuth = true;
                        $mail->IsHTML(true);

                        $mail->Username = 'nishanishu1090@gmail.com';
                        $mail->Password = 'wuefuoexbrfcyqre';

                        // Sender and recipient settings
                        $mail->setFrom('nishanishu1090@gmail.com', $appname);
                        $mail->addAddress($email, $name);
                        $mail->addReplyTo('nishanishu1090@gmail.com', $appname); // to set the reply to


                        // Setting the email content
                        $mail->IsHTML(true);
                        $mail->Subject = "User Registration : " . $appname;
                        $mail->Body = 'Dear ' . $name . '<br> You have recently registered to our webpage.<br> USER NAME : '.$username.'<br>Password: '.$pass.'<br><br>    Thank you<br>Team ' . $appname;
                        $mail->AltBody = 'User Verification Email';

                        $mail->send();
                        // echo "Email message sent.";

                        echo "<script>alert(' Patient Details Added successfully..!');location.href='view_ptient.php'</script>";
                    } catch (Exception $e) {
                        // echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
                        echo "<script>alert('Unable to process, Kindly try after sometimes..');</script>";
                    }
          }
          else{
            echo "<script>alert('Unable to process, Kindly try after sometimes..')</script>";
            // echo mysqli_error($conn);
          }
        }
        else
        {
            echo "<script>alert('Unable to insert your data, Kindly try after sometimes..')</script>";
           
        }          
    }

?>

<main id="main" style="background-color:cornflowerblue;">

    <!-- ======= Patient Section ======= -->
    <section id="about" class="about">
    <div class="container" data-aos="fade-up">


<?php
    require_once 'include/header-link.php';
?>

<?php
    require_once 'include/header.php';
?>
 <div class="row justify-content-center"style="margin-top: 50px;">
 <div class="card card_border  p-lg-5 p-3 mb-4" style="max-width: 800px">
            <h4>Add Patient</h4>
            <div class="card-body py-3 p-0">
            <div class="row">
            <form method="post" action="#" enctype="multipart/form-data">
                
                <div class="form-group" style="padding-bottom:15px">
                    <div class="col-md-12">
                        <label for="username">Full Name </label>
                        <div class="input-group">	
                            <input type="text" class="form-control icon" name="name"  style="padding-left:18px" required>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="padding-bottom:15px">
                    <div class="col-md-12">
                        <label for="username">Email Address</label>
                        <div class="input-group">	
                            <input type="email" class="form-control icon" name="email" style="padding-left:18px" required>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="padding-bottom:15px">
                    <div class="col-md-12">
                        <label for="username">Contact Number</label>
                        <div class="input-group">	
                            <input type="text" title="Please enter 10 digit valid number" pattern="[6789][0-9]{9}" class="form-control icon" name="contact" style="padding-left:18px" required>
                        </div>
                    </div>
                </div>  
                
                <div class="form-group" style="padding-bottom:15px">
                    <div class="col-md-12">
                        <label for="username">Gender</label>
                        <div class="input-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" required type="radio" name="gender" id="inlineRadio1" value="Male">
                                <label class="form-check-label" for="inlineRadio1" style="font-size: 18px;display: block;margin-bottom: 0;color: black;">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                                <label class="form-check-label" for="inlineRadio2" style="font-size: 18px;display: block;margin-bottom: 0;color: black;">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="Other">
                                <label class="form-check-label" for="inlineRadio3" style="font-size: 18px;display: block;margin-bottom: 0;color: black;">Other</label>
                            </div>
                        </div>
                    </div>
                </div>  
                

                <div class="form-group" style="padding-bottom:15px">
                    <div class="col-md-12">
                        <label for="username">Date Of Birth</label>
                        <div class="input-group">	
                        <input type="date" class="form-control mb-2" name="dob" min="1950-01-01" max="2003-05-13" required>
                        </div>
                    </div>
                </div>  

                <div class="form-group" style="padding-bottom:15px">
                    <div class="col-md-12">
                        <label for="username">Age</label>
                        <div class="input-group">	
                        <input type="number" class="form-control mb-2" name="age" required>
                        </div>
                    </div>
                </div>  

                <div class="form-group" style="padding-bottom:15px">
                    <div class="col-md-12">
                        <label for="username">Address</label>
                        <div class="input-group">	
                        <textarea name="address" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>  

                <div class="form-group" style="padding-bottom:15px">
                    <div class="col-md-12">
                        <label for="username">Diabitic retino</label>
                        <div class="input-group">	
                        <select class="form-control" aria-label="Default select example" required name="injuries">
                            <option value="">Choose..</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                            
                        </select>
                        </div>
                    </div>
                </div>  

                <div class="submit" style="text-align: center;"><button type="submit" class="btn btn-primary error-w3l-btn  mt-3" name="submit">Submit</button></div>
                <div class="clearfix"></div>
            </form>
        </div>  
    </div>
    
</div>

</div>

    </section></main>

     <?php
    require_once 'include/footer.php';
?>
    <?php
    require_once 'include/footer-link.php';
?>

       

        