<?php

$partner = "ptn777";
$key = "4EE1E150-FB37-44E8-B788-4015F2845298";

$vendors = [
    ["product" => 0, "vendorCode" => "IA", "gamecode" => "", "vendor" => "ia"],
    ["product" => 0, "vendorCode" => "Saba", "gamecode" => "", "vendor" => "saba"],
    ["product" => 0, "vendorCode" => "M8", "gamecode" => "", "vendor" => "m8"],
    ["product" => 0, "vendorCode" => "MaxBet", "gamecode" => "", "vendor" => "maxbet"],
    ["product" => 0, "vendorCode" => "MT", "gamecode" => "", "vendor" => "mt"],
    ["product" => 0, "vendorCode" => "SBO", "gamecode" => "", "vendor" => "sbo"],
    ["product" => 0, "vendorCode" => "SBOVS", "gamecode" => "", "vendor" => "sbovs"],
    ["product" => 0, "vendorCode" => "SSport", "gamecode" => "", "vendor" => "ssport"],
    ["product" => 0, "vendorCode" => "SSPORTLCS", "gamecode" => "", "vendor" => "ssportlcs"],
    ["product" => 1, "vendorCode" => "MIKI", "gamecode" => "", "vendor" => "miki"],
    ["product" => 1, "vendorCode" => "MGL", "gamecode" => "", "vendor" => "mgl"],
    ["product" => 1, "vendorCode" => "WON", "gamecode" => "", "vendor" => "won"],
    ["product" => 1, "vendorCode" => "LG88", "gamecode" => "", "vendor" => "lg88"],
    ["product" => 1, "vendorCode" => "RCB", "gamecode" => "", "vendor" => "rcb"],
    ["product" => 1, "vendorCode" => "CQ9LIVE", "gamecode" => "", "vendor" => "cq9live"],
    ["product" => 1, "vendorCode" => "YeeBet", "gamecode" => "", "vendor" => "yeebet"],
    ["product" => 1, "vendorCode" => "AB", "gamecode" => "", "vendor" => "ab"],
    ["product" => 1, "vendorCode" => "AG", "gamecode" => "", "vendor" => "ag"],
    ["product" => 1, "vendorCode" => "BG", "gamecode" => "", "vendor" => "bg"],
    ["product" => 1, "vendorCode" => "CF", "gamecode" => "", "vendor" => "cf"],
    ["product" => 1, "vendorCode" => "CT855", "gamecode" => "", "vendor" => "ct855"],
    ["product" => 1, "vendorCode" => "DG", "gamecode" => "", "vendor" => "dg"],
    ["product" => 1, "vendorCode" => "EVO", "gamecode" => "", "vendor" => "evo"],
    ["product" => 1, "vendorCode" => "EZUGI", "gamecode" => "", "vendor" => "ezugi"],
    ["product" => 1, "vendorCode" => "FGG", "gamecode" => "", "vendor" => "fgg"],
    ["product" => 1, "vendorCode" => "GD", "gamecode" => "", "vendor" => "gd"],
    ["product" => 1, "vendorCode" => "LS", "gamecode" => "id", "vendor" => "ls"],
    ["product" => 1, "vendorCode" => "PPL", "gamecode" => "_101", "vendor" => "ppl"],
    ["product" => 1, "vendorCode" => "SB", "gamecode" => "", "vendor" => "sb"],
    ["product" => 1, "vendorCode" => "WM", "gamecode" => "", "vendor" => "wm"],
    ["product" => 1, "vendorCode" => "XG", "gamecode" => "", "vendor" => "xg"],
    ["product" => 2, "vendorCode" => "SA", "gamecode" => "_xg006", "vendor" => "sa"],
    ["product" => 2, "vendorCode" => "NETENT", "gamecode" => "GameCode", "vendor" => "netent"],
    ["product" => 2, "vendorCode" => "NLC", "gamecode" => "GameCode", "vendor" => "nlc"],
    ["product" => 2, "vendorCode" => "M365", "gamecode" => "game_id", "vendor" => "m365"],
    ["product" => 2, "vendorCode" => "MEGAH5", "gamecode" => "", "vendor" => "megah5"],
    ["product" => 2, "vendorCode" => "Live22", "gamecode" => "gameid", "vendor" => "live22"],
    ["product" => 2, "vendorCode" => "PGS", "gamecode" => "gamecode", "vendor" => "pgs"],
    ["product" => 2, "vendorCode" => "AP", "gamecode" => "gamecode", "vendor" => "ap"],
    ["product" => 2, "vendorCode" => "SPADE", "gamecode" => "", "vendor" => "spade"],
    ["product" => 2, "vendorCode" => "OGE", "gamecode" => "gamecode", "vendor" => "oge"],
    ["product" => 2, "vendorCode" => "FUN", "gamecode" => "gamecode", "vendor" => "fun"],
    ["product" => 2, "vendorCode" => "Mario", "gamecode" => "GameId", "vendor" => "mario"],
    ["product" => 2, "vendorCode" => "JiliGames", "gamecode" => "", "vendor" => "jiligames"],
    ["product" => 2, "vendorCode" => "DraconGaming", "gamecode" => "gamecode*gametype", "vendor" => "dracongaming"],
    ["product" => 2, "vendorCode" => "RG", "gamecode" => "GameId", "vendor" => "rg"],
    ["product" => 2, "vendorCode" => "CQ9", "gamecode" => "gameCode", "vendor" => "cq9"],
    ["product" => 2, "vendorCode" => "IG", "gamecode" => "gamecode", "vendor" => "ig"],
    ["product" => 2, "vendorCode" => "DT", "gamecode" => "gameCode", "vendor" => "dt"],
    ["product" => 2, "vendorCode" => "DPT", "gamecode" => "", "vendor" => "dpt"],
    ["product" => 2, "vendorCode" => "MX", "gamecode" => "gameCode", "vendor" => "mx"],
    ["product" => 2, "vendorCode" => "BGE", "gamecode" => "", "vendor" => "bge"],
    ["product" => 2, "vendorCode" => "BS", "gamecode" => "Id", "vendor" => "bs"],
    ["product" => 2, "vendorCode" => "VT", "gamecode" => "gamename", "vendor" => "vt"],
    ["product" => 2, "vendorCode" => "PT", "gamecode" => "gameCode", "vendor" => "pt"],
    ["product" => 2, "vendorCode" => "GG", "gamecode" => "_10", "vendor" => "gg"],
    ["product" => 2, "vendorCode" => "ACE333", "gamecode" => "", "vendor" => "ace333"],
    ["product" => 2, "vendorCode" => "JOKER", "gamecode" => "GameCode", "vendor" => "joker"],
    ["product" => 2, "vendorCode" => "SAE", "gamecode" => "", "vendor" => "sae"],
    ["product" => 2, "vendorCode" => "PGSOFT", "gamecode" => "", "vendor" => "pgsoft"],
    ["product" => 2, "vendorCode" => "Habanero", "gamecode" => "KeyName", "vendor" => "habanero"],
    ["product" => 2, "vendorCode" => "Kiss918", "gamecode" => "", "vendor" => "kiss918"],
    ["product" => 2, "vendorCode" => "KM", "gamecode" => "", "vendor" => "km"],
    ["product" => 2, "vendorCode" => "BNG", "gamecode" => "gameId", "vendor" => "bng"],
    ["product" => 2, "vendorCode" => "YGG", "gamecode" => "GameId", "vendor" => "ygg"],
    ["product" => 2, "vendorCode" => "Genesis", "gamecode" => "gameCode", "vendor" => "genesis"],
    ["product" => 2, "vendorCode" => "PNG", "gamecode" => "gameCode", "vendor" => "png"],
    ["product" => 2, "vendorCode" => "JDB", "gamecode" => "", "vendor" => "jdb"],
    ["product" => 2, "vendorCode" => "MG", "gamecode" => "gameCode", "vendor" => "mg"],
    ["product" => 2, "vendorCode" => "HACKSAW", "gamecode" => "GameID", "vendor" => "hacksaw"],
    ["product" => 2, "vendorCode" => "GFG", "gamecode" => "GameCode", "vendor" => "gfg"],
    ["product" => 3, "vendorCode" => "ML", "gamecode" => "", "vendor" => "ml"],
    ["product" => 3, "vendorCode" => "C93", "gamecode" => "_Number", "vendor" => "c93"],
    ["product" => 3, "vendorCode" => "KN", "gamecode" => "", "vendor" => "kn"],
    ["product" => 3, "vendorCode" => "QQ", "gamecode" => "_Keno", "vendor" => "qq"],
    ["product" => 3, "vendorCode" => "VL", "gamecode" => "", "vendor" => "vl"],
    ["product" => 3, "vendorCode" => "V8", "gamecode" => "", "vendor" => "v8"],
    ["product" => 3, "vendorCode" => "LEG", "gamecode" => "", "vendor" => "leg"],
    ["product" => 3, "vendorCode" => "M8Poker", "gamecode" => "", "vendor" => "m8poker"]
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
