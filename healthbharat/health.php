<?php
// Initialize variables for success or error messages
$successMsg = '';
$errorMsg = '';

// Handle the form submission when "Book Appointment" or "Check Fees" is clicked
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['book_appointment'])) {
        // Redirect to signin.php when "Book Appointment" is clicked
        header("Location: signin.php");
        exit();
    } elseif (isset($_POST['check_fees'])) {
        // Example: Mock doctor fees data
        $doctorFees = [
            "dermatologist" => 500,
            "gynecologist" => 700,
            "ent" => 600,
            "dentist" => 450,
            "cardiologist" => 1000,
            "neurologist" => 800,
            "orthopedic" => 650,
            "dietitian" => 400,
            "psychiatrist" => 900,
            "radiologist" => 750
        ];

        // Get selected department
        $department = $_POST['department'] ?? '';
        if ($department && isset($doctorFees[$department])) {
            $fees = $doctorFees[$department];
            $successMsg = "The consultation fee for the $department is ₹$fees.";
        } else {
            $errorMsg = 'Invalid department selected for fee check.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Bharat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('img.png');
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
                margin-bottom: 10px;
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
            margin: auto;
            padding: 20px;
            width: 840px;
            margin-left:91px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-bottom: 10px;
        }
        h1, h2 {
            color: #17518f;
        }
        p {
            color: rgb(97, 65, 0);
        }
        form {
            background-color: #f4f4f4;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        input, select {
            padding: 10px;
            margin: 5px 0;
            width: 100%;
            max-width: 400px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #3b5c34;
            color: white;
            border: none;
            cursor: pointer;
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
        }
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                text-align: center;
            }
            .content {
                max-width: 95%;
            }
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
        <h1>Accessible Healthcare, Anywhere, Anytime.</h1>
        <p>Health Bharat is a healthcare platform that connects you with medical professionals for online consultations and other healthcare services. Our mission is to provide accessible and affordable healthcare to everyone, anytime, anywhere.</p>
    </div>

    <div class="content">
        <h2>Book Your Online Consultation</h2>

        <!-- Display Success or Error Messages -->
        <?php if ($successMsg): ?>
            <p style="color: green;"><?php echo $successMsg; ?></p>
        <?php endif; ?>
        <?php if ($errorMsg): ?>
            <p style="color: red;"><?php echo $errorMsg; ?></p>
        <?php endif; ?>

        <form action="health.php" method="POST">
            <label for="department">Select Department:</label>
            <select id="department" name="department" onchange="loadDoctors()">
                <option value="">--Select Department--</option>
                <option value="dermatologist">Dermatologist</option>
                <option value="gynecologist">Gynecologist</option>
                <option value="ent">ENT Specialist</option>
                <option value="dentist">Dentist</option>
                <option value="cardiologist">Cardiologist</option>
                <option value="neurologist">Neurologist</option>
                <option value="orthopedic">Orthopedic</option>
                <option value="dietitian">Dietitian</option>
                <option value="psychiatrist">Psychiatrist</option>
                <option value="radiologist">Radiologist</option>
            </select>
            <br><br>
            <label for="doctor">Select Doctor:</label>
            <select id="doctor" name="doctor">
                <option value="">--Select Doctor--</option>
            </select>
            <br><br>
            <label for="date">Select Date:</label>
            <input type="date" id="date" name="date">
            <br><br>
            <label for="time">Select Time:</label>
            <input type="time" id="time" name="time">
            <br><br>
            <input type="submit" name="book_appointment" value="Book Appointment">
            <input type="submit" name="check_fees" value="Check Fees">
        </form>
    </div>

    <script>
        const doctorData = {
            dermatologist: [
                "Dr. Arun Rawat", "Dr. Sneha Mehra", "Dr. Priya Singh", "Dr. Ravi Kapoor",
                "Dr. Anita Verma", "Dr. Akshay Patel", "Dr. Meenakshi Gupta", "Dr. Kiran Rao",
                "Dr. Rajesh Jain", "Dr. Shalini Sharma"
            ],
            gynecologist: [
                "Dr. Aditi Banerjee", "Dr. Riya Das", "Dr. Neha Khurana", "Dr. Priya Agarwal",
                "Dr. Kavita Jain", "Dr. Anjali Mehta", "Dr. Varun Gupta", "Dr. Sonia Rai",
                "Dr. Anupama Kaur", "Dr. Simran Malik"
            ],
            ent: [
                "Dr. Rajeev Arora", "Dr. Shweta Sood", "Dr. Sandeep Kumar", "Dr. Kunal Verma",
                "Dr. Priya Malhotra", "Dr. Ashok Mehta", "Dr. Rishi Sharma", "Dr. Sanjay Gupta",
                "Dr. Anil Kumar", "Dr. Meera Verma", "Dr. Ramesh Singh", "Dr. Rekha Desai",
                "Dr. Karan Sethi", "Dr. Pallavi Agarwal", "Dr. Vishal Mishra"
            ],
            dentist: [
                "Dr. Neeraj Bansal", "Dr. Ananya Gupta", "Dr. Shubham Sharma", "Dr. Neha Joshi",
                "Dr. Rishabh Agarwal", "Dr. Swati Singh", "Dr. Pooja Mehta", "Dr. Manish Chauhan",
                "Dr. Snehal Bhatia", "Dr. Rahul Kapoor", "Dr. Ruchi Saini", "Dr. Aditi Kapoor",
                "Dr. Deepak Yadav", "Dr. Shivani Patel", "Dr. Sonal Arora"
            ],
            cardiologist: [
                "Dr. Shailendra Mishra", "Dr. Sanjay Joshi", "Dr. Amit Chauhan", "Dr. Ankur Arora",
                "Dr. Suman Kumar", "Dr. Priya Sharma", "Dr. Sandeep Bansal", "Dr. Rajiv Mehta",
                "Dr. Kamal Sethi", "Dr. Mukesh Yadav", "Dr. Aarti Agarwal", "Dr. Pankaj Verma",
                "Dr. Parveen Kaur", "Dr. Shubham Thakur", "Dr. Gaurav Jha"
            ],
            neurologist: [
                "Dr. Suraj Yadav", "Dr. Ritu Verma", "Dr. Arvind Singh", "Dr. Manish Kumar",
                "Dr. Neeraj Chauhan", "Dr. Anita Kapoor", "Dr. Rajesh Kumar", "Dr. Priya Mehta",
                "Dr. Ramesh Gupta", "Dr. Neha Sharma", "Dr. Abhishek Joshi", "Dr. Sushil Kumar",
                "Dr. Pooja Agarwal", "Dr. Deepak Patel", "Dr. Nidhi Sharma"
            ],
            orthopedic: [
                "Dr. Kunal Kumar", "Dr. Shruti Sharma", "Dr. Vikram Singh", "Dr. Rani Kapoor",
                "Dr. Neeraj Yadav", "Dr. Deepak Mehta", "Dr. Ashwini Arora", "Dr. Kiran Jain",
                "Dr. Pooja Singh", "Dr. Abhishek Sharma", "Dr. Dinesh Patel", "Dr. Amit Kapoor",
                "Dr. Preeti Agarwal", "Dr. Rajeev Mehra", "Dr. Rakesh Kumar"
            ],
            dietitian: [
                "Dr. Rupa Yadav", "Dr. Sunita Sharma", "Dr. Neelam Rani", "Dr. Nidhi Bansal",
                "Dr. Aarti Patel", "Dr. Preeti Kapoor", "Dr. Shalini Verma", "Dr. Neeraj Bansal",
                "Dr. Suman Arora", "Dr. Sonia Mehta", "Dr. Suraj Kumar", "Dr. Kavita Verma",
                "Dr. Bhavna Sharma", "Dr. Ritika Agarwal", "Dr. Shubhi Mehta"
            ],
            psychiatrist: [
                "Dr. Mukesh Arora", "Dr. Radhika Kapoor", "Dr. Neeraj Malhotra", "Dr. Priya Mishra",
                "Dr. Anshika Mehta", "Dr. Shilpa Arora", "Dr. Sunita Joshi", "Dr. Gaurav Yadav",
                "Dr. Anita Thakur", "Dr. Vivek Kumar", "Dr. Simran Bhatia", "Dr. Mohit Sharma",
                "Dr. Shubham Singh", "Dr. Rajesh Bansal", "Dr. Neha Verma"
            ],
            radiologist: [
                "Dr. Amit Yadav", "Dr. Shalini Kapoor", "Dr. Ajeet Kumar", "Dr. Priya Mehta",
                "Dr. Nisha Sharma", "Dr. Sandeep Singh", "Dr. Karan Yadav", "Dr. Rekha Soni",
                "Dr. Deepak Arora", "Dr. Neelam Kumar", "Dr. Pooja Chauhan", "Dr. Vishal Gupta",
                "Dr. Manju Bansal", "Dr. Ritu Arora", "Dr. Sanjay Mehta"
            ],
        };

        function loadDoctors() {
            const departmentSelect = document.getElementById("department");
            const doctorSelect = document.getElementById("doctor");
            const department = departmentSelect.value;

            doctorSelect.innerHTML = '<option value="">--Select Doctor--</option>';

            if (department && doctorData[department]) {
                doctorData[department].forEach((doctor) => {
                    const option = document.createElement("option");
                    option.value = doctor.toLowerCase().replace(/\s+/g, "-");
                    option.textContent = doctor;
                    doctorSelect.appendChild(option);
                });
            }
        }
    </script>
</body>
</html>
