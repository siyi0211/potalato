<?php
if (isset($_POST['submit'])) {
    echo "From Post";

    $target_folder = "/img/uploads/recipes";

    $isEverythingOK = true;

    $target_file = $target_folder . basename($_FILES["imageToUpload"]["name"]);

    $file_name = strtolower(pathinfo($target_file, PATHINFO_FILENAME));

    $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $new_filename = $target_folder . $file_name . time() . "." . $file_extension;

    if ($file_extension != "jpg" && $file_extension != "webp" && $file_extension != "png" && $file_extension != "gif") {
        echo "Sorry, image only";
        $isEverythingOK = false;
    } else if ($_FILES["imageToUpload"]["name"]) {
        echo "File too big";
        $isEverythingOK = false;
    }

    if (!$isEverythingOK) {
        echo "File not upload";
    } else {
        
    }

} else {
    header("Location: potalatoweb.php");
}