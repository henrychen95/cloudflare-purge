<?php
/*
* Cloudflare API online document: http://www.cloudflare.com/docs/client-api.html
*/
$serverUri = "https://www.cloudflare.com/api_json.htm";
$APIKey = "YOUR_API_KEY";
$email  = "YOUR_CLOUDFLARE_LOGIN_EMAIL";
$domain = "DOMAIN_YOU_WANT_TO_PURGE";

$data['a'] = 'fpurge_ts';
$data['tkn'] = $APIKey;
$data['email'] = $email;
$data['z'] = $domain;
$data['v'] = 1;

$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_URL, $serverUri);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, TRUE);

$result = curl_exec($ch);

if($result == false)
{
    echo "cURL error message: ".curl_error($ch);
    echo "<br />Send data<br /><pre>";
    print_r($data);
    echo "</pre>";
}
else
{
   echo "Purge data successful.";
}

curl_close($ch);