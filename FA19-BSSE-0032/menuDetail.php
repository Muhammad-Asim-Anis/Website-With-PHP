<?php

include 'connect.php';
$id=0;
$check=false;
if(isset($_GET['GetId']))
{
    $id = $_GET['GetId'];
}
if(isset($_POST['Submit']))
{
    $sqlquery = "SELECT * FROM `cartdetail` WHERE `Id`='".$id."'";
    $resultquery = mysqli_query($conn,$sqlquery);
    if(mysqli_num_rows($resultquery) == 1) 
    {
        
            if(isset($_POST['rating']))
            {
                $sql = "UPDATE `productdetail` SET `Rating`='".$_POST['rating']."' WHERE `Id`='".$id."'";
                $result = mysqli_query($conn,$sql);
            }
            // $sql ="UPDATE `cartdetail` SET `quentity`='".$_POST['quentity']."' WHERE `Id`='".$id."'";
            // $result = mysqli_query($conn,$sql);
            $check = true;
        
    }
    else 
    {
        $sql = "INSERT INTO `cartdetail`(`Id`, `name`, `price`, `quentity`, `image`) VALUES ('".$_GET['GetId']."','".$_POST['name']."','".$_POST['price']."','".$_POST['quentity']."','".$_POST['image']."')"; 
        $result = mysqli_query($conn, $sql);
        if(isset($_POST['rating']))
            {
                $sql = "UPDATE `productdetail` SET `Rating`='".$_POST['rating']."' WHERE `Id`='".$id."'";
                $result = mysqli_query($conn,$sql);
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
         echo "<div class='alert alert-danger'>
                 <strong>Unsuccessfull</strong> Product Already in the Cart.
                </div>";
        }
    ?>

    <div id="cover" class="container-fluid">
        <div id="divCover" class="container border">
            <h1 class="h1">Product Detail</h1>

        </div>
    </div>

    <div class="menuBody container">
        <div class="row">
            <?php
                       $sql = "SELECT * FROM productdetail where `Id`='".$id."'";
                       $result = mysqli_query($conn, $sql);
                       
                       if (mysqli_num_rows($result) > 0) {
                         // output data of each row
                         while($row = mysqli_fetch_assoc($result)) {
                           
                             $name = $row['name'];
                             $image = $row['image'];
                             $price = $row['price'];
                             $description = $row['Description'];
                             $rating = $row['Rating'];
                           ?>
            <div class="col-md-6">
                <div class="menuimg">
                    <img src="<?php echo $image; ?>" alt="">
                </div>
                <div id="menuslider" class="col-md-12">
                    <img src="<?php echo $image; ?>" alt="">
                    <img src="<?php echo $image; ?>" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="menubodysideheading">
                    <h4 class="heading">
                        <?php echo $name; ?>
                    </h4>
                    <h4 class="heading">$
                        <?php echo $price; ?>.00
                    </h4>
                </div>
                <?php 
                         }
                        }
                ?>
                <div class="menubodysiderating">
                  
                    <button class="fa fa-star starbutton " id="1" value="0"></button>
                    <button class="fa fa-star starbutton " id="2" value="0"></button>
                    <button class="fa fa-star starbutton" id="3" value="0"></button>
                    <button class="fa fa-star starbutton" id="4" value="0"></button>
                    <button class="fa fa-star starbutton" id="5" value="0"></button>
                    
               
            </div>
            <div class="menubodysideparagraph">
                <p>
                    <?php echo $description; ?>
                </p>
            </div>
            <form action="" method="post">
                <input type="hidden" name="image" value="<?php echo $image ?>">
                <input type="hidden" name="price" value="<?php echo $price ?>">
                <input type="hidden" name="name" value="<?php echo $name ?>">
                <input id="rating" type="hidden" value="<?php echo $rating; ?>">
                    <div class="menubodysidequentity">
                        <h4>Quantity</h4>
                        <button type="button" id="minus"><i class="fa fa-minus" aria-hidden="true"></i></button>
                        <input id="value" name="quentity" type="number" value="0">
                        <button type="button" id="plus"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                    <div class="menubodysideline">
                        <div>
                            <i class="fa fa-truck" aria-hidden="true"></i>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi dolores nam libero
                            </p>
                        </div>
                        <div>
                            <i class="fa fa-tags" aria-hidden="true"></i>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi dolores nam libero
                            </p>
                        </div>
                        <input id="rate" type="hidden" name="rating" value="">
                        <button type="submit" name="Submit">Shop Now</button>
                </form>
            </div>
        </div>
        <div class="col-md-12">
            <div class="menufootertop">
                <button>Description</button>
                <button>Reviews</button>
                <button>Additional Info</button>
                <div class="line">

                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab quidem corporis deleniti ex totam
                    dolor repellendus quisquam dolore laborum molestiae cupiditate fugiat odit ad natus corrupti
                    non, impedit ipsa atque! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero nulla
                    impedit quisquam obcaecati aut saepe dolores asperiores doloribus reiciendis ut repellat
                    repellendus voluptate eveniet quas architecto soluta, ipsa blanditiis error expedita sapiente
                    eligendi magni. Sit, quia fugiat sed cumque quae nisi veritatis esse voluptate assumenda autem
                    ex ipsa pariatur laboriosam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis
                    recusandae nihil sed ex debitis ut temporibus a molestiae veniam? Ullam dolor sit iusto
                    molestiae, totam aperiam eaque non quis laborum tempora impedit velit exercitationem aspernatur
                    nam voluptates dolores veniam. Non cupiditate doloremque minus temporibus quae, quam officia
                    incidunt earum quasi dignissimos placeat ad harum eius. Enim earum odio possimus aperiam,
                    exercitationem commodi nihil nam voluptatum, consequatur quia, debitis iste ab!</p>
            </div>
        </div>
    </div>
    </div>

    <?php include 'footer.php'; ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="index.js"></script>
    <script>
    display_rating();
    rating();

    function display_rating() {
        let id = document.getElementById('rating').value;
        for (let i = 0; i < id; i++) {
            var rate = document.getElementById(i + 1);
            document.getElementById(i + 1).classList.add("checked");
            rate.setAttribute("value", "1");
        }
    }
    var plus = document.getElementById('plus');
    var minus = document.getElementById('minus');
    var value = document.getElementById('value');
    plus.addEventListener("click", () => {
        let quentity = value.value;
        if (quentity >= 0 && quentity <= 20) {
            quentity++;
            value.value = quentity;

        } else if (quentity > 20) {
            alert("Quentity is above 20");
            console.log("hello");
        }

    })
    minus.addEventListener("click", () => {
        let quentity = value.value;
        if (quentity > 0) {
            quentity--;
            value.value = quentity;
        } else if (quentity < 0) {
            quentity = 0;
        }

    })


    function rating() {
        var ratings = document.getElementsByClassName("menubodysiderating");
        let count = 0;
        Array.from(ratings).forEach(element => {
            var len = element.children.length;
            for (let index = 0; index < len; index++) {
                document.getElementById(element.children[index].id).addEventListener('click', (e) => {

                    if (e.target.getAttribute("Value") == 1) {
                        let id = e.target.id;
                        count = id;
                        count--;
                        for (let rating = len; rating >= id; rating--) {
                            var rate = document.getElementById(element.children[rating - 1].id);
                            document.getElementById(element.children[rating - 1].id).classList.remove(
                                "checked");
                            rate.setAttribute("value", "0");
                            console.log(count);
                        }
                        
                        document.getElementById("rate").value = count;
                    } else {
                         count=0;
                        for (let rating = 0; rating < e.target.id; rating++) {
                            var rate = document.getElementById(element.children[rating].id);
                            document.getElementById(element.children[rating].id).classList.add(
                                "checked");
                            rate.setAttribute("value", "1");
                            count++;
                            console.log(count);
                        }
                        document.getElementById("rate").value = count;

                    }

                })

            }
        });

    }
    </script>
</body>

</html>