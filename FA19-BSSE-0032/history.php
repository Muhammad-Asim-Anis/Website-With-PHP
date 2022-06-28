<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['loggedinadmin']))
{
	header("location: signup.php");
}
       

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php'; ?>

</head>

<body>

    <?php
    include 'Adminnavbar.php';
?>


    <div id="cover" class="container-fluid">
        <div id="divCover" class="container border">
            <h1 class="h1">Sign in - Out History </p>
        </div>
    </div>
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>

                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Time</th>
                    </tr>

                </thead>
                <tbody>

                    <?php 
        $sql = "SELECT * FROM `sign_signout_history`";
        $result = mysqli_query($conn,$sql);
        foreach($result as $value)
        {
            echo "<tr>
            <td>".$value['Name']."</td>
            <td>".$value['Email']."</td>
            <td>".$value['Status']."</td>
            <td>".$value['Time']."</td></tr>"; 
        }
        ?>


                </tbody>
            </table>
        </div>
    </div>


    <?php
    include 'footer.php';
    ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.plot.ly/plotly-2.12.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="index.js"></script>

</body>

</html>