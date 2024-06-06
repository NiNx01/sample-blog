<?php

if(isset($_POST["post_btn"])){

    if(isset($_FILES["post_img"])){

        $post_title = $_POST["post_title"] ;
        $post_description = $_POST["post_description"] ;

        $post_description_fixed = str_replace("'" , "\'" , $post_description) ;

        // echo "<pre>" ;
        // echo var_dump($_FILES) ;
        // echo "</pre>" ;

        $file_name = $_FILES["post_img"]["name"] ;
        $file_tmp_name = $_FILES["post_img"]["tmp_name"] ;
        $file_size = $_FILES["post_img"]["size"] ;
        $file_type = $_FILES["post_img"]["type"] ;


        $file_type_sub = substr($file_type , 0 , 5) ;

        if($file_type_sub === "image") {

            // echo "allowed" ;

            if($file_size <= 2097152) {

                // echo "File size ok" ;

                require("../php/__connection.php") ; 

                // inserting into database
                $upload_img = "INSERT INTO categories (cat_name , cat_description , cat_img) VALUES ( '{$post_title}' , '{$post_description_fixed}' , '{$file_name}' )" ;
                $result = mysqli_query($connection , $upload_img) ;

                // saving the image
                $file_save_location = "user_uploads/" . $file_name ;

                // uploads the file to a specific location
                move_uploaded_file( $file_tmp_name , $file_save_location ) ;

                echo "Success" ;


            }else {

                echo "File not ok. Size should be less than 2mb" ;

            }

        }else {

            echo "Not allowed" ;

        }

    }

}else {
    echo "Not allowed" ;
}
