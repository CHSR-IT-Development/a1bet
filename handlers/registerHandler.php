<?php
include '../db.php';
include '../apis.php';
include 'dbHandler.php';
// Start session
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$response = [
    'status' => 'error',
    'code' => 'UNKNOWN',
    'message' => 'An unexpected error occurred'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['Username'];
    $mobile = $user_name;
    $email = 'example@qq.com';
    $raw_password = $_POST['Password'];
    $cpassword = $_POST['CPassword'];
    $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    $isMobile = $_POST['IsMobile'];
    $referrer_code = $_POST['id'] ?? null;    
    $referral_code = generateReferralCode($conn); // Generate referral ID

    if ($raw_password != $cpassword) {
        $response = [
            'status' => 'error',
            'code' => 'PASSWORD_ERROR',
            'message' => 'Password not matched'
        ];
        echo json_encode($response);
        exit;
    }

    $thirdPartyAPIResponse = register_api($user_name, $email, $raw_password, $mobile); // Adjust parameters as needed
    // exit ($thirdPartyAPIResponse);

    try {
        if ($thirdPartyAPIResponse['Error'] === 0) {
            // Proceed to register user in your own database
            if ($isMobile == false) {
                $query = $conn->prepare("SELECT * FROM players WHERE user_name = ?");
                $query->bind_param("s", $user_name);
            } else {
                $query = $conn->prepare("SELECT * FROM players WHERE mobile = ?");
                $query->bind_param("s", $mobile);
            }

            $query->execute();
            $result = $query->get_result();          
            $data = $result->fetch_assoc();
            if ($result->num_rows > 0 && $data['user_name'] === $user_name) {
                $response['message'] =  'Already Exist Username in Out DB.';
                $response['code'] = 'USER_EXISTS'; // Specific error code
                $response['status'] = 'USER_EXISTS'; // Specific error code
            } else {
                $stmt = $conn->prepare("INSERT INTO players (user_name, email, password, mobile, ref_code) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $user_name, $email, $password, $mobile, $referral_code); // Added referralID
    
                if ($stmt->execute()) {

                    // Update referrals
                    $playerID = $stmt->insert_id;
                    $level = 0; // Default level
                    if ($referrer_code) {
                        $referrer = getPlayerByReferralCode($conn, $referrer_code);
                        if ($referrer) {
                            // Calculate level here based on the hierarchy
                            $level = calculateLevel($conn, $referrer['id']) + 1;
                        }

                        // Insert into referrals table
                        $stmt = $conn->prepare("INSERT INTO referrals (referrer_id, referee_id, level) VALUES (?, ?, ?)");
                        $stmt->bind_param("iii", $referrer['id'], $playerID, $level);
                        $stmt->execute();
                    } else {
                        // Insert into referrals table with level 0
                        $stmt = $conn->prepare("INSERT INTO referrals (referee_id, level) VALUES (?, ?)");
                        $stmt->bind_param("ii", $playerID, $level);
                        $stmt->execute();
                    }

                    $commission = getCommissionByLevel($conn, $level);

                    $response['status'] = 'success';
                    $response['message'] = 'Registered Successfully';
                    $response['playerID'] = $playerID;
                    $response['level'] = $level;
                    $response['commission'] = $commission;

                    $_SESSION['id'] = $playerID;
                    $_SESSION['user_name'] = $user_name;
                    $_SESSION['ref_code'] = $referral_code;

                    $thirdPartyAPIResponse = login_api($user_name, $password);
                    $_SESSION['api_token'] = $thirdPartyAPIResponse['Error'] === 0 ? $thirdPartyAPIResponse['Token'] : '';
                } else {
                    // Handle error
                    $response['message'] = 'Database error: ' . $stmt->error;
                    $response['code'] = 'DB_ERROR'; // Specific error code for database error
                    $response['status'] = 'DB_ERROR';
                }           
            }
        } else {
            $response['code'] = 'THIRD_PARTY_ERROR';
            $response['status'] = "THIRD_PARTY_ERROR";
            $response['message'] = 'Failed Register in Auth API. Code: ' . $thirdPartyAPIResponse['Error'];
        }
    } catch (Exception $e) {
        $response['message'] = $e->getMessage();
        $response['code'] = 'DB_UNKNOWN';
        $response['status'] = 'DB_UNKNOWN';
    }
}

echo json_encode($response);

