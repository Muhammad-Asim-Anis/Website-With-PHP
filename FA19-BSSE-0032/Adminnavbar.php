<?php
if(isset($_POST['adminlogout']))
{
    
    unset($_SESSION['loggedinadmin']);  
    session_destroy();
    header("location: signup.php"); 
    exit; 
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

                <li><a href="Adminindex.php">Home</a></li>
                    <li>
                        <h5>|</h5>
                    </li>
                    <li><a href="ProductEdit.php">Product Edit</a></li>
                    <li>
                        <h5>|</h5>
                    </li>
                    <li><a href="ProductDetail.php">Product Detail</a></li>
                    <li>
                        <h5>|</h5>
                    </li>
                    <li><a href="history.php">History</a></li>
                </ul>
            </div>
            <div id="nav3" class="col-md-2">
                <div class="nav3">
                    <form action="" method="post">
                        <div><button type="submit" name="adminlogout"><img src="images/sign-out.png"  alt="" srcset=""></button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>