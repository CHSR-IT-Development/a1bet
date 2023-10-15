<?php

$partner = "ptn777";
$key = "4EE1E150-FB37-44E8-B788-4015F2845298";


function createSign($timeStamp, $info, $key)
{
    $word = strtolower($info) . $timeStamp . strtolower($key);
    $hash = hash('sha256', $word);

    return $hash;
}

function register_api($userName, $email, $password, $mobile)
{
    global $partner, $key;
    $url = 'http://pauthapi.data333.com/api/partner/register';
    $time = time();
    $sign = createSign($time, $partner, $key);

    $postData = json_encode([
        "Partner" => "ptn777",
        "Sign" => $sign,
        "TimeStamp" => $time,
        "UserName" => $userName,
        "Password" => $password,
        "Fullname" => "Test Name", // Change as per your requirement
        "Email" => $email,
        "Mobile" => '13479734035',
        "Gender" => 1, // Change as per your requirement
        "DoB" => "1983-03-03", // Change as per your requirement
        "Currency" => "MYR", // Change as per your requirement
        "BankName" => "Maybank Berhad", // Change as per your requirement
        "BankAccountNo" => "11201123352" // Change as per your requirement
    ]);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

    $response = curl_exec($ch);

    if (!$response) {
        return [
            'status' => 'error',
            'message' => curl_error($ch)
        ];
    }

    curl_close($ch);

    $decodedResponse = json_decode($response, true);
    return $decodedResponse;
}
