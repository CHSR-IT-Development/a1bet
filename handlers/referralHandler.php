<?php

// Include database connection file
include '../db.php';  // Adjust the path as needed
include '../apis.php';

// start session
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize user input
    $date = $_POST['date'];
    $account = $_POST['account'];

    if (empty($vendor)) {
        $response['Text'] = 'Vendor is missed.';
        echo json_encode($response);
        exit;
    }

    $thirdPartyAPIResponse = opengame_api($vendor, $browser, $gamecode, $_SESSION['api_token']);
    if ($thirdPartyAPIResponse['Message'] != null) {
        $response['Text'] = 'Game API returned an error message: ' . $thirdPartyAPIResponse['Message'];
    }
    else if ($thirdPartyAPIResponse['Success'] === true) {
        $response['GameURL'] = $thirdPartyAPIResponse['Result']['Metadata'] ?? $thirdPartyAPIResponse['Result']['Data'];
        $response['Settings'] = $thirdPartyAPIResponse['Result']['Settings'];
        // $response['Text'] = json_encode($thirdPartyAPIResponse);
    }
    else {
        $response['Text'] = 'Game API returned an error code: ' . json_encode($thirdPartyAPIResponse['Error']);
    }                
}

// Return response as JSON
echo json_encode($response);
