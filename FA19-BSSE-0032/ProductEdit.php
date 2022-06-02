<?php
include 'connect.php';
$check = false;
session_start();
if(!isset($_SESSION['loggedinadmin']))
{
	header("location: signup.php");
}
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = mysqli_real_escape_string($conn, $_POST['message']);
    $rate = 1;
    $file = '';
   if(isset($_FILES['image']) AND $_FILES['image']['error'] == 0)
   {
       $upload_dir = 'upload/';
       $Imagename = str_replace('','-',$_FILES['image']['name']);
       move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir.$Imagename);
       $file = $upload_dir.$Imagename;
    } 
    $sql = "INSERT INTO `productdetail`(`Id`,`name`, `image`, `Category`, `price`, `Rating`, `Description`) VALUES ('','".$name."','".$file."','".$category."','".$price."','".$rate."','".$description."')";
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
    include 'Adminnavbar.php';
?>


    <div id="cover" class="container-fluid">
        <div id="divCover" class="container border">
            <h1 class="h1">Product Edit</p>
        </div>
    </div>

    <section id="ProductEdit">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h6 class="heading">Product Details</h6>
                    <h1 class="h1body">Enter Product Details</h1>
                    <div class="contact">
                        <div class="col-md-12 w-sm-100 form-group" id="CategoryEmail">
                            <form action="" method="post" enctype="multipart/form-data">
                                <label for="">Product Name</label>
                                <input type="text" name="name" placeholder="Please enter Product Name" Required>
                                <label for="">Product Image</label>
                                  <input type="file" id="img" name="image" accept="Image/*" Required>
                                <!-- <input id="number" type="text" name="image" placeholder="Please enter Image Name"
                                    Required> -->
                                <label for="">Category</label>
                                <input type="text" name="category" placeholder="Please enter Category" Required>
                                <label for="">Price</label>
                                <input type="text" name="price" placeholder="Please enter Product Price" Required>
                                <label for="">Description</label>
                                <textarea id="message" width="300" type="text" name="message"
                                 placeholder="Please enter Meesage" ></textarea>
                                <button class="contactbtn" type="submit" name="submit">Enter</button>
                            </form>
                        </div>


                    </div>
                </div>

            </div>
    </section>
    <?php
    include 'footer.php';
    ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="index.js"></script>
</body>

</html>