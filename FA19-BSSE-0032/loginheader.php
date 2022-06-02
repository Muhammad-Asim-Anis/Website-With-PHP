<?php
include 'connect.php';
if(isset($_POST['logout']))
{  
   
    if(isset($_SESSION['email']) && isset($_SESSION['name']) && isset($_SESSION['Account Type']))
    {
        $email = $_SESSION['email'];
        $name = $_SESSION['name'];
        $type = $_SESSION['Account Type'];
        $sqlinsert = "INSERT INTO `sign_signout_history`(`AccountType`, `Email`, `Status`, `Name`, `Time`) VALUES ('".$type."','".$email."','SIGN OUT','".$name."','".date("h:i:a")."')";
        $result = mysqli_query($conn,$sqlinsert); 
        if(!$result)
        {
            echo "".mysqli_error($conn);
        }
        unset($_SESSION['loggedinuser']);  
        session_destroy();
        header("location: signup.php"); 
        exit; 
    }
}
?>
<style>
button
{
   background-color: white;
   border: none;
   outline: none;
}

</style>
<div class="container bg-dark ">
        <div class="row menu">

            <div class="col-md-3 col-sm-3 menu-icon"><img src="images/logo.png" alt="" srcset=""></div>
            <div id="button" class="col-md-3 col-sm-3 menu-button"><i class="fa fa-bars"></i></div>
            <div id="nav2" class="col-md-7">
                <ul>

                    <li><a href="index.php">Home</a></li>
                    <li>
                        <h5>|</h5>
                    </li>
                    <li><a href="Aboutus.php">About Us</a></li>
                    <li>
                        <h5>|</h5>
                    </li>
                    <li><a href="shopMenu.php">Shop</a></li>
                    <li>
                        <h5>|</h5>
                    </li>
                    <li><a href="Contactus.php">Contact US</a></li>
                </ul>
            </div>
            <div id="nav3" class="col-md-2">
                <div class="nav3">
                    <form action="" method="post">
                        <div><button type="submit" name="logout"><img src="images/sign-out.png"  alt="" srcset=""></button></div>
                    </form>
                    <div><img src="images/cart.png" alt="" srcset="" onclick="window.location='cart.php'"></div>
                </div>
            </div>
        </div>
    </div>