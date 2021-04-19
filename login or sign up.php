<?php 
include 'nav.php'
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Yong Fen Yu">
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
<body>
    
    
    <div class="container-fluid">
        <div class="row bg-beige">
            <div class="col">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center" style="padding: 20px">
                            <heading1-1>Sign Up</heading1-1>
                             <form action="sign up.php"  method="post" variable="temporary storage=$">
                            <input type="text" class="form-control mr-sm-2" id="username" placeholder="username" name="username" required>
                            <input type="text" class="form-control mr-sm-2" id="email" placeholder="email" name="email" required>
                            <input type="password" class="form-control mr-sm-2" placeholder="password" name="password" required>
                            <button type="submit" class="btn button-color mt-3">Create Account</button>
                                 </form>
                        </div>
                    </div>
            </div>
            <div class="col">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center" style="padding: 20px">
                            <heading1-1>Login</heading1-1>
                            <form action="login.php" method="post" variable="temporary storage=$">
                            <input type="text" class="form-control" id="email" placeholder="email" name="email" required>
                            <input type="password" class="form-control" placeholder="password" name="password" required>
                            <button type="submit" class="btn button-color mt-3">Login</button>
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