<?php

session_start();
require 'User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $user = new User($username, $password);
    $registrationMessage = $user->register(); 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <?php if (isset($registrationMessage)): ?>
        <p><?php echo htmlspecialchars($registrationMessage); ?></p>
    <?php endif; ?>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>
