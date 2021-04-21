<?php
try{
    $connection = new PDO('mysql:host=localhost;dbname=potalato','root','');
    
}
catch (PDOException $e) {
    echo $e->getMessage();
}

