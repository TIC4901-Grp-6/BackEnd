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

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://www.ura.gov.sg/uraDataService/invokeUraDS?service=PMI_Resi_Transaction&batch=1',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTPHEADER => array(
            'AccessKey: 6ed27763-906c-41a3-a25c-66db1be38626',
            'Token: z67J3Nn2-37c4d7-sbYx84S5vwg36HD6dM56kc+7DD3pKVsawXAg3VS56fG2Z-w44mbW30c8UeN59mbf3e261mJ85-xb3FH6tnwF'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        var_dump($response);
    ?>
</body>
</html>