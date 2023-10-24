<?php

$partner = "ptn777";
$key = "4EE1E150-FB37-44E8-B788-4015F2845298";

$vendors = [
    ["product" => 1, "vendorCode" => "IA", "gamecode" => "", "vendor" => "ia"],
    ["product" => 1, "vendorCode" => "Saba", "gamecode" => "", "vendor" => "saba"],
    ["product" => 1, "vendorCode" => "M8", "gamecode" => "", "vendor" => "m8"],
    ["product" => 1, "vendorCode" => "MaxBet", "gamecode" => "", "vendor" => "maxbet"],
    ["product" => 1, "vendorCode" => "MT", "gamecode" => "", "vendor" => "mt"],
    ["product" => 1, "vendorCode" => "SBO", "gamecode" => "", "vendor" => "sbo"],
    ["product" => 1, "vendorCode" => "SBOVS", "gamecode" => "", "vendor" => "sbovs"],
    ["product" => 1, "vendorCode" => "SSport", "gamecode" => "", "vendor" => "ssport"],
    ["product" => 1, "vendorCode" => "SSPORTLCS", "gamecode" => "", "vendor" => "ssportlcs"],
    ["product" => 2, "vendorCode" => "MIKI", "gamecode" => "", "vendor" => "miki"],
    ["product" => 2, "vendorCode" => "MGL", "gamecode" => "", "vendor" => "mgl"],
    ["product" => 2, "vendorCode" => "WON", "gamecode" => "", "vendor" => "won"],
    ["product" => 2, "vendorCode" => "LG88", "gamecode" => "", "vendor" => "lg88"],
    ["product" => 2, "vendorCode" => "RCB", "gamecode" => "", "vendor" => "rcb"],
    ["product" => 2, "vendorCode" => "CQ9LIVE", "gamecode" => "", "vendor" => "cq9live"],
    ["product" => 2, "vendorCode" => "YeeBet", "gamecode" => "", "vendor" => "yeebet"],
    ["product" => 2, "vendorCode" => "AB", "gamecode" => "", "vendor" => "ab"],
    ["product" => 2, "vendorCode" => "AG", "gamecode" => "", "vendor" => "ag"],
    ["product" => 2, "vendorCode" => "BG", "gamecode" => "", "vendor" => "bg"],
    ["product" => 2, "vendorCode" => "CF", "gamecode" => "", "vendor" => "cf"],
    ["product" => 2, "vendorCode" => "CT855", "gamecode" => "", "vendor" => "ct855"],
    ["product" => 2, "vendorCode" => "DG", "gamecode" => "", "vendor" => "dg"],
    ["product" => 2, "vendorCode" => "EVO", "gamecode" => "", "vendor" => "evo"],
    ["product" => 2, "vendorCode" => "EZUGI", "gamecode" => "", "vendor" => "ezugi"],
    ["product" => 2, "vendorCode" => "FGG", "gamecode" => "", "vendor" => "fgg"],
    ["product" => 2, "vendorCode" => "GD", "gamecode" => "", "vendor" => "gd"],
    ["product" => 2, "vendorCode" => "LS", "gamecode" => "id", "vendor" => "ls"],
    ["product" => 2, "vendorCode" => "PPL", "gamecode" => "_101", "vendor" => "ppl"],
    ["product" => 2, "vendorCode" => "SB", "gamecode" => "", "vendor" => "sb"],
    ["product" => 2, "vendorCode" => "WM", "gamecode" => "", "vendor" => "wm"],
    ["product" => 2, "vendorCode" => "XG", "gamecode" => "", "vendor" => "xg"],   
    ["product" => 3, "vendorCode" => "ML", "gamecode" => "", "vendor" => "ml"],
    ["product" => 3, "vendorCode" => "C93", "gamecode" => "_Number", "vendor" => "c93"],
    ["product" => 3, "vendorCode" => "KN", "gamecode" => "", "vendor" => "kn"],
    ["product" => 3, "vendorCode" => "QQ", "gamecode" => "_Keno", "vendor" => "qq"],
    ["product" => 3, "vendorCode" => "VL", "gamecode" => "", "vendor" => "vl"],
    ["product" => 3, "vendorCode" => "V8", "gamecode" => "", "vendor" => "v8"],
    ["product" => 3, "vendorCode" => "LEG", "gamecode" => "", "vendor" => "leg"],
    ["product" => 3, "vendorCode" => "M8Poker", "gamecode" => "", "vendor" => "m8poker"],
    ["product" => 4, "vendorCode" => "SA", "gamecode" => "_xg006", "vendor" => "sa"],
    ["product" => 4, "vendorCode" => "NETENT", "gamecode" => "GameCode", "vendor" => "netent"],
    ["product" => 4, "vendorCode" => "NLC", "gamecode" => "GameCode", "vendor" => "nlc"],
    ["product" => 4, "vendorCode" => "M365", "gamecode" => "game_id", "vendor" => "m365"],
    ["product" => 4, "vendorCode" => "MEGAH5", "gamecode" => "", "vendor" => "megah5"],
    ["product" => 4, "vendorCode" => "Live22", "gamecode" => "gameid", "vendor" => "live22"],
    ["product" => 4, "vendorCode" => "PGS", "gamecode" => "gamecode", "vendor" => "pgs"],
    ["product" => 4, "vendorCode" => "AP", "gamecode" => "gamecode", "vendor" => "ap"],
    ["product" => 4, "vendorCode" => "SPADE", "gamecode" => "", "vendor" => "spade"],
    ["product" => 4, "vendorCode" => "OGE", "gamecode" => "gamecode", "vendor" => "oge"],
    ["product" => 4, "vendorCode" => "FUN", "gamecode" => "gamecode", "vendor" => "fun"],
    ["product" => 4, "vendorCode" => "Mario", "gamecode" => "GameId", "vendor" => "mario"],
    ["product" => 4, "vendorCode" => "JiliGames", "gamecode" => "", "vendor" => "jiligames"],
    ["product" => 4, "vendorCode" => "DraconGaming", "gamecode" => "gamecode*gametype", "vendor" => "dracongaming"],
    ["product" => 4, "vendorCode" => "RG", "gamecode" => "GameId", "vendor" => "rg"],
    ["product" => 4, "vendorCode" => "CQ9", "gamecode" => "gameCode", "vendor" => "cq9"],
    ["product" => 4, "vendorCode" => "IG", "gamecode" => "gamecode", "vendor" => "ig"],
    ["product" => 4, "vendorCode" => "DT", "gamecode" => "gameCode", "vendor" => "dt"],
    ["product" => 4, "vendorCode" => "DPT", "gamecode" => "", "vendor" => "dpt"],
    ["product" => 4, "vendorCode" => "MX", "gamecode" => "gameCode", "vendor" => "mx"],
    ["product" => 4, "vendorCode" => "BGE", "gamecode" => "", "vendor" => "bge"],
    ["product" => 4, "vendorCode" => "BS", "gamecode" => "Id", "vendor" => "bs"],
    ["product" => 4, "vendorCode" => "VT", "gamecode" => "gamename", "vendor" => "vt"],
    ["product" => 4, "vendorCode" => "PT", "gamecode" => "gameCode", "vendor" => "pt"],
    ["product" => 4, "vendorCode" => "GG", "gamecode" => "_10", "vendor" => "gg"],
    ["product" => 4, "vendorCode" => "ACE333", "gamecode" => "", "vendor" => "ace333"],
    ["product" => 4, "vendorCode" => "JOKER", "gamecode" => "GameCode", "vendor" => "joker"],
    ["product" => 4, "vendorCode" => "SAE", "gamecode" => "", "vendor" => "sae"],
    ["product" => 4, "vendorCode" => "PGSOFT", "gamecode" => "", "vendor" => "pgsoft"],
    ["product" => 4, "vendorCode" => "Habanero", "gamecode" => "KeyName", "vendor" => "habanero"],
    ["product" => 4, "vendorCode" => "Kiss918", "gamecode" => "", "vendor" => "kiss918"],
    ["product" => 4, "vendorCode" => "KM", "gamecode" => "", "vendor" => "km"],
    ["product" => 4, "vendorCode" => "BNG", "gamecode" => "gameId", "vendor" => "bng"],
    ["product" => 4, "vendorCode" => "YGG", "gamecode" => "GameId", "vendor" => "ygg"],
    ["product" => 4, "vendorCode" => "Genesis", "gamecode" => "gameCode", "vendor" => "genesis"],
    ["product" => 4, "vendorCode" => "PNG", "gamecode" => "gameCode", "vendor" => "png"],
    ["product" => 4, "vendorCode" => "JDB", "gamecode" => "", "vendor" => "jdb"],
    ["product" => 4, "vendorCode" => "MG", "gamecode" => "gameCode", "vendor" => "mg"],
    ["product" => 4, "vendorCode" => "HACKSAW", "gamecode" => "DCGameID", "vendor" => "hacksaw"],
    ["product" => 4, "vendorCode" => "GFG", "gamecode" => "gameId", "vendor" => "gfg"],
    ["product" => 4, "vendorCode" => "PS", "gamecode" => "", "vendor" => "ps"]
];

function getVendorsFromProduct($product)
{
    global $vendors;
    $filteredVendors = array_filter($vendors, function ($vendor) use ($product) {
        return $vendor['product'] === $product;
    });

    return array_values($filteredVendors);
}

function getVendorsFromVendorCode($vendorCode)
{
    global $vendors;
    $filteredVendors = array_filter($vendors, function ($vendor) use ($vendorCode) {
        return $vendor['vendor'] === $vendorCode;
    });

    return array_values($filteredVendors);
}

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
        "vendorId" => 1, "vendor" => $vendor,
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
        'Referer: http://185.174.100.211/games.php'
    ]);

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

function getgamelist_api($vendor, $bearer)
{
    $url = 'http://gamelistapi.data333.com/api/gamelist/find?vendor=' . $vendor;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $bearer
    ]);

    $response = curl_exec($ch);
    if (!$response) {
        return [
            'Error' => -1,
            'Message' => curl_error($ch)
        ];
    }

    curl_close($ch);

    $decodedResponse = json_decode($response, true);
    if ($decodedResponse === null) {
        return [
            'Error' => -1,
            'Message' => 'Failed to decode JSON response'
        ];
    }
    return $decodedResponse;
}
