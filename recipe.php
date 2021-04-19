<?php
session_start();
    include 'connection.php';

   if(isset($_POST['submit'])){
    //Set the location of the destination folder to upload files to.
    $target_folder = "../potalato/upload";
    
    $isEverythingOK = "yes";
    
    //Set the full path to the file on the server
    //If the file you going to upload is "a.jpg", the full path to save the file is "uploads/a.jpg" on the server
    $target_file = $target_folder . basename($_FILES["imageToUpload"]["name"]);
    
    //Get just the file name of the file you are going to upload
    $file_name = strtolower(pathinfo($target_file, PATHINFO_FILENAME));
        
    //Get just the file extension (file type) of the file you are going to upload    
    $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    //Make a new full path to the file to be saved on the server
    $new_filename = $target_folder . $file_name . time().".".$file_extension;
    
    //echo "The file extension is " . $file_extension;
    
    if($file_extension != "jpg" && $file_extension != "webp" && $file_extension != "png" && $file_extension != "gif"){
        echo "Sorry, image only.";
        $isEverythingOK = "no";
    }
    
    if($_FILES["imageToUpload"]["size"] > 1000000000){
        //action
        echo "Sorry, file too big.";
        $isEverythingOK = "no";
    }
    
    if($isEverythingOK == "no"){
        echo "File not uploaded";
    }
    else {
        
        //Save file on the server
        move_uploaded_file($_FILES["imageToUpload"]["tmp_name"],$new_filename);
        
        //Insert record into table
        //Connect to database
        include_once 'connection.php';
        
        $rcatergory1 = "" ;
        foreach ($_POST['rcatergory'] as $key => $value)
        {
        $rcatergory1 = $rcatergory1 . $value;   
        if (count($_POST['rcatergory']) != ($key+1) ) {
            $rcatergory1 = $rcatergory1 . ", " ;
        }
        }
            
//        if(in_array($_POST['rcatergory'][$key],$checked_array))
        
        
        //Collect data from form inputs
        $ruserid = (int)$_POST['user_id'];
        $recipe_name = $_POST['recipe_name'];
        $description = $_POST['description'];
        $ingredients = $_POST['ingredients'];
        $directions = $_POST['directions'];
        $rcatergory = $_POST['rcatergory'];
        

        //INSERT query with positional placeholders
        $query = $connection -> prepare('INSERT INTO recipe (user_id, recipe_name, recipe_img, recipe_description, recipe_ingredients,  recipe_directions, recipe_catergory) VALUES (?, ?, ?, ?, ?, ?, ?,?,?)');
        
        //Execute the SQL
        $result = $query -> execute([$ruserid,$rname, $new_filename,$rdescription,$ringredients,$rprepare,$rserving,$rsteps,$rcatergory1]);
        
        //Check output of SQL
        if($result)
        {
            echo "Successful";
        }
        else 
        {
            echo "Failed";
        }
    }
}


?>