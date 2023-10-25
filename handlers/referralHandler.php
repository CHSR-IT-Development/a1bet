<?php

// Include database connection file
include '../db.php';  // Adjust the path as needed
include '../apis.php';
include './dbHandler.php';

// start session
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = ['Data' => []];

    // Sanitize user input
    $date = isset($_POST['date']) ? $_POST['date'] : date('Y-m-d', time());
    $account = isset($_POST['account']) ? $_POST['account'] : '';
    $type = isset($_POST['type']) ? $_POST['type'] : 0;
    if (empty($date)) {
        $response['Text'] = 'Date is required.';
        echo json_encode($response);
        exit;
    }
    $commisionrate = getCommissionByLevel($conn);
    $referees = getCommissionReferees($conn, $_SESSION['id']);
    // Proceed with your API call and additional logic
    $report = winlosefullreport_api("", [1, 2, 3, 4, 6, 7], "", $date, $date, 20, 0);

    if ($report['Success']) {
        for ($i = 0; $i < count($referees); $i++) {
            $referee = $referees[$i];
            if (($referee[2] == 1 || $type == 1) && strstr($referee[1], $account)) {
                $turnover = 0;
                $commission = 0;
                for ($j = 0; $j < count($report['Result']['Records']); $j++) {
                    $winlose = $report['Result']['Records'][$j];
                    if ($referee[1] == $winlose['UserName']) {
                        $turnover = $winlose['TurnOver'];
                        $commission = $winlose['TurnOver'] * $commisionrate[$referee[2]] / 100;
                        break;
                    }
                }

                if ($type == 0) {
                    $response['Data'][] = [
                        'Account' => $referee[1],
                        'Turnover' => $turnover,
                        'Commission' => $commission
                    ];    
                }
                else {
                    $response['Data'][] = [
                        'Account' => $referee[1],
                        'Downline' => $referee[2],
                        'Teamadded' => $referee[3],
                        'Commission' => $commission
                    ];    
                }
            }
        }
    }    
    else {
        $response['Text'] = 'WinLose Full Report API got errors.' . json_encode($report['Error']);
        echo json_encode($response);
        exit;
    }

    // Return JSON response
    echo json_encode($response);
}
