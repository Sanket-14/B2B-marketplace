<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include 'dbcon.php'; // Include your database connection file

// Check if the keys exist in the $_GET superglobal
if (isset($_GET['supplierTypes']) || isset($_GET['volume'])) {
    $volume = isset($_GET['volume']) ? $_GET['volume'] : array();
    $supplierTypes = isset($_GET['supplierTypes']) ? $_GET['supplierTypes'] : array();
    $searchterm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';


    // echo "Search Term: " . $searchterm;

    // Check if both arrays are empty
    if (empty($supplierTypes) && empty($volume) && empty($searchterm)) {
        echo "<p>Please select some filters</p>";
    } else {
        // Check if the variables are set and are arrays
        if ((is_array($supplierTypes) || !empty($supplierTypes)) || (is_array($volume) || !empty($volume))) {

            // Implode the arrays into strings
            $volumeString = implode("','", $volume);
            $supplierTypesString = implode("','", $supplierTypes);

            $sql = "SELECT * FROM voltbridge.Add_listing WHERE ";

            // Add condition for searchterm
            if (!empty($searchterm)) {
                $sql .= "categories LIKE '%$searchterm%' AND ";
            }
            
            // Add conditions for array1 and column1 if $supplierTypes is not empty
            if (!empty($supplierTypes)) {
                foreach ($supplierTypes as $string) {
                    $sql .= "FIND_IN_SET('$string', Supplier_type) > 0 AND ";
                }
            }
            
            // Add conditions for array2 and column2 if $volume is not empty
            if (!empty($volume)) {
                foreach ($volume as $string) {
                    $sql .= "FIND_IN_SET('$string', PV_capacity) > 0 AND ";
                }
            }

            // Remove the trailing " AND " from the query
            $sql = rtrim($sql, " AND ");

            $result = mysqli_query($conn, $sql);

            if ($result === false) {
                die("Error in SQL query: " . mysqli_error($conn));
            }

            // echo '<table border="1">
            // <tr>
                
            //     <th>Column2</th>
            //     <!-- Add more column headers as needed -->
            // </tr>';

            // while ($row = mysqli_fetch_assoc($result)) {
            //     echo '<tr>';
            //     echo '<td>' . $row['comp_name'] . '</td>';
            //     echo '<td>' . $row['Supplier_type'] . '</td>';
            //     // Add more cells as needed for other columns
            //     echo '</tr>';
            // }

            // echo '</table>';

            if (mysqli_num_rows($result) > 0) {
                $counter = 1;
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
                
            }else {
                echo "<p>No results found for the selected filters</p>";
            }
        } else {
            echo "<p>No results found for the selected filters</p>";
        }
    }
} else {
    echo "<p>Please select some filters</p>";
}
?>
    
</body>
</html>
