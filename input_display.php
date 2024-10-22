<?php
// Initialize variables
$username = '';
$comment = '';
$age = '';
$lengthOfComment = 0;
$isAdult = false;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from POST request
    $username = htmlspecialchars(trim($_POST['username'])); // Sanitize input
    $comment = htmlspecialchars(trim($_POST['comment']));
    $age = (int)$_POST['age']; // Cast input to integer

    // Simple operations and data types
    $lengthOfComment = strlen($comment); // Get length of the comment
    $isAdult = ($age >= 18); // Determine if the user is an adult
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Input Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #4A90E2, #8BBFEE); /* Blue gradient background */
            margin: 0;
            padding: 20px;
            color: #000; /* Black text */
        }
        h1 {
            text-align: center;
            text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.5);
        }
        form {
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
            border-radius: 8px; /* Rounded corners */
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Shadow effect */
            max-width: 400px; /* Maximum width for form */
            margin: 20px auto; /* Center the form */
        }
        label {
            color: #4A90E2; /* Blue color */
            margin-top: 10px;
            display: block; /* Make labels block elements */
            font-weight: bold; /* Bold labels */
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%; /* Full width */
            padding: 10px; /* Padding inside input */
            margin-top: 5px;
            border: 1px solid #4A90E2; /* Blue border */
            border-radius: 4px; /* Rounded corners for inputs */
            box-sizing: border-box; /* Include padding in width */
            transition: border-color 0.3s; /* Smooth transition */
        }
        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            border-color: #0072B1; /* Darker blue on focus */
            outline: none; /* Remove outline */
        }
        button {
            background-color: #4A90E2; /* Blue button */
            color: white; /* White text */
            border: none;
            padding: 10px 15px; /* Button padding */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor on hover */
            font-size: 16px; /* Font size for button */
            margin-top: 10px; /* Space above button */
            transition: background-color 0.3s; /* Smooth transition */
        }
        button:hover {
            background-color: #0072B1; /* Darker blue on hover */
        }
        #result {
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background for result */
            border: 1px solid #4A90E2; /* Blue border */
            border-radius: 8px; /* Rounded corners */
            padding: 15px; /* Padding inside result */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Shadow effect */
        }
        #result h2 {
            color: #4A90E2; /* Blue color for result header */
        }
        .message {
            margin: 5px 0;
            font-weight: bold; /* Bold text for messages */
        }
    </style>
</head>
<body>
    <h1>User Input Form</h1>
    <form method="POST" action="">
        <label for="username">Enter your name:</label>
        <input type="text" id="username" name="username" required value="<?php echo $username; ?>">

        <label for="comment">Enter your comment:</label>
        <textarea id="comment" name="comment" required><?php echo $comment; ?></textarea>

        <label for="age">Enter your age:</label>
        <input type="number" id="age" name="age" required value="<?php echo $age; ?>">

        <button type="submit">Submit</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <div id="result">
            <h2>Your Input:</h2>
            <p class="message"><strong>Name:</strong> <?php echo $username; ?></p>
            <p class="message"><strong>Comment:</strong> <?php echo $comment; ?></p>
            <p class="message"><strong>Length of your comment:</strong> <?php echo $lengthOfComment; ?> characters</p>
            <p class="message"><strong>Status:</strong> <?php echo $isAdult ? "You are an adult." : "You are not an adult."; ?></p>
            <p class="message"><?php echo $lengthOfComment > 50 ? "Your comment is quite lengthy!" : "Thank you for your brief comment!"; ?></p>
        </div>
    <?php endif; ?>
</body>
</html>
