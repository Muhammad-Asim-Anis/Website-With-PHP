<?php
include 'connect.php'; 
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


    <div id="cover" class="container-fluid">
        <div id="divCover" class="container border">
            <h1 class="h1">Your Jewelery Is Our Passion</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa natus sint nulla omnis nisi
                doloremque cumque nostrum quas iste. Animi accusantium odit maiores, voluptates sit laudantium
                reprehenderit voluptatibus. Sint, explicabo!</p>
            <button class="btn">Learn More</button>
        </div>
    </div>

    <section id="Aboutus">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="heading">About US</h6>
                    <h1 class="h1body">Where Class Meets Glamour</h1>
                    <div>
                        <p class="text-justify">

                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illo iusto ipsa suscipit ducimus
                            officia fugiat quis dolore doloribus at exercitationem. Lorem ipsum dolor sit amet
                            consectetur
                            adipisicing elit. Architecto eligendi debitis illum distinctio odit quia quos eveniet
                            dignissimos, quasi voluptate ad! Esse libero beatae est in itaque neque inventore unde.

                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita id impedit labore ullam?
                            Fuga neque at minus eum tenetur omnis cum! Dolore nemo, aut minus commodi voluptas doloribus
                            architecto iste obcaecati non ipsam et laudantium iusto voluptatum, provident ratione porro!
                            Facilis accusantium quae, quisquam labore laboriosam earum dolore. Deserunt autem aliquam
                            accusantium harum, esse alias obcaecati aliquid veniam soluta ab consequuntur itaque amet
                            labore? Libero tenetur sunt eius explicabo, ad dolorum deleniti et illo assumenda a
                            cupiditate amet, sint modi alias sit odio, repudiandae vel consequuntur nostrum ratione
                            laborum autem maiores quod veritatis. Sequi voluptatum non earum id iure rerum.
                        </p>
                        <button class="btnbody">Learn More</button>

                    </div>
                </div>
                <div id="divimg" class=" col-md-6 col-xs-12">

                    <img src="images/jewelleryabout.png" alt="">
                    <img id="img_div" src="images/jewelleryabout2.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <section id="productSection">
        <div class="container ">
            <div class="row">
                <div id="productHead">
                    <h6 class="heading">Product</h6>
                    <h1 class="h1body">Our Product</h1>
                    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam quis cum
                        quas voluptate excepturi
                        provident tempore itaque officia eveniet sunt. Lorem ipsum dolor sit amet.</p>
                </div>
                <div id="productBody">
                    <?php
                    $sql = "SELECT * FROM `productdetail` LIMIT 0,4";
                    $result = mysqli_query($conn,$sql);

                    foreach($result as $value)
                    {
                        echo "
                        <div class='col-lg-3 col-md-6'>
                        <img src='".$value['image']."' height='365' alt='' srcset=''>
                        <h4>".$value['name']."</h4>
                    </div>
                        ";
                    }
                    ?>
                   
                    <div class="col-md-12">
                        <button onclick="window.location.href='shopMenu.php'" id="productBtn">View All</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="CategorySection">
        <div class="container ">
            <div class="row">
                <div id="productHead">
                    <h6 class="heading">Catagories</h6>
                    <h1 class="h1body">Product By Catagories</h1>
                    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam quis cum
                        quas voluptate excepturi
                        provident tempore itaque officia eveniet sunt. Lorem ipsum dolor sit amet.</p>
                </div>
                <div id="CategoryBody">
                   
                    <div class="col-lg-4 col-md-6">
                        <img src="images/ring1.png" alt="" srcset="">

                    </div>
                    <div class="col-lg-4 col-md-6">
                        <img src="images/ring2.png" alt="" srcset="">

                    </div>
                    <div class="col-lg-4 col-md-6">
                        <img src="images/ring3.png" alt="" srcset="">

                    </div>
                </div>
            </div>
            <div id="CategoryFooter">
                <h4>Subscribe Our Newsletter</h4>
                <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam quis cum quas
                    voluptate excepturi
                    provident tempore itaque officia eveniet sunt. Lorem ipsum dolor sit amet.</p>

                <div class="col-md-12 w-sm-100" id="CategoryEmail">
                    <input type="email" name="email" placeholder="Please enter your email address">
                    <button>Subscribe</button>
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