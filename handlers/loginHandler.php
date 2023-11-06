<?php

// Include database connection file
include '../apis.php';

// start session
session_start();

$response = [
    'Login' => -1,
    'Text' => 'An error occurred, please try again.',
    'Redirect' => null,
    'Token' => null
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize user input
    $username = mysqli_real_escape_string($conn, str_replace('+', '', $_POST['UserName']));
    $password = mysqli_real_escape_string($conn, $_POST['Password']);

    if (empty($username) || empty($password)) {
        $response['Text'] = 'Username and password are required.';
        echo json_encode($response);
        exit;
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT * FROM players WHERE user_name = ?");
    $stmt->bind_param('s', $username);

    // Execute statement
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verify password
            if (password_verify($password, $user['password'])) {                
                // Success! Password and username matched

                $playerId = $user['id'];
                $currSessionId = $user['current_session_id'];
                $isMultiSession = false;                                
                if ($currSessionId != '') {
                    $lastTimestamp = strtotime($user['last_login_time']); // Convert the last login time to Unix timestamp
                    $currTimestamp = time();               // Current Unix timestamp
                    $differenceInSeconds = $currTimestamp - $lastTimestamp;
                    if ($differenceInSeconds < 60 * 15) {
                        $isMultiSession = true;
                    }
                }

                if ($isMultiSession == false) {
                    $thirdPartyAPIResponse = login_api($username, $password);
                    if ($thirdPartyAPIResponse['Error'] === 0) {
                        $sessionId = session_id();
                        $response['Login'] = 1;
                        $response['Text'] = 'Login successful!';
                        $response['Redirect'] = '/';  // Adjust this URL as needed
                        $response['Token'] = $sessionId;  // Example, typically you might generate a more secure token
                        // $response['APIToken'] = $thirdPartyAPIResponse['Token'];
        
                        // Set session variables or do other login setup here as needed
                        $_SESSION['id'] = $user['id'];
                        $_SESSION['session'] = $sessionId;
                        $_SESSION['user_name'] = $user['user_name'];                        
                        $_SESSION['ref_code'] = $user['ref_code'];
                        $_SESSION['api_token'] = $thirdPartyAPIResponse['Token'];
                        
                        $currTime = date('Y-m-d H:i:s', time());
                        $query = "UPDATE players SET current_session_id = '$sessionId', last_login_time = '$currTime' WHERE id = $playerId";
                        $stmt = $conn->prepare($query);
                        $stmt->execute();
                    }
                    else {
                        $response['Text'] = 'Game API returned an error. code: ' . $thirdPartyAPIResponse['Error'];
                    } 
                }
                else {
                    // Password didn't match
                    $response['Text'] = 'Already logged in different location.';
                }               
            } else {
                // Password didn't match
                $response['Text'] = 'Incorrect password.';
            }
        } else {
            // Username not found
            $response['Text'] = 'Username not found.';
        }
    } else {
        // SQL execution error
        $response['Text'] = 'An error occurred during login.';
    }
}

// Return response as JSON
echo json_encode($response);

?>
