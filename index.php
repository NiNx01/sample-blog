<?php

    session_start() ;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/homepage.css">
</head>
<body>

    <header>

        <nav>
            <div class="logo">Logo</div>

            <ul class="navbar">
                <li><a href="/phpZirakpurEveryday/Login system/" class="nav-link active">Home</a></li>
                <li><a href="/phpZirakpurEveryday/Login system/explore.php" class="nav-link">Explore</a></li>
                <li><a href="/phpZirakpurEveryday/Login system/add.php" class="nav-link">Add post</a></li>
            </ul>

           <form action="explore.php" method="get">
                <div class="searchbar">
                    <input type="text" name="searchQuery">
                    <button class="btn btn-primary-outline" >Search</button>
                </div>
           </form>

        <?php

            if(isset($_SESSION['name'])){

                echo "
                <div class='user'>Welcome {$_SESSION['name']} <a href='assets/php/__logout.php' class='btn btn-primary btn-logout'>Logout</a> </div>
                
                " ;

            }else{

                echo "  <div class='buttons'>
                            <a href='login.php' class='btn btn-primary'>Login</a>
                            <a href='createAccount.php' class='btn btn-primary-outline'>Signup</a>
                        </div>
                        " ;

            }
        
        ?>

        </nav>

    </header>

    <div class="hero">
        <div class="container">
           <div class="hero-text">
            <h1>Welcome to Anime Blogs</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente delectus numquam exercitationem pariatur odit fugiat esse saepe dolorem vero quia!</p>
           </div>
        </div>
    </div>

    <?php
    
            require("assets/php/__connection.php") ;

            $seletCategory = "SELECT * FROM categories" ;
            $result = mysqli_query($connection , $seletCategory) ;


    
    ?>

    <main>
        <div class="container">
            <h2 class="section-heading">Explore topics</h2>
            <div class="row">

            <?php

                while($outputCategory = mysqli_fetch_assoc($result)){

            ?>

               <a href="category.php?cat_id=<?php echo $outputCategory["cat_id"] ; ?>" class="card-clicker">
                <div class="card">
                        <div class="card-img"> <img src="assets/images/user_uploads/<?php echo $outputCategory['cat_img'] ; ?>" alt=""> </div>
                        <h3 class="card-title"> <?php echo $outputCategory['cat_name'] ; ?> </h3>
                        <p class="card-description"> <?php echo substr( $outputCategory['cat_description'] , 0 , 70) ; ?> ....</p>
                        <button class="btn btn-primary">Explore</button>
                    </div>
               </a>
            
            <?php 

                }
            
            ?>
        
            
            </div>
        </div>
    </main>


</body>
</html>