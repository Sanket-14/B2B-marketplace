<?php 
require('dbcon.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- styling started  -->

<style>
    body {
    margin: 0;
    font-family: Arial, sans-serif;
     /* background-image: url("B2B_bg.jpg");  */
     background-size: cover ;
    background-color:white;
    background-size: cover; */
    color: #333;
 }

 .navbar {
    
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: lightgreen; /* Updated background color for the navbar */
    color: white; /* Updated text color for the navbar */
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 25px;
    z-index: 1000; /* Ensure the navbar is on top of other elements */
    background-color: #26EA49;
    color: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
 }

 .navbar-brand {
    font-size: 24px;
    font-weight: bold;
    text-decoration: none; /* Remove underline from the brand */
    color: #141E12; /* Adjust color for the brand */
 }


 .navbar-links a {
    margin-right: 20px;
    text-decoration: none;
    color: #fff;
    padding: 8px 15px;
    border-radius: 5px;
    background-color: #141E12; /* Background color for the links */
 }

 .navbar-links a:hover {
    background-color: #fff; /* Change background color to white on hover */
    color: #000; /* Change text color to black on hover */
    text-decoration: none;
    box-shadow: 0 0 10px rgba(0, 128, 0, 0.5);
 }

 .fixed-navbar {
    position: fixed;
    top: 0;
    width: 100%;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

  .container {
            display: flex;
            width:1400px;
        }

        /* Style for the left half (30%) */
        .left-half {
            flex: 0 0 30%; /* 30% width, don't grow or shrink */
    padding: 20px; /* Add padding as needed */
    margin-top: 100px; /* Adjust this value based on the height of your navbar */
    overflow: auto; /* Enable vertical scrolling if needed */
    
    /* background-color:white; */
    
  
    
        }

        /* Style for the right half (70%) */
        .right-half {
            flex: 0 0 65%; /* 70% width, don't grow or shrink */
    /* background-color: #ffffff; Add your desired background color */
    padding: 20px; /* Add padding as needed */
    margin-top: 100px; /* Adjust this value based on the height of your navbar */
    overflow: auto; /* Enable vertical scrolling if needed */
    /* border : 2px solid black; */
  
            
        }
       /* Additional styles for the left half */


/* Styles for the rectangular div with 3:1 ratio */
.filter-panel {
    width: 80%; /* Adjust as needed to occupy 80% of the left-half div */
    height: calc(80% * 0.33); /* Maintain the 3:1 ratio */
    /* border: 1px solid #ddd; */
    border-radius: 8px;
    padding: 16px;
    box-sizing: border-box;
}




     /* Style for the filter checkboxes */
     .filter-checkbox {
        margin-bottom: 20px;
        /* display: flex; */
        align-items: center;
        /* flex-wrap: wrap; */
    }

    /* Style for each checkbox */
    .filter-checkbox input[type="checkbox"] {
        margin-right: 8px;
       
    }

    /* Style for the labels of checkboxes */
    .filter-checkbox label {
        margin-bottom: 8px;
        font-weight: normal;
        color: #333;
        display: inline-block;
    }
    .filter-checkbox input[type="checkbox"]:checked  {
    background-color: green;
    border: 2px solid #4caf50; /* Change the border color when checked */
}

button {
            padding: 5px 15px;
            font-size: 16px;
            font-weight: bold;
            background-color: #26EA49;
            border: 2px solid black;
            border-radius: 5px;
            cursor: pointer;
            transition: box-shadow 0.3s;
        }

        /* Add hover effect */
        button:hover {
            box-shadow: 0 4px 8px rgba(0, 128, 0, 0.6);
        }

        .link-buttons{
            display:flex;
        }
 

</style>



</head>
 


<body>
<section>
<div class="navbar" style="position: fixed;
    top: 0;
    left:0; 
    width: 98%;
    padding: 25px;">
        <div class="navbar-brand">VoltBridge</div>
        <div class="link-buttons">
        <div class="navbar-links">
            <a href="index.php">Home</a>
        </div>
        <div class="navbar-links">
            <a href="">About us</a>
        </div>
        <div class="navbar-links">
            <a href="">Contact us</a>
        </div>
        </div>
        
</div>

</section>


   


<section>


<div class="container">
<!-- --------------------------gpt testing below-------------------------------- -->

<?php
 if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    // Use $searchTerm in your database query
    // Example:
    $query = "SELECT * FROM voltbridge.Add_listing WHERE categories LIKE '%$searchTerm%'";
    $result = mysqli_query($conn, $query);
 }
 
?>

<!-- for categories folters 30% -->

<div class="left-half" >
    <!-- <h2>Dive Deep in what you are looking for by applying below filters...</h2> -->
<div class="left-half" style="margin-top:-10px; border: 2px solid white; background-color:whitesmoke" >
    <div class="filter-panel">
       
        <div class="filter-checkbox">
            <label for="supplier-type">Supplier Type:</label> <br>
            
            <input type="checkbox" id="type1" name="supplier-type[]" value="type1"><label for="type1">Distributor</label>
            <br>
            <input type="checkbox" id="type2" name="supplier-type[]" value="type2"><label for="type2">Wholesaler</label>
            <br>
            <input type="checkbox" id="type3" name="supplier-type[]" value="type3"><label for="type3">Service Provider</label>
            <br>
            <!-- Add more checkboxes as needed -->
        </div>

        <div class="filter-checkbox">
        <label for="categories">Categories:</label> <br>
            <input  type="checkbox" id="category1" name="categories[]" value="category1">
            <label for="category1">Plastic</label> <br>
            <input type="checkbox" id="category2" name="categories[]" value="category2">
            <label for="category2">Bearings</label> <br>
            <input type="checkbox" id="category3" name="categories[]" value="category3">
            <label for="category3">Electric motor parts</label> <br>
            <input type="checkbox" id="category4" name="categories[]" value="category4">
            <label for="category4">Software solution</label> <br>
            <input type="checkbox" id="category5" name="categories[]" value="category5">
            <label for="category5">Casting Parts</label> <br>
            <input type="checkbox" id="category6" name="categories[]" value="category6">
            <label for="category6">Electronics</label> <br>
            <input type="checkbox" id="category7" name="categories[]" value="category7">
            <label for="category7">Drivetrain</label> <br>
            <input type="checkbox" id="category8" name="categories[]" value="category8">
            <label for="category8">Machining</label> <br>
            <input type="checkbox" id="category9" name="categories[]" value="category9">
            <label for="category9">Cold Stamping</label> <br>
            <input type="checkbox" id="category10" name="categories[]" value="category10">
            <label for="category10">Precision Stamping</label> <br>
            <input type="checkbox" id="category11" name="categories[]" value="category11">
            <label for="category11">Winding Wire</label> <br>
            <input type="checkbox" id="category12" name="categories[]" value="category12">
            <label for="category12">Gears</label> <br>

            <!-- Add more checkboxes as needed -->
        </div>
        <button onclick="updateResults()">Apply</button>

    </div>
</div>

</div>

<!-- for listing 70% width -->

<div class="right-half" >
    <?php
 if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $counter = 1; // Initialize a counter

            while ($row = mysqli_fetch_assoc($result)) {
                include 'card.php';

                echo '<script>';
                echo 'var cards = document.getElementsByClassName("product-card-' . $counter . '");'; // Use a unique class for each card
                echo 'for (var i = 0; i < cards.length; i++) {';
                echo '    cards[i].getElementsByClassName("heading")[0].innerText = "' . $row['comp_name'] . '";';
                echo '    cards[i].getElementsByClassName("link")[0].innerText = "' . $row['Website'] . '";';
                echo '    cards[i].getElementsByClassName("link")[0].href = "' . $row['Website'] . '";';
                echo '    cards[i].getElementsByClassName("p-location")[0].innerText = "' . $row['Country'] . '";';
                echo '    cards[i].getElementsByClassName("supplier_type")[0].innerText = "Supplier type: ' . $row['Supplier_type'] . '";';
                echo '    cards[i].getElementsByClassName("comp_image")[0].src = "uploads/' . $row['image_url'] . '";';
                echo '}';
                echo '</script>';

                $counter++;
            }
        } else {
            echo "<p>No results found for '$searchTerm'</p>";
        }
    } else {
        // Handle the SQL query error
        echo "Error: " . mysqli_error($connection);
    }

    ?>
</div>

</div>
<section>


<script>
    document.addEventListener("DOMContentLoaded", function () {
    // Get the navbar element
    var navbar = document.querySelector('.navbar');

    // Get the offset position of the navbar
    var sticky = navbar.offsetTop;

    // Add the 'fixed-navbar' class when scrolling past the navbar
    window.onscroll = function () {
        if (window.pageYOffset > sticky) {
            navbar.classList.add("fixed-navbar");
        } else {
            navbar.classList.remove("fixed-navbar");
        }
    };
});

</script>


</body>


</html>

