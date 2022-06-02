<?php
include 'connect.php';
$check = false;
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $number = filter_var($_POST['number'], FILTER_SANITIZE_NUMBER_INT);
    $email = $_POST['email'];
    $address = $_POST['address'];
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO `contactusdetail`(`Name`, `Phone`, `Address`, `Email`, `Message`) VALUES ('".$name."','".$number."','".$address."','".$email."','".$message."')";
    $result = mysqli_query($conn,$sql);
    if(!$result)
    {
        die("record not inserted".mysqli_error($conn));
    }
    else
    {
        $check =true;
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
    session_start();
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
    if($check)
    {
        echo "
            <div class='alert alert-success'>
            <strong>Success</strong> Query has been Submited.
       </div>  ";
    }
    ?>
    <div id="contactus_Cover" class="container-fluid">
        <div id="divCover" class="container border">
            <h1 class="h1">Contact US</h1>

        </div>
    </div>
    <section id="Contactus">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="heading">Contact US</h6>
                    <h1 class="h1body">For any query contact us</h1>
                    <div class="contact">
                        <div class="col-md-12 w-sm-100 form-group" id="CategoryEmail">
                       <form action="" method="post">
                           <label for="">Name</label>
                          <input type="text" name="name" placeholder="Please enter Name" Required>
                          <label for="">Phone Number</label>
                          <input id="number" type="text" name="number" placeholder="Please enter Your Number" Required>
                          <label for="">Address</label>
                          <input type="text" name="address" placeholder="Please enter Address" Required>
                          <label for="">Email</label>
                          <input type="email" name="email" placeholder="Please enter your email" Required>
                          <label for="">Message</label>
                          <textarea id="message" width="300" type="text" name="message"
                              placeholder="Please enter Meesage" Required></textarea>
                          <button class="contactbtn" type="submit" name="submit">Learn More</button>
                       </form>
                        </div>


                    </div>
                </div>
                <div id="divimg" class=" col-md-6 col-xs-12">
                    <!-- <img src="images/jewelleryabout.png" alt="">
                        <img id="img_div" src="images/jewelleryabout2.png" alt=""> -->
                    <div style="width: 100%"><iframe width="100%" height="700" frameborder="0" scrolling="no"
                            marginheight="0" marginwidth="0"
                            src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Muhammad%20Ali%20Jinnah%20University+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a
                                href="https://www.gps.ie/truck-gps/">delivery van gps</a></iframe></div>
                </div>
            </div>
    </section>
    <?php include 'footer.php'; ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="index.js"></script>
</body>

</html>