<?php
include '../db.php';
include 'dbHandler.php';

// start session
session_start();

// Twilio Account SID and Auth Token
$api_key = $_ENV['MESSAGEWHIZ_API_KEY'];

// Retrieve the user's mobile number from the POST request
$mobile = $_POST['mobile'];
$otp = rand(100000, 999999);
$waitSeconds = 120;

// The data you want to send
$payload = [
    'api_key' => $api_key,
    'to' => $mobile,
    'from' => 'sender',
    'text' => 'a1bet otp code is ' . $otp, // The SMS message    
];

// MessageWhiz API URL for sending SMS
$api_url = 'https://sms.messagewhiz.com/sms';

// Initialize cURL session
$ch = curl_init($api_url);

// Set cURL options
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json'
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_VERBOSE, true);

// Execute cURL session and get the response
$response = curl_exec($ch);
curl_close($ch);

if (!$response) {    
    echo json_encode([
        'success' => false,
        'message' => curl_error($ch)
    ]);
    exit;
}

// Decode the response
$responseData = json_decode($response, true);

// Check the response data and handle accordingly
if (!isset($responseData['statusCode'])) {
    // Send a success response to the client with the OTP
    if (updateVerifyCode($conn, $mobile, $otp)) {
        echo json_encode(['success' => true, 'seconds' => $waitSeconds]);
    } else {
        echo json_encode(['success' => false, 'message' => 'mysql database error']);
    }
} else {
    echo json_encode(['success' => false, 'message' => "Failed to send SMS. Error: " . $responseData['message']]);
}
