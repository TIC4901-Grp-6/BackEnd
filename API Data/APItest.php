<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP API Teset</title>
</head>
<body>
    <?php

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://data.gov.sg/api/action/datastore_search?resource_id=52e93430-01b7-4de0-80df-bc83d0afed40&limit=1");
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $data = curl_exec($ch);
        var_dump(curl_getinfo($ch))  . '<br/>';
        echo '<br/><br/>';
        echo curl_errno($ch) . '<br/>';
        echo curl_error($ch) . '<br/>'; 

        echo '<br/><br/>';
        curl_close($ch);
        var_dump($data);
        
        // $url = 'https://data.gov.sg/api/action/datastore_search?resource_id=52e93430-01b7-4de0-80df-bc83d0afed40&limit=5';
        // $curl = curl_init($url);

        // $response = curl_exec($curl);
        // echo $response;
        //  curl_close($curl);
        // echo $response . PHP_EOL;
    ?>
</body>
</html>