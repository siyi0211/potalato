<?php
session_start();

if(isset($_GET['search']))
{
    $searchq = $_GET['search'];
    $sort = $_GET['sort'];
    $searchq = preg_replace ("#[^0-9a-z]#i","",$searchq);
    
    $query = $connection->prepare("SELECT * FROM recipe WHERE recipe_name LIKE '%$searchq%'OR recipe_category LIKE'%$searchq%';");
        
    $query->execute();
}
?>