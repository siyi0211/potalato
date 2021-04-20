<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<title>Potalato</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/fontawesome-all.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<?php 
include 'nav.php'
?>
<?php
    if (isset($_SESSION["user_id"])) {
        header("Location:potalatoweb.php");
    }

    include 'connection.php';
    if($_SERVER["REQUEST_METHOD"] == "POST") {
	 
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        $hash_password = password_hash($password,PASSWORD_DEFAULT);
        
        $query = $connection->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (?,?,?)");
        
        $result = $query->execute([$username, $email, $hash_password]);

        if ($result){

            $query = $connection->prepare("SELECT * FROM users WHERE user_email = ?");
            $query -> execute([$email]);
            $result_get = $query->fetch();

            $_SESSION["user_id"] = $result_get['user_id'];
            $_SESSION["user_name"] = $result_get['user_name'];
            
            header("Location:potalatoweb.php");
        }
        else
        {
            echo "Sorry, there is an error.";
        }
    }
    

?>
<body>
    
    <div class="container-fluid">
        <div class="row bg-beige">
            <div class="col">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center" style="padding: 20px">
                            <heading1-1>Sign Up</heading1-1><br><br>
                            <form action="sign up.php"  method="post">
                                <input type="text" class="form-control mr-sm-2" id="username" placeholder="Username" name="username" required><br>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                <input type="text" class="form-control mr-sm-2" id="email" placeholder="Email" name="email" required><br>
                                <input type="password" class="form-control mr-sm-2" placeholder="Password" name="password" required><br>
                                <button type="submit" class="btn button-color mt-3">Create Account</button>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    
    
    <div class="row bg-nav pt-2 fixed-bottom">
        <div class="col-lg-12 text-center" style="padding: 20px"><p>&copy;all right deserved to How Jue Min</p>
        </div>
        </div>
    
    </body>
</html>


