<?php

// Include database connection file
include '../db.php';  // Adjust the path as needed
include '../apis.php';

// start session
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize user input
    $vendor = $_POST['vendor'];
    $gamecode = $_POST['gamecode'];
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

    $thirdPartyAPIResponse = opengame_api($vendor, $browser, $gamecode, $_SESSION['api_token']);
    if ($thirdPartyAPIResponse['Error'] === null) {
        $response['GameURL'] = $thirdPartyAPIResponse['Result']['Data'];
        $response['Settings'] = $thirdPartyAPIResponse['Result']['Settings'];
    }
    else {
        $response['Input'] = $vendor . $browser . $gamecode;
        $response['Text'] = 'Game API returned an error. code: ' . $thirdPartyAPIResponse['Error'];
    }                
}

// Return response as JSON
echo json_encode($response);
