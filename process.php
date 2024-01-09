<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["email"];
    $password = $_POST["pass"];

    // Hash and salt the password (for educational purposes)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Save the username and hashed password to a file
    $data = "$username:$hashedPassword\n";
    file_put_contents('users.txt', $data, FILE_APPEND | LOCK_EX);

    echo "Registration successful!";
} else {
    header("Location: index.htm");
    exit();
}
?>
