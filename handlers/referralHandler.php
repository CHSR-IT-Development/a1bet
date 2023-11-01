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

    if ($type == 2) {
        $referrers = getCommissionReferrers($conn, $_SESSION['id']);
        $report = getRebateFromTurnover($account, $beginDate, $endDate, $referrers);
        if ($report['Error'] == 0) {
            $response['Data'][] = $report['Data'];
        }    
        else {
            $response['Text'] = 'Player TurnOver Report API got errors.';
        }   
    }
    else {
        $commisionrate = getCommissionByLevel($conn);
        $referees = getCommissionReferees($conn, $_SESSION['id']);
        $report = getRefereesWithComission($beginDate, $referees, $type, $account);
        if ($report['Error'] == 0) {
            $response['Data'] = $report['Data'];
        }    
        else {
            $response['Text'] = 'Player Summary Report API got errors.' . $report['Error'];
        }    
    }

    // Return JSON response
    echo json_encode($response);
}
