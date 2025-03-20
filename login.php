<?php
include 'db_connect.php';  // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            echo "Login successful";
            header("Location: library.html");  // Redirect to library
        } else {
            echo "Invalid credentials";
        }
    } else {
        echo "No user found with that email";
    }

    $stmt->close();
}

$conn->close();
?>
