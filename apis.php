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
    $url = 'http://cauthapi.data333.com/api/credit-auth/register';
    $pn = $partner . $userName;
    $time = time();
    $sign = createSign($time, $pn, $key);

    $postData = json_encode([
        "Partner" => "ptn777",
        "Sign" => $sign,
        "TimeStamp" => $time,
        "UserName" => $userName,
        "Password" => $password,
        "Fullname" => "Test Name", // Change as per your requirement
        "Email" => $email,
        "Mobile" => $mobile,
        "Gender" => 1, // Change as per your requirement
        "DoB" => "1983-03-03", // Change as per your requirement
        "Currency" => "MYR", // Change as per your requirement
        "IP" => $_SERVER['REMOTE_ADDR'],
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

function xregister_api($userName, $email, $password, $mobile)
{
    global $partner, $key;
    $url = 'http://cauthapi.data333.com/api/credit-auth/xregister';
    $pn = $partner . $userName;
    $time = time();
    $sign = createSign($time, $pn, $key);

    $postData = json_encode([
        "Agentname" => "ptn777",
        "Sign" => $sign,
        "TimeStamp" => $time,
        "UserName" => $userName,
        "Password" => $password,
        "Fullname" => "Test Name", // Change as per your requirement
        "Email" => $email,
        "Mobile" => $mobile,
        "Gender" => 1, // Change as per your requirement
        "DoB" => "1983-03-03", // Change as per your requirement
        "Currency" => "MYR", // Change as per your requirement
        "IP" => $_SERVER['REMOTE_ADDR'],
        "CommFollowUpline" => 0,
        "PTFollowUpline" => 1    
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

function login_api($userName, $userPassword)
{
    global $partner, $key;
    $url = 'http://cauthapi.data333.com/api/credit-auth/login';
    $pn = $partner . $userName . $userPassword;
    $time = time();
    $sign = createSign($time, $pn, $key);

    $postData = json_encode([
        "Partner" => $partner,
        "Sign" => $sign,
        "TimeStamp" => $time,
        "UserName" => $userName,
        "IP" => $_SERVER['REMOTE_ADDR'],
        "IsMobile" => false,
        "Lang" => "en-us",
        "Domain" => "http://eee.com" 
    ]);   

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

    $response = curl_exec($ch);
    if (!$response) {
        return [
            'Error' => -1,
            'Status' => 'error',
            'Message' => curl_error($ch)
        ];
    }

    curl_close($ch);
    
    $decodedResponse = json_decode($response, true);
    return $decodedResponse;
}

function logout_api($userName, $token)
{
    global $partner, $key;
    $url = 'http://cauthapi.data333.com/api/credit-auth/logout';
    $pn = $partner . $token;
    $time = time();
    $sign = createSign($time, $pn, $key);

    $postData = json_encode([
        "Partner" => $partner,
        "Sign" => $sign,
        "TimeStamp" => $time,
        "Token" => $token
    ]);   

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

    $response = curl_exec($ch);
    if (!$response) {
        return [
            'Error' => -1,
            'Status' => 'error',
            'Message' => curl_error($ch)
        ];
    }

    curl_close($ch);
    
    $decodedResponse = json_decode($response, true);
    return $decodedResponse;
}

function opengame_api($vendor, $browser, $gamecode, $bearer)
{
    $url = 'http://opengameapi.data333.com/api/play/login';
    $postData = json_encode([
        "Vendor" => $vendor,
        "Browser" => $browser,
        "GameCode" => $gamecode,
        "Lang" => "en-us"        
    ]);   

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $bearer,
        'Referer: http://185.174.100.211/games.php']);

    $response = curl_exec($ch);
    if (!$response) {
        return [
            'Error' => -1,
            'message' => curl_error($ch)
        ];
    }

    curl_close($ch);

    $decodedResponse = json_decode($response, true);
    return $decodedResponse;
}

function getbalance_api($userName)
{
    global $partner, $key;
    $url = 'http://ctransferapi.data333.com/api/credit-transfer/balance';
    $pn = $partner . $userName;
    $time = time();
    $sign = createSign($time, $pn, $key);

    $postData = json_encode([
        "AgentName" => $partner,
        "Sign" => $sign,
        "TimeStamp" => $time,
        "PlayerName" => $userName
    ]);   

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

    $response = curl_exec($ch);
    if (!$response) {        
        return [
            'Error' => -1000,            
            'Message' => curl_error($ch)
        ];
    }

    curl_close($ch);

    $decodedResponse = json_decode($response, true);
    return $decodedResponse;
}

function getplayersummary_api($statementData, $pageSize, $pageIndex)
{
    global $partner, $key;
    $url = 'http://pwlapi.data333.com/api/winlose/playersummary';
    $time = time();
    $sign = createSign($time, $partner, $key);

    $postData = json_encode([
        "Partner" => "ptn777",
        "Sign" => $sign,
        "TimeStamp" => $time,
        "StatementDate" => $statementData,
        "PageSize" => $pageSize,
        "PageIndex" => $pageIndex
    ]);    

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

    $response = curl_exec($ch);
    if (!$response) {        
        return [
            'Error' => -1000,
            'Message' => curl_error($ch)
        ];
    }

    curl_close($ch);

    $decodedResponse = json_decode($response, true);
    return $decodedResponse;
}

function winlosefullreport_api($playerName, $products, $currency, $begin, $end, $pageSize, $pageIndex)
{
    global $partner, $key;
    $url = 'http://pwlapi.data333.com/api/winlose/full';
    $time = time();
    $sign = createSign($time, $partner, $key);

    $postData = json_encode([
        "AgentName" => "ptn777",
        "MemberName" => "",
        "Sign" => $sign,
        "TimeStamp" => $time,
        "PlayerName" => $playerName,
        "Products" => $products,
        "Currency" => $currency,
        "AgentCurrency" => true,
        "StartDate" => $begin,
        "EndDate" => $end,
        "PageSize" => $pageSize,
        "PageIndex" => $pageIndex
    ]);    

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

    $response = curl_exec($ch);
    if (!$response) {        
        return [
            'Error' => -1000,
            'Message' => curl_error($ch)
        ];
    }

    curl_close($ch);

    $decodedResponse = json_decode($response, true);
    return $decodedResponse;
}