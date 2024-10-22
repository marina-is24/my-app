<?php

session_start();
require 'User.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $user = new User($username);
    
    if ($user->login($password)) {
        $_SESSION['username'] = $username; 
        header('Location: index.php');
    } else {
        $loginError = "Invalid login credentials!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($loginError)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($loginError); ?></p>
    <?php endif; ?>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
