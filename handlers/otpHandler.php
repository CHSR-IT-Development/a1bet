<?php
require '../vendor/autoload.php'; // Path to Twilio's PHP library
use Twilio\Rest\Client;

// start session
session_start();

// Twilio Account SID and Auth Token
$twilioAccountSid = 'ACed6ee406ea4deb17df8647d30eea9cb2';
$twilioAuthToken = '39bc4b349d0663bb7536a5dd695cb3c3';
$twilioPhoneNumber = '+17074164998';

// Retrieve the user's mobile number from the POST request
$mobile = $_POST['mobile'];
$otp = rand(100000, 999999);

// Initialize Twilio client
$twilio = new Client($twilioAccountSid, $twilioAuthToken);
try {
    // Send an SMS with the OTP
    $message = $twilio->messages->create(
        $mobile,
        [
            'from' => $twilioPhoneNumber,
            'body' => 'Your A1Bet verification code is: ' . $otp
        ]
    );

    // Send a success response to the client with the OTP
    echo json_encode(['success' => true, 'otp' => $otp]);
} catch (Exception $e) {
    // Send an error response
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    // echo json_encode(['success' => true, 'otp' => '123456']);
}
?>
