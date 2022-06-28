<?php
session_start();
$verify = false;
$already = false;
$login = false;
$checkaccount = false;
include 'connect.php';
date_default_timezone_set("Asia/Karachi");
if(isset($_POST['submit']))
{
 
    $email =  $_POST['email'];
    $password = $_POST['password'];
    $name = "";
    $type = "";
    if(!empty($email)  && !empty($password))
    {
        $sql = "SELECT `firstname` , `lastname`,`AccountType`  FROM `userinfo` where `email`='".$email."' AND `password` = '".$password."' ";
        $result = mysqli_query($conn, $sql);
        foreach($result as $value)
        {
            $name = $value['firstname']." ".$value['lastname'];
            $type = $value['AccountType'];
        }
        if (mysqli_num_rows($result) == 1) {
          
           $_SESSION['loggedinuser'] = true;       
           $_SESSION['email'] = $email;
           $_SESSION['name'] = $name;
           $_SESSION['Account Type'] = $type;
           $sqlinsert = "INSERT INTO `sign_signout_history`(`AccountType`, `Email`, `Status`, `Name`, `Time`) VALUES ('".$type."','".$_SESSION['email']."','SIGN IN','".$name."','".date("h:i:a")."')";
           $result = mysqli_query($conn,$sqlinsert); 
          
           header("location: index.php");
        }
        else{
            $checkaccount = true; 
        }
    }
    if(!empty($email) && !empty($password))
    {
        $sql = "SELECT * FROM `adminlogin` where `Admin_email`='".$email."' AND `Admin_password` = '".$password."' ";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) == 1) {
          
            $_SESSION['loggedinadmin'] = true;       
            $_SESSION['admin'] = $email;
            header("location: Adminindex.php");
        }
        
    }


    
}
if(isset($_POST['registerd']))
{
    

   $type = $_POST['AccountType'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $chpassword = $_POST['re-password'];
   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $check = $_POST['check'];
    $sql = "SELECT * FROM `userinfo` where `email`='".$email."' AND `password` = '".$password."' AND `AccountType` = '".$type."'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 0) {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://emailvalidation.abstractapi.com/v1/?api_key=d91d4090623a4a26bfad9766be96e7ae&email='.$email.'');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $data = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($data,true);

        if($response['deliverability'] == "DELIVERABLE")
        {
            if($chpassword == $password)
            {
                if($check == 1)
                {
                $sql = "INSERT INTO `userinfo`(`AccountType`, `email`, `password`, `firstname`, `lastname`) VALUES ('".$type."','".$email."','".$password."','".$firstname."','".$lastname."')";
                $result = mysqli_query($conn, $sql);
                $verify = true;
                }

            }
            
        }
        else{
            $check_email = true;
        }
    }
    else
    {
        $already = true;
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
        if($verify)
        {
    ?>  
        <div class="alert alert-success">
             <strong>Success</strong> Account Created Successfully.
        </div>

    <?php
        }
        else if($already)
        {

        
    ?>
    <div class="alert alert-danger">
      <strong>Unsuccessfull!</strong> Already have an Account.
   </div>

    <?php
        }        
   
        else if($checkaccount)
        {

        
    ?>
    <div class="alert alert-danger">
      <strong>Unsuccessfull!</strong> Invalid Credentials!
   </div>

    <?php
        }
        else if(isset($check_email) == true)
        {
            echo " <div class='alert alert-danger'>
            <strong>Unsuccessfull!</strong>Email is Inccorect Or didn't Exist!
         </div>";
        }
    ?>
    <div id="cover" class="container-fluid">
        <div id="divCover" class="container border">
            <h1 class="h1">Login And Signup</h1>
        </div>
    </div>

    <div id="signup" class="container">
        <div class="row">
            <form action="" method="post">
                <div class="login signup col-md-6 col-sm-12">
                    <h4 class="heading">Please Log in</h4>
                    <input type="text" name="email" placeholder="Please enter Email">
                    <input id="password" onmouseout="hide()" onmouseover="show()" type="password" name="password" placeholder="Please enter Password">
                    <button type="submit" name="submit">LOG IN</button>
                    <a href="forgetpassword.php">Forgotten your password</a>
                </div>
            </form>
            <form action="" method="post">

                <div class="login signup col-md-6 col-sm-12">
                    <h4 class="heading">Please Sign up</h4>
                    <div>
                        <label>Create</label>
                        <select name="AccountType" id="cars" Required>
                            <option selected>Account Type</option>
                            <option value="saab">Saab</option>
                            <option value="opel">Opel</option>
                            <option value="audi">Audi</option>
                        </select>
                    </div>
                    <input type="text" name="email" placeholder="Please enter Email" Required>
                    <input type="password" name="password" placeholder="Please enter Password" Required>
                    <input type="password" name="re-password" placeholder="Re-enter Password" Required>
                    <input type="text" name="firstname" placeholder="First Name" Required>
                    <input type="text" name="lastname" placeholder="Last Name" Required>

                    <div class="check">
                        <input id="checkbox" name="check" type="checkbox" value="0" Required>
                        <p>By Registering you agree to our</p>
                        <a href="terms.php">Terms of Use</a>
                    </div>
                    <button type="submit" name="registerd">Create an Account </button>

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
    <script>
        let checkbox = document.getElementById('checkbox');
        checkbox.addEventListener('click', () => {
            if (checkbox.checked) {
                checkbox.value = 1;
            }
        })

        function show()
        {
            document.getElementById("password").setAttribute("type","text");
        }
        function hide()
        {
            document.getElementById("password").setAttribute("type","password");
        }
    </script>
</body>

</html>