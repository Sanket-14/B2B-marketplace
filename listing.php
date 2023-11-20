<?php 
require('dbcon.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    
   
    <script>
        var searchTerm = <?php echo json_encode($searchTerm); ?>;
    </script>
    <!-- styling started  -->
<!-- card  styling -->
    
    

<style>
    body {
    margin: 0;
    font-family: Arial, sans-serif;
     /* background-image: url("B2B_bg.jpg");  */
     background-size: cover ;
    background-color:white;
    background-size: cover; */
    color: #333;
    /* max-width:3000px; */
 }

 .navbar {
    
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: #26EA49; /* Updated background color for the navbar */
    color: white; /* Updated text color for the navbar */
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    position: fixed;
    top: 0;
    width: 100%; /* Set the width to 100% */
    z-index: 1000; /* Ensure the navbar is on top of other elements */
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
            width: 1500px;
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
    width: 100%;
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
            
            <input type="checkbox" id="type1" name="supplier-type[]" value="Distributor"><label for="type1">Distributor</label>
            <br>
            <input type="checkbox" id="type2" name="supplier-type[]" value="Manufacturer"><label for="type2">Manufacturer</label>
            <br>
            <input type="checkbox" id="type3" name="supplier-type[]" value="Wholesaler"><label for="type3">Wholesaler</label>
            <br>
            <!-- Add more checkboxes as needed -->
        </div>

        <div class="filter-checkbox">
        <label for="volume">Production Volume Capability:</label> <br>
            <input  type="checkbox" id="volume1" name="volume[]" value="low">
            <label for="volume1">low</label> <br>
            <input type="checkbox" id="volume2" name="volume[]" value="moderate">
            <label for="volume2">moderate</label> <br>
            <input type="checkbox" id="volume3" name="volume[]" value="high">
            <label for="volume3">high</label> <br>
            

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
                echo '    cards[i].getElementsByClassName("volume")[0].innerText = "Production Volume Capability:' . $row['PV_capacity'] . '";';
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

function updateResults() {
    // Get selected checkboxes
    var volume = $('input[name="volume[]"]:checked').map(function(){
        return this.value;
    }).get();

    var supplierTypes = $('input[name="supplier-type[]"]:checked').map(function(){
        return this.value;
    }).get();

    var searchTerm = '<?php echo $_GET['search']; ?>';
    


    // AJAX request to update results
    $.ajax({
        url: 'filter.php',
        type: 'GET',
        data: {volume:volume ,supplierTypes: supplierTypes ,searchTerm: searchTerm},
        success: function(data) {
            $('.right-half').html(data);
        },
        error: function(error) {
            console.log(error);
        }
    });
}








</script>

<?php
// Include this function in your PHP file

// function generateCard($row, $counter) {
//     include 'card.php';
    
//     echo '<script>';
//     echo 'var cards = document.getElementsByClassName("product-card-' . $counter . '");'; // Use a unique class for each card
//     echo 'for (var i = 0; i < cards.length; i++) {';
//     echo '    cards[i].getElementsByClassName("heading")[0].innerText = "' . $row['comp_name'] . '";';
//     echo '    cards[i].getElementsByClassName("link")[0].innerText = "' . $row['Website'] . '";';
//     echo '    cards[i].getElementsByClassName("link")[0].href = "' . $row['Website'] . '";';
//     echo '    cards[i].getElementsByClassName("p-location")[0].innerText = "' . $row['Country'] . '";';
//     echo '    cards[i].getElementsByClassName("supplier_type")[0].innerText = "Supplier type: ' . $row['Supplier_type'] . '";';
//     echo '    cards[i].getElementsByClassName("volume")[0].innerText = "Production Volume Capability: ' . $row['PV_capacity'] . '";';
//     echo '    cards[i].getElementsByClassName("comp_image")[0].src = "uploads/' . $row['image_url'] . '";';
//     echo '}';
//     echo '</script>';
// }
?>

<div style="width: 1550px;">
    <?php
include 'footer.php';
?>
    </div>
</body>
        


</html>

