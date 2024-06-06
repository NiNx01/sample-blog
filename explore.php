<?php

    session_start() ;
    // require("assets/php/__domain.php")

    if(isset($_GET["searchQuery"])){

        $search_query = $_GET["searchQuery"] ;

    }else{
        $search_query = "" ;
    }

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
                <li><a href="/phpZirakpurEveryday/Login system/" class="nav-link ">Home</a></li>
                <li><a href="/phpZirakpurEveryday/Login system/explore.php" class="nav-link active">Explore</a></li>
                <li><a href="/phpZirakpurEveryday/Login system/add.php" class="nav-link">Add post</a></li>
            </ul>

           <form action="explore.php" method="get">
                <div class="searchbar">
                    <input type="text" name="searchQuery" value="<?php echo $search_query ; ?>">
                    <button class="btn btn-primary-outline">Search</button>
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

   
    <?php

            require("assets/php/__connection.php") ;
            
           if(isset($_GET["searchQuery"])){

                $user_search = $_GET["searchQuery"] ;

                $seletCategory = "SELECT * FROM categories WHERE match(cat_description) against('{$user_search}')" ;

           }else {

                 $seletCategory = "SELECT * FROM categories" ;
           }

            // $seletCategory = "SELECT * FROM categories" ;
            $result = mysqli_query($connection , $seletCategory) ;


    
    ?>

    <main>
        <div class="container">
            <?php
                if(isset($_GET["searchQuery"])){
                    echo "<h2 class='section-heading'>Showing results for <em>'{$search_query}'</em></h2>" ;
                }else{
                    echo "<h2 class='section-heading'>Explore topics</h2>" ;
                }
            ?>
            
            <div class="row-explore">

            <?php

                if(mysqli_num_rows($result) > 0){

                while($outputCategory = mysqli_fetch_assoc($result)){

            ?>

                <a href="category.php?cat_id=<?php echo $outputCategory["cat_id"] ; ?>"" class="card-clicker">
                    <div class="card card-browse">
                        <div class="card-img"> <img src="assets/images/user_uploads/<?php echo $outputCategory['cat_img'] ; ?>" alt=""> </div>
                    <div class="right-area">
                        <h3 class="card-title"> <?php echo $outputCategory['cat_name'] ; ?> </h3>
                            <p class="card-description"> <?php echo substr( $outputCategory['cat_description'] , 0 , 240) ; ?> ....</p>
                            
                    </div>
                    </div>
                </a>
            
            <?php 

                }

            }else {

                echo "<div class='card'>
                           <h2 class='no-results'> No results found for <em>'{$search_query}'</em></h2>
                    </div>" ;

            }
            
            ?>
        
            
            </div>
        </div>
    </main>


</body>
</html>