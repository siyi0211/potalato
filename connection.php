<?php
try{
    $connection = new PDO('mysql:host=localhost;dbname=potalato','root','');
    echo "Connection successful";
}
catch (PDOException $e) {
    echo $e->getMessage();
}
?>
