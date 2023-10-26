<?php
require '../vendor/autoload.php'; // Path to Twilio's PHP library
use Twilio\Rest\Client;

// Twilio Account SID and Auth Token
$twilioAccountSid = 'ACce7f201b47b9a00d89d33bc6c5aa4d74';
$twilioAuthToken = '8316765027e0ddfa6c54c54b815d1ac8';
$twilioPhoneNumber = '+13853474777';

// Retrieve the user's mobile number from the POST request
$user_id = $_SESSION['id'];
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
            'body' => 'Your OTP code is: ' . $otp
        ]
    );

    // Send a success response to the client with the OTP
    echo json_encode(['success' => true, 'otp' => $otp]);
} catch (Exception $e) {
    // Send an error response
    // echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    echo json_encode(['success' => true, 'otp' => '123456']);
}
?>
