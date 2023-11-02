<?php
include 'db.php';
include 'handlers/dbHandler.php';

$partner = "ptn777";
$key = "4EE1E150-FB37-44E8-B788-4015F2845298";
$default_referralRates = [0.3, 0.2];

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

$referral_rates = [
    ["vendor" => "ia", "rate" => [0.3, 0.2]],
    ["vendor" => "saba", "rate" => [0.3, 0.2]],
    ["vendor" => "m8", "rate" => [0.3, 0.2]],
    ["vendor" => "maxbet", "rate" => [0.3, 0.2]],
    ["vendor" => "mt", "rate" => [0.3, 0.2]],
    ["vendor" => "sbo", "rate" => [0.3, 0.2]],
    ["vendor" => "sbovs", "rate" => [0.3, 0.2]],
    ["vendor" => "ssport", "rate" => [0.3, 0.2]],
    ["vendor" => "ssportlcs", "rate" => [0.3, 0.2]],

    ["vendor" => "ab", "rate" => [0.1, 0.1]],
    ["vendor" => "ag", "rate" => [0.1, 0.1]],
    ["vendor" => "bg", "rate" => [0.1, 0.1]],
    ["vendor" => "dg", "rate" => [0.1, 0.1]],
    ["vendor" => "ezugi", "rate" => [0.1, 0.1]],
    ["vendor" => "fgg", "rate" => [0.1, 0.1]],
    ["vendor" => "gd", "rate" => [0.1, 0.1]],
    ["vendor" => "ct855", "rate" => [0.1, 0.1]],
    ["vendor" => "ls", "rate" => [0.1, 0.1]],
    ["vendor" => "ppl", "rate" => [0.1, 0.1]],
    ["vendor" => "sa", "rate" => [0.1, 0.1]],
    ["vendor" => "sb", "rate" => [0.1, 0.1]],
    ["vendor" => "wm", "rate" => [0.1, 0.1]],
    ["vendor" => "evo", "rate" => [0.1, 0.1]],

    ["vendor" => "sa", "rate" => [0.3, 0.2]],
    ["vendor" => "netent", "rate" => [0.3, 0.2]],
    ["vendor" => "nlc", "rate" => [0.3, 0.2]],
    ["vendor" => "m365", "rate" => [0.3, 0.2]],
    ["vendor" => "live22", "rate" => [0.3, 0.2]],
    ["vendor" => "pgs", "rate" => [0.3, 0.2]],
    ["vendor" => "ap", "rate" => [0.3, 0.2]],
    ["vendor" => "spade", "rate" => [0.3, 0.2]],
    ["vendor" => "oge", "rate" => [0.3, 0.2]],
    ["vendor" => "fun", "rate" => [0.3, 0.2]],
    ["vendor" => "mario", "rate" => [0.3, 0.2]],
    ["vendor" => "jiligames", "rate" => [0.3, 0.2]],
    ["vendor" => "dracongaming", "rate" => [0.3, 0.2]],
    ["vendor" => "rg", "rate" => [0.3, 0.2]],
    ["vendor" => "cq9", "rate" => [0.3, 0.2]],
    ["vendor" => "ig", "rate" => [0.3, 0.2]],
    ["vendor" => "dt", "rate" => [0.3, 0.2]],
    ["vendor" => "mx", "rate" => [0.3, 0.2]],
    ["vendor" => "bge", "rate" => [0.3, 0.2]],
    ["vendor" => "bs", "rate" => [0.3, 0.2]],
    ["vendor" => "vt", "rate" => [0.3, 0.2]],
    ["vendor" => "pt", "rate" => [0.3, 0.2]],
    ["vendor" => "gg", "rate" => [0.3, 0.2]],
    ["vendor" => "ace333", "rate" => [0.3, 0.2]],
    ["vendor" => "joker", "rate" => [0.3, 0.2]],
    ["vendor" => "sae", "rate" => [0.3, 0.2]],
    ["vendor" => "pgsoft", "rate" => [0.3, 0.2]],
    ["vendor" => "habanero", "rate" => [0.3, 0.2]],
    ["vendor" => "km", "rate" => [0.3, 0.2]],
    ["vendor" => "bng", "rate" => [0.3, 0.2]],
    ["vendor" => "ygg", "rate" => [0.3, 0.2]],
    ["vendor" => "genesis", "rate" => [0.3, 0.2]],
    ["vendor" => "png", "rate" => [0.3, 0.2]],
    ["vendor" => "jdb", "rate" => [0.3, 0.2]],
    ["vendor" => "mg", "rate" => [0.3, 0.2]],
    ["vendor" => "hacksaw", "rate" => [0.3, 0.2]],
    ["vendor" => "gfg", "rate" => [0.3, 0.2]],
    ["vendor" => "ps", "rate" => [0.3, 0.2]],
    ["vendor" => "dpt", "rate" => [0.1, 0.1]],
    ["vendor" => "megah5", "rate" => [0.1, 0.1]],
    ["vendor" => "kiss918", "rate" => [0.1, 0.1]],

    ["vendor" => "kn", "rate" => [0.1, 0.1]],
    ["vendor" => "ml", "rate" => [0.1, 0.1]],
    ["vendor" => "c93", "rate" => [0.1, 0.1]],
    ["vendor" => "qq", "rate" => [0.1, 0.1]],
    ["vendor" => "vl", "rate" => [0.1, 0.1]],
    ["vendor" => "v8", "rate" => [0.1, 0.1]],
    ["vendor" => "leg", "rate" => [0.1, 0.1]],
    ["vendor" => "m8poker", "rate" => [0.1, 0.1]]
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

function logout_api($token)
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

function opengame_api($vendor, $browser, $gamecode, $bearer, $mobile)
{
    $url = 'http://opengameapi.data333.com/api/play/login';
    $postData = json_encode([
        "Vendor" => $vendor,
        "Browser" => $browser,
        "GameCode" => $gamecode,
        "Lang" => "en-us",
        "Device" => $mobile ? 'mobile' : ''
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
            'Message' => curl_error($ch)
        ];
    }

    curl_close($ch);

    $decodedResponse = json_decode($response, true);
    return [
        'Error' => 0,
        'Endpoint' => $url,
        'Request' => json_decode($postData, true),
        'Response' => $decodedResponse
    ];
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

function getplayerturnovernew_api($playerName, $products, $begin, $end)
{
    global $partner, $key;
    $url = 'http://ctransferapi.data333.com/api/credit-transfer/xturnover';
    $time = time();
    $pn = $partner . $playerName;
    $sign = createSign($time, $pn, $key);

    $postData = json_encode([
        "AgentName" => "ptn777",
        "Sign" => $sign,
        "TimeStamp" => $time,
        "PlayerName" => $playerName,
        "Products" => $products,
        "From" => $begin,
        "To" => $end
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

function getReferralTurnOver($beginDate, $endDate, $referees)
{
    global $default_referralRates;
    $turnover = [0, 0];
    $commission = [0, 0];    

    $fullreport_summary = winlosefullreport_api("", [1, 2, 3, 4, 6, 7], "", $beginDate, $endDate, 50, 0);
    if (isset($fullreport_summary['Success']) && $fullreport_summary['Success'] == true) {
        $records = $fullreport_summary['Result']['Records'];
        foreach ($referees as $referee) {
            foreach ($records as $record) {
                if ($referee[2] < 3 && $record['UserName'] == $referee[1]) {
                    $level = $referee[2] - 1;
                    if (isset($record['TurnOver'])) {
                        $turnover[$level] += $record['TurnOver'];
                        $commission[$level] += $record['TurnOver'] * $default_referralRates[$level];
                    }
                    break;
                }
            }
        }
    }
    return ['turnover' => $turnover, 'commission' => $commission];
}

function getRefereesWithComission($statementDate, $referees, $type, $search)
{
    global $referral_rates;
    $result = ["Error" => 0, "Data" => []];
    $player_summary = getplayersummary_api($statementDate, 20, 0);
    if ($player_summary['Error'] == 0) {
        foreach ($referees as $referee) {
            if (strstr($referee[1], $search)) {
                $level = $referee[2] - 1;
                if ($type == $level) {
                    foreach ($player_summary['Players'] as $player) {
                        if ($player['Player'] == $referee[1]) {
                            $turnover = 0;
                            $commission = 0;
                            if (isset($player['Turnover'])) {
                                foreach ($player['Turnover'] as $vendor => $vendorTurnover) {
                                    $gameRate = 0.1;        // default
                                    foreach ($referral_rates as $referralRate) {
                                        if ($referralRate['vendor'] === strtolower($vendor)) {
                                            $gameRate = $referralRate['rate'][$level];
                                            break;
                                        }
                                    }
                                    $turnover += $vendorTurnover;
                                    $commission += $vendorTurnover * $gameRate;
                                }
                            }
                            $result['Data'][] = $type == 0 ? [
                                'Account' => $referee[1],
                                'Turnover' => $turnover,
                                'Commission' => $commission
                            ] : [
                                'Account' => $referee[1],
                                'Downline' => $referee[2],
                                'Teamadded' => $referee[3],
                                'Commission' => $commission
                            ];
                            break;
                        }
                    }
                }
            }
        }
    } else {
        $result['Error'] = $player_summary['Error'];
    }

    return $result;
}

function getRebateFromTurnover($playerName, $beginDate, $endDate, $referrers)
{
    global $default_referralRates;
    $rebate = ['Error' => 0, 'Data' => [0, 0, 0]];
    $report = getplayerturnovernew_api($playerName, [1,2,3,4,6,7], $beginDate, $endDate);
    if (isset($report['Error'])) {
        if ($report['Error'] == 0) {
            $turnover = $report['TurnOver'];
            $rebate['Data'][0] = $turnover;
            // if ($referrers[0] > 0) {
            //     $rebate['Data'][0] = $turnover * $default_referralRates[0];
            // }
            // if ($referrers[1] > 0) {
            //     $rebate['Data'][1] = $turnover * $default_referralRates[1];
            // }
            $rebate['Data'][2] = $turnover * ($default_referralRates[0] + $default_referralRates[1]);
        }
        else {
            $rebate['Error'] = $report['Error'];
        }
    } 
    return $rebate;
}

function updatePlayerDailyReportOnDB($conn, $beginDate, $endDate)
{
    $pageSize = 20;
    $pageIndex = 0;
    $currentDate = $beginDate;
    while (strtotime($currentDate) <= strtotime($endDate)) {
        $player_summary = getplayersummary_api($currentDate, $pageSize, $pageIndex);
        if (isset($player_summary['Error']) && $player_summary['Error'] == 0) {
            $count = $player_summary['TotalRecords'];
            echo $count;
            foreach ($player_summary['Players'] as $player) {
                $username = $player['Player'];
                $currency = $player['Currency'];
                $vendors = json_encode($player['Vendors']);
                $turnover = json_encode($player['Turnover']);
                $validbet = json_encode($player['Validbet']);
                $winlose = json_encode($player['Winlose']);
                insertPlayerDailyReport($conn, $username, $currency, $currentDate, $vendors, $turnover, $validbet, $winlose);
            }
            if ($count >= $pageSize) {
                $pageIndex++;
            } else {
                $currentDate = date("Y-m-d", strtotime($currentDate . " +1 day"));
            }
        } else {
            echo json_encode($player_summary);
        }

        $delay = 1; // 1 second
        $start = time();
        while (time() - $start < $delay) {
            // Keep looping until one second has passed
        }
    }
}
