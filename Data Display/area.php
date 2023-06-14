<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "TIC2601";
$dbname = "mapfunction";
$dbname_p = "privateproperty";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn_p = new mysqli($servername, $username, $password, $dbname_p);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);

   session_start();
}

// Retrieve information for the specified area
$id = $_GET["id"];

switch($id){ 
			case (28):
			    $area = "('Seletar', 'Yio Chu Kang')";
				break;
			case (27):
			    $area = "('Admiralty Drive', 'Sembawang, 'Yishun')";
				break;
			case (26):
			    $area = "('Springleaf', 'Tagore', 'Upper Thomson')";
				break;
			case (25):
			    $area = "('Admiralty Road', 'Kranji', 'Woodgrove', 'Woodlands')";
				break;
			case (24):
			    $area = "('Lim Chu Kang', 'Sungei Gedong', 'Tengah')";
				break;
			case (23):
			    $area = "('Bukit Batok', 'Bukit Panjang', 'Choa Chu Kang', 'Dairy Farm', 'Hillview')";
				break;
			case (22):
			    $area = "('Boon Lay','Tuas','Jurong')";
				break;
			case (21):
			    $area = "('Clementi Park', 'Hume Avenue', 'Ulu Pandan', 'Upper Bukit Timah')";
				break;
			case (20):
			    $area = "('Ang Mo Kio','Bishan','Bradell','Thomson')";
				break;
			case (19):
				$area = "('Hougang','Punggol','Sengkang','Seranggon Garden')";
				break;
			case (18):
				$area = "('Paris Ris','Simei','Tampines')";
				break;
			case (17):
				$area = "('Changi','Flora','Loyang')";
				break;
			case (16):
				$area = "('Bayshore','Bedok','Chai Chee','Eastwood','Kew Drive', 'Upper East Coast')";
				break;
			case (15):
				$area = "('Amber Road','East Coast','Joo Chiat','Katong','Marine')";
				break;
			case (14):
				$area = "('Eunos','Geylang','Kembangan','Paya Lebar','Sims')";
				break;
			case (13):
				$area = "('Braddell,'Macpherson','Potong Pasir')";
				break;
			case (12):
				$area = "('Balestier','Toa Payoh')";
				break;
			case (11):
				$area = "('Chancery','Dunearn Road','Moulmein','Newton','Novena', 'Thomson', 'Watten Estate')";
				break;
			case (10):
				$area = "('Ardmore','Balmoral','Bukit Timah','Grange Road',' Holland Road', 'Orchard Boulevard', 'Tanglin')";
				break;
			case (9):
				$area = "('Cairnhill','Killiney','Orchard','River Valley')";
				break;
			case (8):
				$area = "('Farrer Park','Little India','Seranggon Road')";
				break;
			case (7):
				$area = "('Beach Road','Bencoolen Road','Bugis','Golden Mile', 'Middle Road', 'Rocher')";
				break;
			case (6):
				$area = "('Beach Road (part)', 'City Hall', 'High Street', 'North Bridge Road')";
				break;
			case (5):
				$area = "('Buona Vista', 'Clementi', 'Dover', 'Hong Leong Garden', 'Pasir Panjang', 'West Coast')";
				break;
			case (4):
				$area = "('Harbourfront', 'Keppel', 'Sentosa', 'Telok Blangah')";
				break;
			case (3):
				$area = "('Alexandra', 'Queenstown', 'Redhill', 'Tiong Bahru')";
				break;
			case (2):
				$area = "('Anson', 'Chinatown', 'Shenton Way', 'Tanjong Pagar')";
				break;
			case (1):
				$area = "('Boat Quay', 'Cecil', 'Havelock Road', 'Marina', 'People’s Park', 'Raffles Place', 'Suntec City')";
				break;
			
			}
if($id >0){
	   $sql = "SELECT flat_type, town, storey_range, floor_area_sqm, lease_commencement_date, resale_price FROM hdb_resale_data WHERE town in ".$area;
	   $result = mysqli_query($conn,$sql);
       $chart_data="";
       while ($row = mysqli_fetch_array($result)) { 
 
            $Town[]  = $row['town']  ;
            $Lease[] = $row['lease_commencement_date'];
			$Price[] = $row['resale_price'];
			$list = join(',', $Town);
		    //$string = join(',', $Lease);
		    //$infos = join(',', $Price);
        }
		//echo $list;
		//echo $string;
		//echo $infos;

	   $sql_private = "SELECT propertytype, street, floorange, area, contractdate, price FROM uraprpt WHERE district = " .$id;
	   $result_private = mysqli_query($conn_p,$sql_private);
       while ($row_private = mysqli_fetch_array($result_private)) { 
 
            $Town[]  = $row_private['street'];
            $Price[] = $row_private['price'];
			//$list_private = join(',', $street);
		    //$string_private = join(',', $Price);
        }
		//echo $list_private;
		//echo $string_private;
		//echo $infos;
?>

  
   <table border ="1" cellspacing="0" cellpadding="20">
  <tr>
    <th>Property Type</th>
    <th>Street</th>
	<th>Storey Range</th>
    <th>Floor Area</th>
    <th>Lease Commencement Date</th>
    <th>Price</th>
  </tr>

<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Graph</title> 
    </head>
    <body>
        <div style="width:80%;hieght:20%;text-align:center">
            <h2 class="page-header" >Resale Price for HDB</h2>
            <canvas  id="chartjs_bar"></canvas> 
        </div>    
    </body>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($Town); ?>,
                        datasets: [{
                            data:<?php echo json_encode($Price); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: false,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>
</html>


<?php	
		$rows = array();
		//print_r($query);
		//$resultarray = mysqli_query($conn,$sql);
		$resultarray=mysqli_prepare($conn,$sql);
		mysqli_stmt_execute($resultarray);		//execute the statement
		mysqli_stmt_bind_result($resultarray,$flattype,$street,$storey,$floor,$lease,$resaleprice);
		while(mysqli_stmt_fetch($resultarray))										//it fetch one by one, this one to load column name of database
		{ 
			echo "<td>" . $flattype . "</td>";
			echo "<td>" . $street . "</td>";
			echo "<td>" . $storey . "</td>";
			echo "<td>" . $floor . "</td>";
			echo "<td>" . $lease . "</td>";
			echo "<td>" . $resaleprice . "</td><tr>";
		}

		$rows_private = array();
		//print_r($query);
		//$resultarray = mysqli_query($conn,$sql);
		$resultarray_private=mysqli_prepare($conn_p,$sql_private);
		mysqli_stmt_execute($resultarray_private);			//execute the statement
		mysqli_stmt_bind_result($resultarray_private,$propertytype,$street,$floorange,$area,$contractdate,$price);
		while(mysqli_stmt_fetch($resultarray_private))										//it fetch one by one, this one to load column name of database
		{ 
			echo "<td>" . $propertytype . "</td>";
			echo "<td>" . $street . "</td>";		
			echo "<td>" . $floorange. "</td>";
			echo "<td>" . $area. "</td>";
			echo "<td>" . $contractdate . "</td>";
			echo "<td>" . $price . "</td><tr>";
		}	
}else {
         $error = "No data found";
         echo "<script type='text/javascript'>alert('$error');</script>";
      }
$result = $conn->query($sql);
$result_private = $conn->query($sql_private);

?>






