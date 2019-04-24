<?php
$apiKey = "BQCgRt4mIiK4IfGGJ2ZLOpwKXINh-XTy8VylqGsC35mdQZPfjTBbcs2Nk1QQRyeSuhpwLHgL86vVj5WA5mZmRmlB7xODcwzfl2T-9Hv-Ctl5-jGxrn_x0Wo9R7svRTo498GMmgDy-cMzZoZS__DpKtXDfDXPkc-ZC6uKAIkc8fExyhp53MTXO0TVQztzTUFxP5TEUwULwXKt7RzX6Kv40ip_91kSaVvjB7DSDDas3uPQ";

/*
curl    -X "GET" "https://api.spotify.com/v1/browse/featured-playlists" 
        -H "Accept: application/json" 
        -H "Content-Type: application/json" 
        -H "Authorization: Bearer $apiKey"
*/

//step1
$cSession = curl_init();

//step2
curl_setopt($cSession,CURLOPT_URL,"https://api.spotify.com/v1/browse/featured-playlists");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false);
curl_setopt($cSession,CURLOPT_HTTPHEADER, array(
    "Accept: application/json",
    "Content-Type: application/json",
    "Authorization: Bearer $apiKey"
));

//step3
$results = curl_exec($cSession);
$errno = curl_errno($cSession);

if ($errno) {
    var_dump($errno);
    curl_close($cSession);
    exit();
}

//step4
curl_close($cSession);

//step5
$musicData = json_decode($results);

print $musicData->message;

// print json_encode()

var_dump($musicData->playlists->items[0]);
// var_dump($musicData);

// header("Content-Type: application/json");

// echo $results;


?>