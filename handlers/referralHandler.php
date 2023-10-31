<?php

// Include database connection file
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
    $report = getRefereesWithComission($date, $referees, $type, $account);
    if ($report['Error'] == 0) {
        $response['Data'] = $report['Data'];
    }    
    else {
        $response['Text'] = 'WinLose Full Report API got errors.' . $report['Error'];
    }

    // Return JSON response
    echo json_encode($response);
}
