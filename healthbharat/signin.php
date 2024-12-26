<?php
// Start the session
session_start();

$successMsg = '';

// If the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';

    if ($name && $email) {
        // Set the success message in session to show it after redirect
        $_SESSION['appointment_message'] = "Your appointment has been booked successfully.";

        // Redirect to signin.php
        header("Location: signin.php");
        exit();
    } else {
        $errorMsg = "Please enter both name and email.";
    }
}

// Display success message if set
if (isset($_SESSION['appointment_message'])) {
    $successMsg = $_SESSION['appointment_message'];
    unset($_SESSION['appointment_message']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #262626;

        }
        
        .container {
            background-color: white;
            width: 350px;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        
        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"], input[type="email"] {
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            padding: 12px;
            margin-top: 20px;
            background-color: #0095f6;
            border: none;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #007bb5;
        }

        .success-msg {
            color: green;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .error-msg {
            color: red;
            font-weight: bold;
            margin-bottom: 20px;
        }

        a {
            color: #0095f6;
            text-decoration: none;
            font-size: 14px;
            margin-top: 15px;
        }

        a:hover {
            text-decoration: underline;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sign In to Book Appointment</h1>

        <!-- Display success message -->
        <?php if ($successMsg): ?>
            <p class="success-msg"><?php echo $successMsg; ?></p>
        <?php endif; ?>

        <!-- Display error message -->
        <?php if (isset($errorMsg)): ?>
            <p class="error-msg"><?php echo $errorMsg; ?></p>
        <?php endif; ?>

        <!-- Sign-in Form -->
        <form action="signin.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter your name" required>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <input type="submit" value="Sign In">
        </form>

        <a href="health.php">Go back to home</a>

        <div class="footer">© 2024 Health Bharat. All Rights Reserved.</div>
    </div>
</body>
</html>
