<?php 
require('dbcon.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Product Card</title>
    <style>

.product-card-<?php echo $counter; ?> {
    width: 900px;
    height: 195px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 1);
    padding: 16px;
    box-sizing: border-box;
    position: relative;
    display: block;
    margin-bottom: 20px;
    transition: background-color 0.3s ease; /* Add a smooth transition effect */
}

 .product-card-<?php echo $counter; ?>:hover {
    background-color: #d4f4dd; /* Light green color */
}
  </style>


</head>



<body>



<?php
// Ensure the $counter variable is defined before including this file
if (!isset($counter)) {
    $counter = 1;
}
?>

<!-- card.php -->

<div class="product-card-<?php echo $counter; ?>">
    <div class="header">
        <h1 class="heading"></h1>
        <div class="overview">
            <p class="description" style="width: 670px; margin-top: -5px; margin-bottom: 20px;">hard coded for now here will come company overview if required</p>
        </div>

        <div class="website">
            <p><span class="logo"><img src="link_logo.jpg" alt="Your Logo"></span> <a class="link" href="" target="_blank"></a></p>
        </div>
        <div style="margin-top:-7px" class="location">
            <img src="globe-icon.jpg" alt="Globe Icon">
            <p class="p-location"></p>
        </div>
        <p class="supplier_type"></p>
        <p class="volume"></p>
        </div>
    <div class="company-logo">
        <img class="comp_image" src="" alt="Company Logo">
    </div>
</div>



</body>
</html>
