<?php
session_start();


$commentsFile = 'comments.txt';


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['username'])) {
    $comment = trim($_POST['comment']);
    $username = $_SESSION['username'];

    
    if (!empty($comment)) {
        
        if (file_put_contents($commentsFile, "$username: $comment\n", FILE_APPEND) !== false) {
          
            $successMessage = "Comment added!";
        } else {
            $errorMessage = "Failed to save comment.";
        }
    } else {
        $errorMessage = "Comment cannot be empty.";
    }
}


$comments = file_exists($commentsFile) ? file($commentsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Blog with Comments</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to the CSS file -->
    <style>
        
        .comment {
            color: black;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>My Blog</h1>

    <?php if (isset($_SESSION['username'])): ?>
        <h3>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h3>
        <a href="logout.php">Logout</a>

        <div id="comment-section">
            <h2>Comments</h2>
            <div id="comments">
                <?php foreach ($comments as $comment): ?>
                    <div class="comment">
                        <?php echo htmlspecialchars($comment); // Display the comment safely ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div id="comment-form">
            <h3>Leave a Comment:</h3>
            <input type="text" id="username" value="<?php echo htmlspecialchars($_SESSION['username']); ?>" readonly>
            <textarea id="comment" placeholder="Your Comment" required></textarea>
            <button onclick="submitComment()">Submit</button>
        </div>

        <?php if (isset($successMessage)): ?>
            <p style="color: green;"><?php echo $successMessage; ?></p>
        <?php endif; ?>
        <?php if (isset($errorMessage)): ?>
            <p style="color: red;"><?php echo $errorMessage; ?></p>
        <?php endif; ?>

    <?php else: ?>
        <p>Please <a href="login.php">login</a> to comment.</p>
        <p>Don't have an account? <a href="register.php">Register here</a>.</p>
    <?php endif; ?>

    <script>
        function submitComment() {
            const commentInput = document.getElementById("comment");

            if (commentInput.value) {
             
                const form = new FormData();
                form.append("comment", commentInput.value);

                fetch("<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>", {
                    method: "POST",
                    body: form
                }).then(response => {
                    return response.text();
                }).then(data => {
                  
                    window.location.reload();
                });
            } else {
                alert("Please fill in the comment field!");
            }
        }
    </script>
</body>
</html>

