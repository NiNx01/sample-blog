<?php

    session_start() ;

    if(isset($_GET["cat_id"])){

        $cat_id = $_GET["cat_id"] ;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/homepage.css">
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css"
    rel="stylesheet" />
</head>
<body>




    <?php
    
            require("assets/php/__connection.php") ;

            $seletCategory = "SELECT * FROM categories WHERE cat_id = '{$cat_id}'" ;
            $result = mysqli_query($connection , $seletCategory) ;

            $outputCategory = mysqli_fetch_assoc($result) ;
    
    ?>

        <div class="category-hero">
            <img src="assets/images/user_uploads/<?php echo $outputCategory['cat_img'] ; ?>" alt="">
          
            <div class="back-btn">
                 <div class="container">
                 <i class="ri-arrow-left-line"></i><a class="back-btn-link" href="/phpZirakpurEveryday/Login system/">Back to home</a>
                </div>
           </div>
            
        </div>

        <div class="container">
               <div class="category-content-wrapper">
                    <div class="category-hero-text">
                        <h1><?php echo $outputCategory['cat_name'] ; ?></h1>
                        <p><?php echo $outputCategory['cat_description'] ; ?></p>
                    </div>
                    <div class="browse-other">
                        <h2>Browse other categories</h2>

                        <div class="browse-wrapper">

                    <?php
                    
                        $selectAll = "SELECT * FROM categories WHERE NOT cat_id = '{$cat_id}'" ;    // 'NOT' --> this will skip the matching query
                        $resultAll = mysqli_query($connection , $selectAll)     ;

                        while ($outputAll = mysqli_fetch_assoc($resultAll)) {

                            echo " <a href='category.php?cat_id={$outputAll['cat_id']}' class='card-clicker'>
                                        <div class='card card-browse'>
                                            <div class='card-img'> <img src='assets/images/user_uploads/{$outputAll['cat_img']}' alt='aaa'> </div>
                                        <div class='right-area'>
                                            <h3 class='browse-title'> {$outputAll['cat_name']} </h3>
                                                <p class='browse-description'> ". substr($outputAll['cat_description'] , 0 , 16)  ."...</p>
                                                
                                        </div>
                                        </div>
                                    </a>" ;
                            
                        }
                    
                    ?>


                           

                           
                        </div>

                    </div>
               </div>
            </div>
        

</body>
</html>


<?php

    }else{

        header("location:/phpZirakpurEveryday/Login system/explore.php") ;

    }

?>