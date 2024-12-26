<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Health Bharat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('img2.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #17518f;
            color: white;
            padding: 10px 20px;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-size: 18px;
        }
        .navbar a:hover {
            text-decoration: underline;
        }
        .content {
            max-width: 83%;
            margin:5px auto;
            padding: 20px;
            margin-right: 20px;
            width: 500px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        h1, h2 {
            color: #17518f;
        }
        p {
            color: rgb(97, 65, 0);
        }
        textarea {
            width: 100%;
            max-width: 400px;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            height: 150px;
            resize: none;
        }
        .footer-text {
    color: white; 
}
        input[type="text"], input[type="email"] {
            width: 100%;
            max-width: 400px;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #3b5c34;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 4px;
        }
        input[type="submit"]:hover {
            background-color: #3b5c34;
        }
        .footer {
            text-align: center;
            background-color: #17518f;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 25px;
            padding: 10px 0;
        }
        .footer-text {
    color: white; 
}
    </style>
</head>
<body>
    <div class="navbar">
        <div><strong>Health Bharat</strong></div>
        <div><strong>
            <a href="health.php">Home</a>
            <a href="services.php">Services</a>
            <a href="about.php">About Us</a>
            <a href="contact.php">Contact</a></strong>
        </div>
    </div>

    <div class="content">
        <h1>Contact Us</h1>
        <p>If you have any questions or need support, feel free to reach out to us.</p>

        <form action="contact.php" method="POST">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>
            <br><br>
            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required>
            <br><br>
            <label for="message">Your Message:</label>
            <textarea id="message" name="message" required></textarea>
            <br><br>
            <input type="submit" value="Send Message">
        </form>
    </div>

    <<div class="footer">
    <p><span class="footer-text">&copy; 2024 Health Bharat</span></p>
</div>
</body>
</html>
