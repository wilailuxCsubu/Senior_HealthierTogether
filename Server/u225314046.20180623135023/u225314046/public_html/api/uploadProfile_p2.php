<?php
    $name = $_POST&#91;'name'&#93;; //image name
    $image = $_POST&#91;'image'&#93;; //image in string format
 
    //decode the image
    $decodedImage = base64_decode($image);
 
    //upload the image
    file_put_contents("img/".$name.".jpg", $decodedImage);
?>