<?php
    $img = $_POST["QRCode"];
    $qrcodetext = $_POST["QRCodeText"];
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $fileData = base64_decode($img);
    //saving
    $fileName = 'QRCodes/'. $qrcodetext .'.png';
    file_put_contents($fileName, $fileData);

    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $qrcodeDlLink = str_replace("qrrender.php","QRCodes/".$qrcodetext.".png",$actual_link);

    echo json_encode(array("result" => "true", "URL" => $qrcodeDlLink, "filename" =>  $qrcodetext.".png"));
