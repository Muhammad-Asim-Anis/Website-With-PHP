<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['loggedinadmin']))
{
	header("location: signup.php");
}
$id = $_GET['GetId'];
$check = false;
$sql = "SELECT * FROM `productdetail` Where `Id`='".$id."'";
$result=mysqli_query($conn,$sql);

foreach($result as $value)
{
$productName = $value['name'];
$productImage = $value['image'];
$productCategory = $value['Category'];
$productPrice = $value['price'];
$productDesc = $value['Description'];
}
if(isset($_POST['Update']))
{
    $name = $_POST['name'];
    $newimage = $_FILES['image']['name'];
    $oldimage = $productImage;
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = mysqli_real_escape_string($conn, $_POST['message']);
    $upload_dir = 'upload/';
    $file = '';

if($newimage != '')
{
    $updateproductImg = $newimage;
}
else
{
    $updateproductImg = $oldimage;
}
 if(file_exists("upload/".$_FILES['image']['name']))
 {
    
   $query = "UPDATE `productdetail` set `name`='".$name."',`Category`='".$category."',`price`='".$price."',`Description`='".$description."' WHERE `Id`='".$id."'";
   $result = mysqli_query($conn,$query);
   $cart_update = "UPDATE `cartdetail` SET `name`='".$name."',`price`='".$price."' WHERE `Id`='".$id."'";
   mysqli_query($conn,$cart_update);
   if($result)
   {
       header("location:ProductDetail.php");
       
   }
   else
   {
       echo ' Please Check Your Query old ';
   }
 }
 else
 {
     $path =  $upload_dir.$updateproductImg;
     $query = "UPDATE `productdetail` SET `name`='".$name."' ,`image`='".$path."',`Category`='".$category."',`price`='".$price."',`Description`='".$description."' WHERE `Id`='".$id."'";
     $result = mysqli_query($conn,$query);

     $cart_update = "UPDATE `cartdetail` SET `name`='".$name."',`price`='".$price."',`image`='".$path."' WHERE `Id`='".$id."' ";
     mysqli_query($conn,$cart_update);
     if($result)
     {
         unlink($oldimage);
         move_uploaded_file($_FILES['image']['tmp_name'],$path);
         header("location:ProductDetail.php");
     }
     else
     {
         echo ' Please Check Your Query new';
     }
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
            <h1 class="h1">Product Update</p>
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
                            <?php
                            
                            ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <label for="">Product Name</label>
                                <input type="text" name="name" placeholder="Please enter Product Name"
                                    value="<?php echo $productName; ?>" Required>
                                <label for="">Product Image</label>
                                <input type="file" id="img" name="image" accept="Image/*"
                                    value="<?php echo $productImage; ?>" >
                                <!-- <input id="number" type="text" name="image" placeholder="Please enter Image Name"
                                    Required> -->
                                <label for="">Category</label>
                                <input type="text" name="category" placeholder="Please enter Category"
                                    value="<?php echo $productCategory; ?>" Required>
                                <label for="">Price</label>
                                <input type="text" name="price" placeholder="Please enter Product Price"
                                    value="<?php echo $productPrice; ?>" Required>
                                <label for="">Description</label>
                                <textarea id="message" width="300" type="text" name="message"
                                    placeholder="Please enter Meesage"><?php echo $productDesc; ?></textarea>
                                <button class="contactbtn" type="submit" name="Update">Update</button>
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