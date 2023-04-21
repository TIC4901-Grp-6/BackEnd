<!DOCTYPE html>
<html>
<head>
    <title>Search Resale Data</title>
</head>
<body>
    <h1>Search Resale Data</h1>
    <form method="GET" action="">
        <div style = "width: 100%;">
            <div style="width: 50%; float: left;">
                <label>Town:</label>
                <input type="text" name="town" value="<?php echo isset($_GET['town']) ? $_GET['town'] : ''; ?>"><br>
                <label>District:</label>
                <input type="text" name="district" value="<?php echo isset($_GET['district']) ? $_GET['district'] : ''; ?>"><br>
                <input type="submit" name="search1" value="Search">
            </div>
            <div style="margin-left: 50%;">
                <label>Town / District No:</label>
                <input type="text" name="district1" value="<?php echo isset($_GET['district1']) ? $_GET['district1'] : ''; ?>"><br>
                <input type="submit" name="search2" value="Search">
            </div>
        </div>
    </form>
    <?php
    // Establish a database connection
    $host = 'localhost';
    $username = 'root';
    $password = 'mysql';
    $dbname = 'properties';
    $conn = mysqli_connect($host, $username, $password, $dbname);

    // Check if a search query was submitted for section 1
    if (isset($_GET['search1'])) {
        $town = $_GET['town'];
        $district = $_GET['district'];
        $result = array();

        if (!empty($town) && empty($district)){
            $sql_resale = "SELECT * FROM hdb_resale_data WHERE town LIKE '%$town%'";
            echo "<tr><td>" . $sql_resale;

            // Execute the query and get the results
            $result_resale = mysqli_query($conn, $sql_resale);
            $num_results = mysqli_num_rows($result_resale);

            // Loop through the rows of the resale data query results and add each row to the combined results array
            while ($row_resale = mysqli_fetch_assoc($result_resale)) {
                $result[] = $row_resale;
            }
        }
        else if (!empty($district) && empty($town)){
             // Build the SQL query string for the matrix database
            $sql_matrix = "SELECT towns FROM image_areas WHERE district = $district";

            // Execute the query and get the results
            $result_towns = mysqli_query($conn, $sql_matrix);

            // Get the combined town names from the query results
            $row = mysqli_fetch_assoc($result_towns);
            $combined_towns = $row['towns'];

            // Split the combined town names into an array of separate town names
            $towns_array = explode(',', $combined_towns);

            // Trim any whitespace around each town name in the array
            $towns_array = array_map('trim', $towns_array);

            // Build the SQL query string for the resale data database using the array of towns
            $sql_resale = "SELECT * FROM hdb_resale_data WHERE town IN ('";
            $sql_resale .= implode("','", $towns_array);
            $sql_resale .= "')";
            echo "<tr><td>" . $sql_resale;

            // Execute the query and get the results
            $result_resale = mysqli_query($conn, $sql_resale);
            $num_results = mysqli_num_rows($result_resale);

            // Loop through the rows of the resale data query results and add each row to the combined results array
            while ($row_resale = mysqli_fetch_assoc($result_resale)) {
                $result[] = $row_resale;
            }
        }
        else if (!empty($town) && !empty($district)){
            $sql_resale = "SELECT * FROM hdb_resale_data WHERE town LIKE '%$town%'";
            echo "<tr><td>" . $sql_resale;

            $result_resale = mysqli_query($conn, $sql_resale);
            $num_results = mysqli_num_rows($result_resale);

            // Build the SQL query string for the matrix database
            $sql_matrix = "SELECT towns FROM image_areas WHERE district = $district";

            // Execute the query and get the results
            $result_towns = mysqli_query($conn, $sql_matrix);

            // Get the combined town names from the query results
            $row = mysqli_fetch_assoc($result_towns);
            $combined_towns = $row['towns'];

            // Split the combined town names into an array of separate town names
            $towns_array = explode(',', $combined_towns);

            // Trim any whitespace around each town name in the array
            $towns_array = array_map('trim', $towns_array);

            // Build the SQL query string for the resale data database using the array of towns
            $sql_resale1 = "SELECT * FROM hdb_resale_data WHERE town IN ('";
            $sql_resale1 .= implode("','", $towns_array);
            $sql_resale1 .= "')";
            echo "<tr><td>" . $sql_resale1;

            // Execute the query and get the results
            $result_resale1 = mysqli_query($conn, $sql_resale1);
            $num_results = mysqli_num_rows($result_resale1);

            // Loop through the town resale data query results and add each row to the combined results array
            while ($row_resale_town = mysqli_fetch_assoc($result_resale)) {
                $result[] = $row_resale_town;
            }

            // Loop through the district resale data query results and add each row to the combined results array
            while ($row_resale_district = mysqli_fetch_assoc($result_resale1)) {
                $result[] = $row_resale_district;
            }
        }

        // Display the results
        echo "<h2>Search Results Section 1</h2>";
        if ($result > 0) {
            //echo "<table><tr><th>Month</th><th>Town</th><th>Flat Type</th><th>Block</th><th>Street Name</th><th>Storey Range</th><th>Floor Area SQM</th>
            //<th>Lease Commencement Date</th><th>Resale Price</th></tr>";

            // Start the HTML table
            echo '<table>';

            // Add table headers
            echo '<tr>';
            echo '<th>Month</th>';
            echo '<th>Town</th>';
            echo '<th>Flat Type</th>';
            echo '<th>Block</th>';
            echo '<th>Street Name</th>';
            echo '<th>Storey Range</th>';
            echo '<th>Floor Area SQM</th>';
            echo '<th>Lease Commencement Date</th>';
            echo '<th>Resale Price</th>';
            echo '</tr>';

            foreach ($result as $row) {
                echo '<tr>';
                echo '<td>' . $row['month'] . '</td>';
                echo '<td>' . $row['town'] . '</td>';
                echo '<td>' . $row['flat_type'] . '</td>';
                echo '<td>' . $row['block'] . '</td>';
                echo '<td>' . $row['street_name'] . '</td>';
                echo '<td>' . $row['storey_range'] . '</td>';
                echo '<td>' . $row['floor_area_sqm'] . '</td>';
                echo '<td>' . $row['lease_commencement_date'] . '</td>';
                echo '<td>' . $row['resale_price'] . '</td>';
                echo '</tr>';
            }
            
            // End the HTML table
            echo '</table>';
        }
        else {
            echo "No results found.";
        }
        
    }
    // Check if a search query was submitted for section 2

    $host = 'localhost';
    $username = 'root';
    $password = 'mysql';
    $dbname1 = 'privateproperty';
    $conn = mysqli_connect($host, $username, $password, $dbname1);
    if (isset($_GET['search2'])) {
        $district1 = $_GET['district1'];
        //$flat_type = $_GET['flat_type'];
        //$storey_range = $_GET['storey_range'];

        // Build the SQL query
        $sql = "SELECT * FROM uraprpt WHERE district LIKE '%$district1%'";

        // Execute the query and get the results
        $result = mysqli_query($conn, $sql);
        $num_results = mysqli_num_rows($result);

        // Display the results
        echo "<h2>Search Results Section 2</h2>";
        if ($num_results > 0) {
            echo "<table><tr><th>District</th><th>Project</th><th>Market Segment</th><th>Street</th><th>Contract Date</th><th>Area</th><th>Price</th>
            <th>Property Type</th><th>Tenure</th><th>Floor Range</th><th>Type of Sale</th><th>No of Units</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row['district'] . "</td><td>" . $row['project'] . "</td><td>" . $row['marketSegment'] . "</td><td>" . $row['street']. 
                "</td><td>" . $row['contractdate'] . "</td><td>" . $row['area'] . "</td><td>" . $row['price'] . "</td><td>" . $row['propertytype'] . 
                "</td><td>" . $row['tenure']. "</td><td>" . $row['floorange'] . "</td><td>" . $row['typeofsale'] . "</td><td>" . $row['noOfUnits'];
            }
            echo "</table>";
        }
        else {
            echo "No results found.";
        }
    }
    ?>
</body>
