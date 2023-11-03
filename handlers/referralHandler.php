<?php

// Include database connection file
include '../apis.php';

// start session
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = ['Data' => []];

    $type = isset($_POST['type']) ? $_POST['type'] : 0;
    $beginDate = isset($_POST['begindate']) ? $_POST['begindate'] : date('Y-m-d', time());
    $endDate = isset($_POST['enddate']) ? $_POST['enddate'] : date('Y-m-d', time());
    $account = isset($_POST['account']) ? $_POST['account'] : '';
    if (empty($beginDate)) {
        $response['Text'] = 'Date is required.';
        echo json_encode($response);
        exit;
    }

    switch ($type) {
        case 4: {
                // wallet history
                $report = getWalletHistory($account, $beginDate, $endDate);
                if ($report['Error'] == 0) {
                    $response['Data'] = $report['Data'];
                } else {
                    $response['Text'] = 'Player Deposit/Withdraw API got errors: ' . $report['Error'];
                }
            }
            break;
        case 3: {
                // valid bet history
                $report = getValidBetHistory($account, $beginDate);
                if ($report['Error'] == 0) {
                    $response['Data'] = $report['Data'];
                } else {
                    $response['Text'] = 'Player Summary API got errors: ' . $report['Error'];
                }
            }
            break;
        case 2: {
                // rebate history
                $report = getRebateFromTurnover2($account, $endDate);
                if ($report['Error'] == 0) {
                    $response['Data'] = $report['Data'];
                } else {
                    $response['Text'] = 'Player Summary API got errors: ' . $report['Error'];
                }
            }
            break;
        default: {
                $commisionrate = getCommissionByLevel($conn);
                $referees = getCommissionReferees($conn, $_SESSION['id']);
                $report = getRefereesWithComission($beginDate, $referees, $type, $account);
                if ($report['Error'] == 0) {
                    $response['Data'] = $report['Data'];
                } else {
                    $response['Text'] = 'Player Summary Report API got errors.' . $report['Error'];
                }
            }
            break;
    }

    // Return JSON response
    echo json_encode($response);
}
