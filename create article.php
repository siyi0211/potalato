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
    
    <!create recipe>
    <div class="container-fluid">
        <div class="row bg-beige">
            <div class="col">
                 <form action="/action_page.php">
                     <div class="row justify-content-center">
                         <div class="col-lg-6 text-center" style="padding: 20px">
                             <heading1-1>Create Article</heading1-1>
                             <input type="text" class="form-control mr-sm-2" id="recipe title" placeholder="article title" name="rarticle title" required>
                             <input style="padding:200px 10px" type="text" class="form-control mr-sm-2" id="ingredients" placeholder="content" name="content" required>
                             <div class="txt_field1">
                                 <label>Category:</label><br>

                                 All about Ingredients !!
                                 <input type="checkbox" id="rcatergoryid" name="rcatergory[]" value="Main Dish"><br>
                                 Make it Better
                                 <input type="checkbox" id="rcatergoryid" name="rcatergory[]" value="Side Dish"><br>

                             </div>
                             <div class="txt_field1">
                                 <label for="imageToUpload" class="heading3">upload photo</label>
                                 <br>
                                 <input type="file" id="imageToUpload1" name="imageToUpload1" accept="image/*" onchange="loadFile1(event)" required>
                                 <img id="output1" style="width:300px">
                                 <script>
                                     var loadFile1 = function(event) {
                                         var reader = new FileReader();
                                         reader.onload = function() {
                                             var output = document.getElementById('output1');
                                             output.src = reader.result;
                                         };
                                         reader.readAsDataURL(event.target.files[0]);
                                     };
                                 </script>
                             </div>
                             <div class="row justify-content-center">
                                 <div class="col-lg-6" style="padding: 20px"><input type="text" class="form-control mr-sm-2" id="username" placeholder="username" name="username" required>
                             <input type="text" class="form-control mr-sm-2" id="email" placeholder="email" name="email" required>
                             <button type="submit" class="btn button-color mt-3">Submit Your Article</button>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </form>
            </div>
        </div>
    </div>
    
    <div class="row bg-nav pt-2">
        <div class="col-lg-12 text-center" style="padding: 20px"><p>&copy;all right deserved to How Jue Min</p>
        </div>
        </div>
    
    </body>
</html>