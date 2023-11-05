<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Appointment Confirmation</title>
    <style>
         /* Define a fade-in animation */
        @keyframes fadeIn {
            0% {opacity: 0;}
            100% {opacity: 1;}
        }

        /* Apply the fade-in animation to the body */
        body {
            animation: fadeIn 2s ease-in 1;
        }
        /* Style for the registration button */
        button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            transition-duration: 0.4s;
            border-radius: 2vmin;
        }

        button:hover {
            background-color: #45a049;
        }
        body {
            font-family: "Roboto", sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 50px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        p {
            text-align: center;
            font-size: 24px;
            margin-bottom: 50px;
        }

        ul {
            text-align: center;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        li {
            display: block;
            margin-bottom: 20px;
            font-size: 20px;
        }

        li:last-child {
            margin-bottom: 0;
        }

        @media screen and (min-width: 600px) {
            .card {
                max-width: 600px;
                padding: 75px;
            }

            h1 {
                margin-bottom: 50px;
            }

            p {
                font-size: 30px;
                margin-bottom: 75px;
            }

            li {
                font-size: 24px;
                margin-bottom: 40px;
            }
        }

        @media screen and (min-width: 900px) {
            .card {
                max-width: 900px;
                padding: 100px;
            }
            h1 {
                font-size: 60px;
                margin-bottom: 75px;
            }

            p {
                font-size: 36px;
                margin-bottom: 100px;
            }

            li {
                font-size: 30px;
                margin-bottom: 60px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
             <?php
             if ($_GET['update']=="true"){
                echo" <h1>Appointment Updated</h1>
                <p>Thank you for scheduling an appointment with us. Your appointment has been updated.</p>
                <p>Appointment Details:</p>";
             }
             else{
                echo" <h1>Appointment Confirmed</h1>
                <p>Thank you for scheduling an appointment with us. Your appointment has been confirmed.</p>
                <p>Appointment Details:</p>";
             }
            ?>

           
            <ul>
                <?php

                require_once '../models/Students.php';
                require_once '../models/databaseConnection.php';
                // Check if the id key is defined in the $_GET superglobal array
                if (isset($_GET['fname'], $_GET['lname'], $_GET['umid'], $_GET['project'], $_GET['email'], $_GET['phone'], $_GET['timeslot'])) {
                    // Get the appointment ID from the URL
                    $fname = $_GET['fname'];
                    $lname = $_GET['lname'];
                    $umid = $_GET['umid'];
                    $project = $_GET['project'];
                    $email = $_GET['email'];
                    $phone = $_GET['phone'];
                    $timeslot = $_GET['timeslot'];

                    // Create a new Student instance
                    $student = new Student($conn);

                    // Update the student record
                    $student->updateStudent($umid, $fname, $lname, $project, $email, $phone, $timeslot);

                    // Display the appointment details
                    echo '<li>First Name: ' . htmlspecialchars($fname) . '</li>';
                    echo '<li>Last Name: ' . htmlspecialchars($lname) . '</li>';
                    echo '<li>UMID: ' . htmlspecialchars($umid) . '</li>';
                    echo '<li>Project: ' . htmlspecialchars($project) . '</li>';
                    echo '<li>Email: ' . htmlspecialchars($email) . '</li>';
                    echo '<li>Phone: ' . htmlspecialchars($phone) . '</li>';
                    echo '<li>Time Slot: ' . htmlspecialchars($timeslot) . '</li>';
                }
                ?>
            </ul>
            <button onclick="window.location.href='../index.php'">Back to Registration</button>

             <!-- Admin Button -->
             <button onclick="location.href='../index.php?action=admin'" type="button">View Registered Students</button>
            
        </div>
    </div>
</body>
</html>