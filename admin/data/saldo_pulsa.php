<?php
$username   = "081268098300";
$apiKey   = "7855d7d807800075785";
$signature  = md5($username.$apiKey.'bl');

$json = '{
          "commands" : "balance",
          "username" : "081268098300",
          "sign"     : "'.$signature.'"
        }';

$url = "https://api.mobilepulsa.net/v1/legacy/index";

$ch  = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$data = curl_exec($ch);

// Mendecode anggota.json
$tampil = json_decode($data, true);

// Membaca data array menggunakan foreach
$saldo_pulsa = 0;

foreach ($tampil as $d) {
    $saldo_pulsa =  $d['balance'];
}

curl_close($ch);
?>