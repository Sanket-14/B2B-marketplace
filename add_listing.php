<?php 
require('dbcon.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voltbridge - Add Listing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            /* background-color: blue; */
            margin: 0;
            display: flex;
            flex-direction: column;
            
            height: 100vh;
            /* background-image: url("B2B_bg.jpg"); */
            background-color:whitesmoke;
            /* background-colo */
            background-size: cover;
            color: #333;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            /* align-items: ; */
            padding: 10px;
            background-color: limegreen;
            color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
            margin-right: auto;
        }

        .navbar-links a  {
            margin-right: 20px;
    text-decoration: none;
    color: #fff;
    padding: 8px 15px;
    border-radius: 5px;
    background-color: #141E12; /* Background color for the links */
        }

        .navbar-links a:hover  {
            background-color: #fff; /* Change background color to white on hover */
    color: #000; /* Change text color to black on hover */
    text-decoration: none;
    box-shadow: 0 0 10px rgba(0, 128, 0, 0.5);
        }
        

        .add-listing-form {
            

            width: 100%;
            height: 80%;
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            margin: 0 auto; /* Centering the form horizontally */
            margin-top: 50px;
        }

        .add-listing-form label {
            width: 48%;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }

        .add-listing-form input[type="text"],
        .add-listing-form input[type="file"],
        .add-listing-form textarea {
            width: 48%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #f9f9f9;
        }

        .add-listing-form input[type="submit"] {
            width: 100%;
            padding: 12px 20px;
            /* background-color: #007bff; */
            /* color: #fff; */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-transform: uppercase;
            background-color: black; /* Change background color to white on hover */
    color: white; /* Change text color to black on hover */
    text-decoration: none;
    box-shadow: 0 0 10px rgba(50, 205, 50,1);
            
        }
        /* .add-listing-form input[type="submit"]:hover { */
            /* background-color: #fff; Change background color to white on hover */
    /* color: #000; Change text color to black on hover */
    /* text-decoration: none; */
    /* box-shadow: 0 0 10px rgba(0, 128, 0, 0.5);s */
        /* } */
    </style>
</head>
<body>
    <div class="navbar">
        <a class="navbar-brand" href="#">VoltBridge</a>
        <div class="navbar-links">
            <a href="index.php">Home</a>
        </div>
    </div>

    <!-- FORM -->
    
    <div class="add-listing-form">
        <form action="add_listing.php" method="POST" enctype="multipart/form-data">
            <label for="companyName">Name of the company:</label>
            <input type="text" id="companyName" name="companyName" required>

            <label for="region">Region:</label>
            <input type="text" id="region" name="region">

            <label for="country">Country:</label>
            <input type="text" id="country" name="country">

            <label for="city">City:</label>
            <input type="text" id="city" name="city">

            <label for="website">Website:</label>
            <input type="text" id="website" name="website">

            <label for="Supplier">Supplier type:</label>
            <input type="text" id="Supplier" name="Supplier">

            <label for="Business_Category">Business Category:</label>
            <input type="text" id="Business_Category" name="Business_Category">

            <label for="Production_Volume">Production Volume: </label>
            <input type="text" id="Production_Volume" name="Production_Volume">

            <label for="logo">Company Logo:</label>
            <input type="file" id="logo" name="logo" accept="image/*">
            
            <input class="submit-btn" style="" type="submit" value="Submit">
        </form>
    </div>

    <!-- PHP AND SQL -->

<?php
// Replace with your actual database credentials


// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $comp_name = $_POST['companyName'];
    $region = $_POST['region'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $website = $_POST['website'];
    $supplier_type = $_POST['Supplier'];
    $categories = $_POST['Business_Category'];
    $P_volume = $_POST['Production_Volume'];

    // Handling the image upload (if file exists)
    if (isset($_FILES['logo'])) {
        $img_name = $_FILES['logo']['name'];
	    $img_size = $_FILES['logo']['size'];
	    $tmp_name = $_FILES['logo']['tmp_name'];
	    $error = $_FILES['logo']['error'];

        if ($error === 0) {
            if ($img_size > 125000) {
                $em = "Sorry, your file is too large.";
                header("Location: add_listing.php?error=$em");
            }else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
    
                $allowed_exs = array("jpg", "jpeg", "png"); 
    
                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = 'uploads/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
    
                    // Insert into Database
                    // $sql = "INSERT INTO images(image_url) 
                    //         VALUES('$new_img_name')";
                    // mysqli_query($conn, $sql);
                    // header("Location: view.php");
                    $logo=$new_img_name;
                }else {
                    $em = "You can't upload files of this type";
                    header("Location: add_listing.php?error=$em");
                }
            }
        }else {
            $em = "unknown error occurred!";
            header("Location: add_listing.php?error=$em");
        }

    } else {
        $logo = NULL;
    }

    // SQL query to insert into the Add_listing table
    $sql = "INSERT INTO voltbridge.Add_listing (comp_name, Region, Country, City, Website, Supplier_type, Categories, PV_capacity, image_url)
    VALUES ('$comp_name', '$region', '$country', '$city', '$website', '$supplier_type', '$categories', '$P_volume', '$logo')";

    // Executing the query
    if ($conn->query($sql) === TRUE) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Closing the connection

?>

   

</body>

</html>
