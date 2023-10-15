<?php
include '../db.php';
include '../apis.php';
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
    $mobile = $_POST['Mobile'];
    $email = $_POST['Email'];
    $raw_password = $_POST['Password'];
    $cpassword = $_POST['CPassword'];
    $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    $isMobile = $_POST['IsMobile'];
    $referrer_code = $_POST['id'] ?? null;
    $user_name = $mobile;
    $referral_code = generateReferralCode($conn); // Generate referral ID

    if ($raw_password != $cpassword) {
        $response = [
            'status' => 'error',
            'code' => 'PASSWORD_ERROR',
            'message' => 'Password not matched' . $password . "|" . $_POST['CPassword']
        ];
        echo json_encode($response);
        exit;
    }

    $thirdPartyAPIResponse = register_api($user_name, $email, $raw_password, $mobile); // Adjust parameters as needed

    if ($thirdPartyAPIResponse['Error'] === 0) {
        // Proceed to register user in your own database
        // ... (rest of your code)
        if ($isMobile == false) {
            $query = $conn->prepare("SELECT * FROM players WHERE user_name = ?");
            $query->bind_param("s", $user_name);
        } else {
            $query = $conn->prepare("SELECT * FROM players WHERE mobile = ?");
            $query->bind_param("s", $mobile);
        }

        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {
            $response['message'] = 'This user is already registered.';
            $response['code'] = 'USER_EXISTS'; // Specific error code
            $response['status'] = 'USER_EXISTS'; // Specific error code
        } else {
            $stmt = $conn->prepare("INSERT INTO players (user_name, email, password, mobile, ref_code) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $user_name, $email, $password, $mobile, $referral_code); // Added referralID

            try {
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
                        $stmt = $conn->prepare("INSERT INTO referrals (referrer_id, level) VALUES (?, ?)");
                        $stmt->bind_param("ii", $playerID, $level);
                        $stmt->execute();
                    }

                    $commission = getCommissionByLevel($conn, $level);

                    $response['status'] = 'success';
                    $response['message'] = 'Registration successful!';
                    $response['playerID'] = $playerID;
                    $response['level'] = $level;
                    $response['commission'] = $commission;
                } else {
                    // Handle error
                    $response['message'] = 'Database error: ' . $stmt->error;
                    $response['code'] = 'DB_ERROR'; // Specific error code for database error
                    $response['status'] = 'DB_ERROR';
                }
            } catch (Exception $e) {
                $response['message'] = $e->getMessage();
                $response['code'] = 'DB_UNKNOWN';
                $response['status'] = 'DB_UNKNOWN';
            }
        }
    } else {
        $response['message'] = json_encode($thirdPartyAPIResponse);
        $response['code'] = 'THIRD_PARTY_ERROR';
        $response['status'] = "error";
    }
}

echo json_encode($response);

function generateReferralCode($conn)
{
    $idExists = true;

    while ($idExists) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < 6; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $stmt = $conn->prepare("SELECT * FROM players WHERE ref_code=?"); // Changed to players table
        $stmt->bind_param("s", $randomString);
        $stmt->execute();

        if ($stmt->fetch() === NULL) {
            $idExists = false;
        }

        $stmt->close();
    }

    return $randomString;
}
function getPlayerByReferralCode($conn, $referralCode)
{
    $stmt = $conn->prepare("SELECT id FROM players WHERE ref_code = ?");
    $stmt->bind_param("s", $referralCode);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function calculateLevel($conn, $playerID)
{
    // Implement the logic to calculate the level based on hierarchical structure
    // This is just a basic example, you might need to adjust based on your specific requirements
    $stmt = $conn->prepare("SELECT level FROM referrals WHERE referee_id = ?");
    $stmt->bind_param("i", $playerID);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    return $result ? $result['level'] : 0;
}

function getCommissionByLevel($conn, $level)
{
    $stmt = $conn->prepare("SELECT commission FROM levels WHERE level = ?");
    $stmt->bind_param("i", $level);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    return $result ? $result['commission'] : null;
}

function getReferrerIDByLevel($conn, $refereeID, $desiredLevel)
{
    $currentLevel = 0;

    $stmt = $conn->prepare("SELECT referrer_id FROM referrals WHERE referee_id = ?");

    while ($currentLevel <= $desiredLevel) {
        $stmt->bind_param("i", $refereeID);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if ($result && $result['referrer_id']) {
            if ($currentLevel == $desiredLevel) {
                // If the current level matches the desired level, return the referrer ID
                return $result['referrer_id'];
            } else {
                // Otherwise, move up to the next level and continue the loop
                $refereeID = $result['referrer_id'];
                $currentLevel++;
            }
        } else {
            // If no referrer found, break the loop and return null
            break;
        }
    }

    $stmt->close();
    return null;
}
