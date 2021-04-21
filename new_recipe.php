<?php
include_once('connection.php');


function checkImageFile() {
    $target_folder = "img/webimg/";

    $isEverythingOK = true;

    $target_file = $target_folder . basename($_FILES["imageToUpload"]["name"]);

    $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    if ($file_extension != "jpg" && $file_extension != "webp" && $file_extension != "png" && $file_extension != "gif") {
        echo "Sorry, image only";
        $isEverythingOK = false;
    } 
    if ($_FILES["imageToUpload"]["size"] > 100000000) {
        echo "File too big";
        $isEverythingOK = false;
    }
    return $isEverythingOK;
}

function getImageFileName() {
    $target_folder = "img/webimg/";

    $isEverythingOK = true;

    $target_file = $target_folder . basename($_FILES["imageToUpload"]["name"]);

    $file_name = strtolower(pathinfo($target_file, PATHINFO_FILENAME));

    $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $new_image_filename = $target_folder . $file_name . time() . "." . $file_extension;

    return $new_image_filename;
}

// If post for 'new' or 'edit'
if (isset($_POST['new'])) {
    echo "From Post";

    // move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], getImageFileName());

    // // $user_name = $_POST['user_name'];
    // $recipe_name = $_POST['recipe_name'];
    // $description = $_POST['description'];
    // $ingredients = $_POST['ingredients'];
    // $directions = $_POST['directions'];
    // $recipe_category = $_POST['recipe_category'];
    // $cooking_style = $_POST['cooking_style'];


    // // If the $_FILES is not empty
    // if (!empty($_FILES["imageToUpload"]["name"])) {
        
    //     // If the image pass those condition
    //     if (checkImageFile()) {
    //         echo "Pass Condition";

    //         if (isset($_POST['new'])) {

    //             $query = $connection -> prepare('INSERT INTO recipe (recipe_name, recipe_img, recipe_description, recipe_ingredients, recipe_category, recipe_cooking_style, recipe_directions, create_user) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');

    //         } else if (isset($_POST['edit'])) {

                

    //         } else {
    //             echo 'why are you here';
    //         }
            
    //     } else {
    //         echo "Error";
    //     }

    // } else{
    //     // Edit Recipe with No New Image
    //     if (isset($_POST['edit'])) {
    //         echo "Update without image";
    //         $query = $connection -> prepare('UPDATE recipe SET recipe_name, recipe_description, recipe_ingredients, recipe_category, recipe_cooking_style, recipe_directions, create_user) VALUES (?, ?, ?, ?, ?, ?, ?)');

    //     } else {
    //         echo "update with new ??";
    //     }
    // }


    if (!checkImageFile()) {
        echo "File not upload";

    } else {
        
        include_once 'connection.php';

        move_uploaded_file($_FILES["imageToUpload"]["tmp_name"],$new_image_filename);

        $user_name = $_POST['user_name'];
        $recipe_name = $_POST['recipe_name'];
        $description = $_POST['description'];
        $ingredients = $_POST['ingredients'];
        $directions = $_POST['directions'];
        $recipe_category = $_POST['recipe_category'];
        $cooking_style = $_POST['cooking_style'];

        $query = $connection -> prepare('INSERT INTO recipe (recipe_name, recipe_img, recipe_description, recipe_ingredients, recipe_category, recipe_cooking_style, recipe_directions, create_user) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');

        $result = $query -> execute([$recipe_name, $new_image_filename, $description, $ingredients, $recipe_category, $cooking_style, $directions, $user_name]);

        if ($result) {
            echo "Successful";

            $last_id = $connection -> lastInsertId();
            header("Location: recipedetail.php?recipe_id=".$last_id);
                        
        } else {
            echo "Failed";
        }
    }

} else {
    header("Location: potalatoweb.php");
}