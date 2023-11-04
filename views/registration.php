<!DOCTYPE html>
<html>
<head>

<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <style>
          /* Base styles for all screen sizes */
            body {
                font-family: "Roboto", sans-serif;
                background-color: #f5f5f5;
            }

            form {
                margin: 30px auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            }

            label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }

            input[type=text], select {
                display: block;
                width: 100%;
                padding: 10px;
                margin-bottom: 20px;
                border: none;
                border-radius: 5px;
                background-color: #f5f5f5;
                box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
            }

            button {
                display: block;
                width: 100%;
                padding: 10px;
                background-color: #007aff;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .error {
                color: red;
                margin-top: 5px;
                animation: shake 0.5s; 
                animation-iteration-count: 2; 
            }

            h2 {
                text-align: center;
                font-size: 36px;
                font-weight: bold;
                margin-top: 50px;
                margin-bottom: 30px;
            }
            @keyframes shake {
                0% { transform: translate(1px, 1px) rotate(0deg); }
                10% { transform: translate(-1px, -2px) rotate(-1deg); }
                20% { transform: translate(-3px, 0px) rotate(1deg); }
                30% { transform: translate(3px, 2px) rotate(0deg); }
                40% { transform: translate(1px, -1px) rotate(1deg); }
                50% { transform: translate(-1px, 2px) rotate(-1deg); }
                60% { transform: translate(-3px, 1px) rotate(0deg); }
                70% { transform: translate(3px, 1px) rotate(-1deg); }
                80% { transform: translate(-1px, -1px) rotate(1deg); }
                90% { transform: translate(1px, 2px) rotate(0deg); }
                100% { transform: translate(1px, -2px) rotate(-1deg); }
            }
                /* Add spacing between labels */
                label {
                        display: block;
                        margin-bottom: 10px;
                    }

                    /* Make error messages stick near the labels */
                    .error {
                        display: block;
                        margin-top: -10px;
                        margin-bottom: 20px;
                        color: red;
                    }

                    /* Add spacing between input fields */
                    input[type="text"] {
                        margin-bottom: 20px;
                    }

            /* Styles for screens with a minimum width of 600px */
            @media screen and (min-width: 600px) {
                form {
                    max-width: 600px;
                    margin: 50px auto;
                    padding: 30px;
                }

                input[type=text], select {
                    margin-bottom: 30px;
                }

                button {
                    padding: 15px;
                }
            }

            /* Styles for screens with a minimum width of 900px */
            @media screen and (min-width: 900px) {
                form {
                    max-width: 900px;
                    margin: 50px auto;
                    padding: 50px;
                }

                input[type=text], select {
                    margin-bottom: 40px;
                    font-size: 18px;
                }

                button {
                    padding: 20px;
                    font-size: 20px;
                }
            }
    </style>

</head>


<body>
            <!-- Start of the Registration Form -->
            <h2>Student Registration</h2>

            <form action="index.php?action=register" method="post">

                <!-- First Name Field -->
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname" value="<?php echo htmlspecialchars($fname); ?>">
                <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($errors['fname'])): ?>
                    <span class="error"><?php echo $errors['fname']; ?></span>
                <?php endif; ?>
                <br>

                <!-- Last Name Field -->
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname" value="<?php echo htmlspecialchars($lname); ?>">
                <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($errors['lname'])): ?>
                    <span class="error"><?php echo $errors['lname']; ?></span>
                <?php endif; ?>
                <br>

                <!-- UMID Field -->
                <label for="umid">UMID:</label>
                <input type="text" id="umid" name="umid" maxlength="8" value="<?php echo htmlspecialchars($umid); ?>">
                <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($errors['umid'])): ?>
                    <span class="error"><?php echo $errors['umid']; ?></span>
                <?php endif; ?>
                <br>

                <!-- Project Title Field -->
                <label for="project">Project Title:</label>
                <input type="text" id="project" name="project" value="<?php echo htmlspecialchars($project); ?>">
                <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($errors['project'])): ?>
                    <span class="error"><?php echo $errors['project']; ?></span>
                <?php endif; ?>

                <!-- Email Field -->
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($errors['email'])): ?>
                    <span class="error"><?php echo $errors['email']; ?></span>
                <?php endif; ?>

                <!-- Phone Field -->
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>">
                <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($errors['phone'])): ?>
                    <span class="error"><?php echo $errors['phone']; ?></span>
                <?php endif; ?>

                <!-- Time Slot Selection -->
                <label for="timeslot">Time Slot:</label><br>
                <select id="timeslot" name="timeslot">
                    <!-- Time Slot Options -->
                    <option value="slot1" <?php if ($timeslot == 'slot1') echo 'selected'; ?>>12/5/23, 6:00 PM – 7:00 PM, <?php echo 6 - $this->student->getCount('slot1'); ?> seats remaining</option>
                    <option value="slot2" <?php if ($timeslot == 'slot2') echo 'selected'; ?>>12/5/23, 7:00 PM – 8:00 PM, <?php echo 6 - $this->student->getCount('slot2'); ?> seats remaining</option>
                    <option value="slot3" <?php if ($timeslot == 'slot3') echo 'selected'; ?>>12/5/23, 8:00 PM – 9:00 PM, <?php echo 6 - $this->student->getCount('slot3'); ?> seats remaining</option>
                    <option value="slot4" <?php if ($timeslot == 'slot4') echo 'selected'; ?>>12/6/23, 6:00 PM – 7:00 PM, <?php echo 6 - $this->student->getCount('slot4'); ?> seats remaining</option>
                    <option value="slot5" <?php if ($timeslot == 'slot5') echo 'selected'; ?>>12/6/23, 7:00 PM – 8:00 PM, <?php echo 6 - $this->student->getCount('slot5'); ?> seats remaining</option>
                    <option value="slot6" <?php if ($timeslot == 'slot6') echo 'selected'; ?>>12/6/23, 8:00 PM – 9:00 PM, <?php echo 6 - $this->student->getCount('slot6'); ?> seats remaining</option>
                </select><br>
                <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($errors['timeslot'])): ?>
                    <span class="error"><?php echo $errors['timeslot']; ?></span>
                <?php endif; ?>

                <!-- Submit Button -->
                <button type="submit">Submit</button>
            </form>
            <!-- End of the Registration Form -->
    
</body>


<script>
    document.getElementById("phone").addEventListener("input", function(e) {
        var input = e.target.value;
        input = input.replace(/\D/g, '');
        input = input.substring(0, 10);
        var size = input.length;
        if (size == 0) {
            input = '';
        } else if (size < 4) {
            input = input.substring(0, size);
        } else if (size < 7) {
            input = input.substring(0, 3) + '-' + input.substring(3, size);
        } else {
            input = input.substring(0, 3) + '-' + input.substring(3, 6) + '-' + input.substring(6, size);
        }
        e.target.value = input;
    });
</script>


</html>