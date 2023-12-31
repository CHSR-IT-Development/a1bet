<?php

// Include database connection file
include '../apis.php';

// start session
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = isset($_POST['type']) ? $_POST['type'] : 0;

    switch ($type) {
        case 0: {
                // open game
                $vendor = strtolower($_POST['vendor']);
                $mobile = filter_var($_POST['mobile'], FILTER_VALIDATE_BOOLEAN);
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

                $thirdPartyAPIResponse = opengame_api($vendors[0]['vendorCode'], $browser, $gamecode, $_SESSION['api_token'], $mobile);
                if ($thirdPartyAPIResponse['Error'] != 0) {
                    $response['Text'] = 'Game API returned an error message: ' . $thirdPartyAPIResponse['Message'];
                } else {
                    $apiRequest = $thirdPartyAPIResponse['Request'];
                    $apiResponse = $thirdPartyAPIResponse['Response'];
                    if (isset($apiResponse['Code'])) {
                        $response['Text'] = 'Game API returned an error code: ' . json_encode($apiResponse['Message']);
                        $response['Request'] = json_encode($apiRequest);
                        $response['Response'] = json_encode($apiResponse);
                        $response['Endpoint'] = $thirdPartyAPIResponse['Endpoint'];
                    } else if ($apiResponse['Success'] === true) {
                        $response['GameURL'] = $apiResponse['Result']['Metadata'] ?? $apiResponse['Result']['Data'];
                        $response['Settings'] = $apiResponse['Result']['Settings'];
                        // $response['Text'] = json_encode($thirdPartyAPIResponse);
                    } else {
                        $response['Text'] = 'Game API returned an error code: ' . json_encode($apiResponse['Error']);
                        $response['Request'] = json_encode($apiRequest);
                        $response['Response'] = json_encode($apiResponse);
                        $response['Endpoint'] = $thirdPartyAPIResponse['Endpoint'];
                    }
                }
            }
            break;
        case 1: {
                // deposit
                $amount = strtolower($_POST['amount']);
                $playerName = strtolower($_POST['account']);

                $thirdPartyAPIResponse = depositwallet_api($playerName, $amount);
                if ($thirdPartyAPIResponse['Success']) {
                    $response['Text'] = 'Your money has been deposited successfully';
                    $response['Error'] = 0;    
                }
                else {
                    $response['Text'] = $thirdPartyAPIResponse['Error']['Message'];
                    $response['Error'] = $thirdPartyAPIResponse['Error']['Code'];
                }
            }
            break;
        case 2: {
                // withdraw
                $amount = strtolower($_POST['amount']);
                $playerName = strtolower($_POST['account']);

                $thirdPartyAPIResponse = withdrawwallet_api($playerName, $amount);
                if ($thirdPartyAPIResponse['Success']) {
                    $response['Text'] = 'Your money has been withdrawed successfully';
                    $response['Error'] = 0;    
                }
                else {
                    $response['Text'] = $thirdPartyAPIResponse['Error']['Message'];
                    $response['Error'] = $thirdPartyAPIResponse['Error']['Code'];
                }
            }
            break;
        default: {
            }
            break;
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
