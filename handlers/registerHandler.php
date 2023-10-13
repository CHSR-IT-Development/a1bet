<?php
include '../db.php';

$response = [
    'status' => 'error',
    'message' => 'An unexpected error occurred'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mobile = $_POST['Mobile'];
    $email = $_POST['Email'];
    $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    $isMobile = $_POST['IsMobile'];
    $user_name = $mobile;
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
        $response['message'] = 'This already registered.';
    } else {
        // Perform user registration and set $response['status'] to 'success' if successful
        $stmt = $conn->prepare("INSERT INTO players (user_name, email, password, mobile) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $user_name, $email, $password, $mobile);
        try {
            if ($stmt->execute()) {
                $response['status'] = 'success';
                $response['message'] = 'Registration successful!';
            } else {
                // You can uncomment the line below during debugging to get specific error details
                // Be sure to remove it or handle it properly before deploying to production to avoid security risks
                // $response['message'] = 'Error: ' . $stmt->error;
            }
        } catch(Exception $e) {
            $response['status'] = 'error';
            $response['message'] = $e->getMessage();
        }
    }
}

echo json_encode($response);
?>
