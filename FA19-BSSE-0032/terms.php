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
            <h1 class="h1">Terms And Services</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-justify-term">
                <h1 class="h1 text-center">Terms & Services</h1>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum, dolorem quasi deserunt molestias
                recusandae architecto nostrum suscipit culpa doloribus inventore ab iusto officia voluptatem cumque
                minus animi voluptatibus natus minima praesentium? Nostrum et fuga ea dolor sunt ullam delectus nemo
                odit? Accusantium, voluptas voluptates? Nemo consequuntur sequi reiciendis officiis aut fugiat
                dignissimos ipsum maxime consectetur, eveniet cum voluptatibus eius sunt labore eligendi totam dolorem
                vitae quis ipsa similique impedit? In dolor obcaecati earum ullam fuga numquam, repellendus placeat
                repudiandae, accusantium adipisci atque et blanditiis cumque perspiciatis consectetur magnam provident
                explicabo possimus animi ut eveniet optio hic quas. Quidem velit quae similique culpa molestiae
                recusandae amet deserunt porro non fuga dolorum, ab dolore unde, quod nulla expedita. Architecto
                perspiciatis recusandae commodi quasi error in deserunt expedita qui ipsum dicta nulla eum at
                reprehenderit neque, quas fugiat quibusdam cum fuga enim aliquam atque distinctio laborum? Eius vero
                doloremque, praesentium sint voluptatum hic animi minus recusandae accusantium suscipit, ipsum, dolorem
                tempora eum officiis inventore pariatur similique perferendis illum possimus ipsa asperiores quos
                delectus? Qui, in quod? Aspernatur voluptates perspiciatis nesciunt doloremque, ex expedita beatae
                doloribus ullam quia eos consequuntur quisquam consequatur illo quod aperiam! Quos nulla, sapiente sit
                iste ex blanditiis ratione vitae quasi qui porro illum beatae neque nobis officia, voluptas velit
                laboriosam provident tenetur eligendi dolores possimus magni? Quis temporibus perferendis reiciendis
                minus, aliquid tempora deleniti doloribus expedita autem beatae non enim libero hic eos minima est
                numquam animi cumque! Nihil, voluptas enim porro ad laborum illo exercitationem dicta quam provident
                quod laudantium quidem quibusdam architecto omnis tempore, iure aspernatur similique ducimus. Eligendi
                aliquam ad officia, accusamus cum voluptatibus ea quam enim at temporibus molestias ipsam est
                laboriosam! Saepe alias vel similique. Asperiores ipsam laudantium, praesentium unde nesciunt magnam!
                Pariatur animi repellat quis atque iste ullam distinctio corporis magnam est ipsa!
            </div>
        </div>
    </div>

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