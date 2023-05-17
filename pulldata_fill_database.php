<?php
// Create a connection to your own database
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "properties";
$tablename = "hdb_resale_data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "delete from " .$tablename;
mysqli_query($conn, $sql);

// Retrieve the resale data from HDB
$url = 'https://storage.data.gov.sg/resale-flat-prices/resources/resale-flat-prices-based-on-registration-date-from-jan-2017-onwards-2023-04-18T00-46-46Z.csv';
$csv = file_get_contents($url);
$rows = explode("\n", $csv);

// Loop through each row of data and insert into your own database
$count = 0;
foreach($rows as $row) {
  $data = str_getcsv($row);

  // Use the relevant columns to insert into your own database
  $month = $data[0];

  if (strpos($month, '2023-04') !== false){
    $town = $data[1];
    $flat_type = $data[2];
    $block = $data[3];
    $street_name = $data[4];
    $storey_range = $data[5];
    $floor_area = $data[6];
    //$flat_model = $data[7];
    $lease_commence_date = $data[8];
    //$remaining_lease = $data[9];
    $resale_price = $data[10];

    $sql = "INSERT INTO " .$tablename. " (month, town, flat_type, block, street_name, storey_range, floor_area_sqm, lease_commencement_date, resale_price) 
            VALUES ('$month', '$town', '$flat_type', '$block','$street_name', '$storey_range', '$floor_area', '$lease_commence_date', '$resale_price')";

    if ($conn->query($sql) === TRUE) {
      echo "Record added successfully.";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $count++;

    if ($count >= 1000){
      break;
    }
  }
  
}

$conn->close();
?>
