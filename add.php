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
        <li><a href="/phpZirakpurEveryday/Login system/" class="nav-link ">Home</a></li>
        <li><a href="/phpZirakpurEveryday/Login system/explore.php" class="nav-link">Explore</a></li>
        <li><a href="/phpZirakpurEveryday/Login system/add.php" class="nav-link active">Add post</a></li>
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

    <div class="main">
        <h1>Add a post</h1>
        <form action="assets/images/__uploadPost.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="" class="form-label">Title</label>
                <input type="text" class="form-control" name="post_title">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Description</label>
                <textarea id="" class="form-control form-textarea"  name="post_description"></textarea>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Add a cover image</label>
                <input type="file" class="form-control" name="post_img">
            </div>
            <div class="form-group">
                <button class="btn btn-primary-outline" name="post_btn">Upload</button>
            </div>
        </form>
    </div>

</body>
</html>