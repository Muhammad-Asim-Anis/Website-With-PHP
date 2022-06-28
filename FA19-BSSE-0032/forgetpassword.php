<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
include 'connect.php';


if(isset($_POST['forget']))
{
    
    
    $email = $_POST['email'];
    $sql ="SELECT `firstname`,`lastname`,`password` FROM `userinfo` WHERE `email` = '".$email."'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) == 1)
    {
        foreach ($result as $value) {
            $password = $value['password'];
            $name = $value['firstname']." ".$value['lastname'];
        }
        
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->Mailer = "smtp";
            $mail->SMTPDebug  = 0;  
            $mail->SMTPAuth   = TRUE;
            $mail->SMTPSecure = "tls";
            $mail->Port       = 587;
            $mail->Host       = "smtp.gmail.com";
            $mail->Username   = "";
            $mail->Password   = "";
            $mail->IsHTML(true);
            $mail->AddAddress($email, $name);
            $mail->SetFrom("jewelerywebsite54@gmail.com", "Jewellery Website");
            $mail->Subject = "Forget Password";
            $content = "<b>Your Password is: $password.</b>";
            $mail->MsgHTML($content); 
            $mail->Send(); 
            $check_valid = true;
   
       

        
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php'; ?>
</head>

<body>
    <?php
    
    if(isset($_SESSION['loggedinuser']) == true)
    {

        include 'loginheader.php';
    }
    else
    {
        include 'header.php';
    }

   ?>
    <?php
   if(isset($check_valid) == true)
   {
       ?>
    <div class="alert alert-success">
        <strong>Success</strong> Password is send to Your Mail!
    </div>
    <?php
   } 
       ?>


    <div id="cover" class="container-fluid">
        <div id="divCover" class="container border">
            <h1 class="h1">Forget Password</h1>
        </div>
    </div>

    <div id="signup" class="container">
        <div class="row">
            <form action="" method="post">
                <div class="forgetpass">

                    <div class="login signup col-md-6 col-sm-12">
                        <h4 class="heading">Forget Password</h4>
                        <input type="text" name="email" placeholder="Please enter Email">
                        <button type="submit" name="forget">Submit</button>
                        <a href="signup.php">Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="index.js"></script>
</body>

</html>
