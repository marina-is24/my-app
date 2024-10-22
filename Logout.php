<?php

require 'User.php'; 


User::logout();


header('Location: login.php');
exit;
?>
