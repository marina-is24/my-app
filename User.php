<?php
class User {
    private $username;
    private $password;
    private $file;

    public function __construct($username, $password = null) {
        $this->username = $username;
        $this->password = $password ? password_hash($password, PASSWORD_DEFAULT) : null; // Hash password only on registration
        $this->file = 'users.txt'; 
    }

    public function register() {
        if ($this->usernameExists()) {
            return "Username already exists!";
        }

      
        file_put_contents($this->file, "{$this->username}:{$this->password}\n", FILE_APPEND);
        return "Registration successful!";
    }

    private function usernameExists() {
        if (!file_exists($this->file)) {
            return false; 
        }

        $users = file($this->file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($users as $user) {
            list($existingUsername) = explode(':', $user);
            if ($existingUsername === $this->username) {
                return true; 
            }
        }
        return false;
    }

    public function login($password) {
       
        if (!file_exists($this->file)) {
            return "No users registered!";
        }

        $users = file($this->file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($users as $user) {
            list($existingUsername, $hashedPassword) = explode(':', $user);
            if ($existingUsername === $this->username && password_verify($password, $hashedPassword)) {
                return true; 
            }
        }
        return false;
    }

    public static function logout() {
        session_start();
        session_destroy();
    }
}
?>
