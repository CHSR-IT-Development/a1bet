<?php

// Include database connection file
include '../db.php';  // Adjust the path as needed
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
    $username = mysqli_real_escape_string($conn, $_POST['UserName']);
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
                $thirdPartyAPIResponse = login_api($username, $password);
                if ($thirdPartyAPIResponse['Error'] === 0) {
                    $response['Login'] = 1;
                    $response['Text'] = 'Login successful!';
                    $response['Redirect'] = '/';  // Adjust this URL as needed
                    $response['Token'] = session_id();  // Example, typically you might generate a more secure token
                    // $response['APIToken'] = $thirdPartyAPIResponse['Token'];
    
                    // Set session variables or do other login setup here as needed
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['user_name'] = $user['user_name'];
                    $_SESSION['full_name'] = $user['full_name'];
                    $_SESSION['ref_code'] = $user['ref_code'];
                    $_SESSION['api_token'] = $thirdPartyAPIResponse['Token'];
                }
                else {
                    $response['Text'] = 'Game API returned an error. code: ' . $thirdPartyAPIResponse['Error'];
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
