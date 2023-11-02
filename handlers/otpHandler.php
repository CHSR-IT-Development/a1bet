<?php
include '../db.php';
include 'dbHandler.php';
require '../vendor/autoload.php'; // Path to Twilio's PHP library
use Twilio\Rest\Client;

// start session
session_start();

// Twilio Account SID and Auth Token
$twilioAccountSid = $_ENV['TWILIO_SEEDID']; 
$twilioAuthToken = $_ENV['TWILIO_AUTHTOKEN']; 
$twilioPhoneNumber = $_ENV['TWILIO_PHONE']; 

// Retrieve the user's mobile number from the POST request
$mobile = $_POST['mobile'];
$otp = rand(100000, 999999);
$waitSeconds = 60;

// Initialize Twilio client
$twilio = new Client($twilioAccountSid, $twilioAuthToken);
try {
    // Send an SMS with the OTP
    // $message = $twilio->messages->create(
    //     $mobile,
    //     [
    //         'from' => $twilioPhoneNumber,
    //         'body' => 'OTP code: ' . $otp
    //     ]
    // );

    // Send a success response to the client with the OTP
    if (updateVerifyCode($conn, $mobile, $otp)) {
        echo json_encode(['success' => true, 'seconds' => $waitSeconds]);
    }    
    else {
        echo json_encode(['success' => false, 'message' => 'mysql database error']);
    }
} catch (Exception $e) {
    // Send an error response
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    // echo json_encode(['success' => true, 'otp' => '123456']);
}
?>
