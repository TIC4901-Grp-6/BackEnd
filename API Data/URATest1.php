<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP API Teset</title>
</head>
<body>

    <!-- Obtain URA Token -->
    <?php
        require __DIR__ . '/URATokenGeneration.php';
        $token = getToken();
        $json_data = json_decode($token,true);
        $token = $json_data['Result'];
        echo "The token is: " .$token;
    ?>

    <!-- Obtain Data from URA API for Private Residential Property Transactions -->
    <?php
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 
        'https://www.ura.gov.sg/uraDataService/invokeUraDS?service=PMI_Resi_Transaction&batch=1');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'AccessKey: 6ed27763-906c-41a3-a25c-66db1be38626',
            'Token: '.$token
            // 'Token: G53wr194E+2772656G--A2--Dk1zx7PmhAzj2Z5HaK2w29-G6cec8e66a2-wx7mv7pd-Mb@-c4b2qhG3S70DBf2fHesM47X-2yD9'
        ]);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_MAXREDIRS,10);
        curl_setopt($ch, CURLOPT_TIMEOUT,0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        echo "<br/>The token is: " .$token. "<br/>";
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        // curl_exec($ch);
        $data = curl_exec($ch);
        var_dump(curl_getinfo($ch))  . '<br/>';
        echo '<br/><br/>';
        echo curl_errno($ch) . '<br/>';
        echo curl_error($ch) . '<br/>'; 

        curl_close($ch);
        var_dump($data);
        echo "<br/><br/>";
        $json_data = json_decode($data,true);
        // $selective = $json_data['Status'];
        if (empty($json_data)){
            echo "No Data Found";
        } else {
            echo $selective;
        }

    ?>
</body>
</html>