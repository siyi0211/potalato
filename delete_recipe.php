<?php

    include 'connection.php';
    if(isset($_GET['recipe_id'])){

        $recipeid = $_GET['recipe_id'];
        $query = $connection->prepare("DELETE FROM recipe WHERE recipe_id = ?");
        $query -> execute([$recipeid]);
        $result = $query->fetch();
        header("Location: potalato_admin.php");
    
    } 
    else {
        header("Location: potalato_admin.php");
    }
    

?>