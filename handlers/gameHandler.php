<?php

// Include database connection file
include '../db.php';  // Adjust the path as needed
include '../apis.php';

// start session
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize user input
    $vendor = strtolower($_POST['vendor']);
    $userAgent = $_SERVER['HTTP_USER_AGENT'];

    if (strpos($userAgent, 'Firefox') !== false) {
        $browser = 'firefox';
    } elseif (strpos($userAgent, 'Chrome') !== false) {
        $browser = 'chrome';
    } elseif (strpos($userAgent, 'Safari') !== false) {
        $browser = 'safari';
    } elseif (strpos($userAgent, 'Edge') !== false) {
        $browser = 'edge';
    } elseif (strpos($userAgent, 'MSIE') !== false || strpos($userAgent, 'Trident') !== false) {
        $browser = 'iexplorer';
    } elseif (strpos($userAgent, 'Opera') !== false || strpos($userAgent, 'OPR') !== false) {
        $browser = 'opera';
    } else {
        $browser = 'Unknown Browser';
    }

    if (empty($vendor)) {
        $response['Text'] = 'Vendor is missed.';
        echo json_encode($response);
        exit;
    }

    // Get game code
    $gamelist = [];
    $gamecode = "";
    $vendors = getVendorsFromVendorCode($vendor);
    if (empty($vendors)) {
        $response['Text'] = 'Vendor is invalid.';
        echo json_encode($response);
        exit;
    } else {
        $param = $vendors[0]['gamecode'];
        if (strlen($param) > 0) {
            if ($param[0] == '_') {
                $gamecode = substr($param, 1);
            } else {
                $gamelistResp = getgamelist_api($vendor, $_SESSION['api_token']);
                if ($gamelistResp['Success'] == false) {
                    $response['Text'] = 'GetGameList is failed.' . json_encode($gamelistResp['Error']);
                    echo json_encode($response);
                    exit;
                } else {
                    $gamelist = $gamelistResp['Result'];
                    if (isset($gamelist['Data'])) {
                        $gamelist = $gamelist['Data'];
                    }
                    $fields = explode('*', $param);
                    foreach ($fields as $field) {
                        $filterdArray = filterArrayByKey($gamelist, $field);
                        if (!empty($filterdArray)) {
                            $gamecode = $gamecode . $filterdArray[0] . '*';
                        }
                    }
                    if (strlen($gamecode) > 0)
                        $gamecode = substr($gamecode, 0, -1);
                }
            }
        }
    }

    $thirdPartyAPIResponse = opengame_api($vendors[0]['vendorCode'], $browser, $gamecode, $_SESSION['api_token']);
    if ($thirdPartyAPIResponse['Message'] != null) {
        $response['Text'] = 'Game API returned an error message: ' . $thirdPartyAPIResponse['Message'];
    } else if ($thirdPartyAPIResponse['Success'] === true) {
        $response['GameURL'] = $thirdPartyAPIResponse['Result']['Metadata'] ?? $thirdPartyAPIResponse['Result']['Data'];
        $response['Settings'] = $thirdPartyAPIResponse['Result']['Settings'];
        // $response['Text'] = json_encode($thirdPartyAPIResponse);
    } else {
        $response['Text'] = 'Game API returned an error code: ' . json_encode($thirdPartyAPIResponse['Error']);
    }
}

function filterArrayByKey($data, $value)
{
    $filteredArray = [];

    foreach ($data as $item) {
        if (isset($item[$value])) {
            $filteredArray[] = $item[$value];
        }
    }

    return $filteredArray;
}

// Return response as JSON
echo json_encode($response);
