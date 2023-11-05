<?php
require_once 'models/Students.php';

class RegistrationController {
    private $student;
    private $pdo;
    
    public function __construct($conn) {
        $this->student = new Student($conn);
    }

    public function index() {
        $students = $this->student->getAll();
        require_once 'views/admin.php';
    }

    

    public function register() {
    // Controller code
    $fname = ''; // Set the variable to an empty string
    $lname = ''; // Set the variable to an empty string
    $umid = ''; // Set the variable to an empty string
    $project = ''; // Set the variable to an empty string
    $email = ''; // Set the variable to an empty string
    $phone = ''; // Set the variable to an empty string
    $timeslot = ''; // Set the variable to an empty string
    $errors = array(); // Initialize the errors array

    
    
    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Get the form data
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $umid = $_POST['umid'];
                    $project = $_POST['project'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $timeslot = $_POST['timeslot'];

                   
                    // Validate the form data
                    if (empty($fname)) {
                        $errors['fname'] = 'First name is required';
                    }
                    if (empty($lname)) {
                        $errors['lname'] = 'Last name is required';
                    }
                    if (empty($umid)) {
                        $errors['umid'] = 'UMID is required';
                    }
                   
                    // Check if UMID exists
                    if ($this->student->umidExists($umid)) {
                        // Prompt the user to confirm the update
                        echo "<script type='text/javascript'>
                            var update = confirm('UMID already exists. Do you want to update the existing record?');
                            if(update) {
                                // Update the existing record
                                ";
                                // header('Location: views/confirmation.php?fname=' . urlencode($fname) . '&lname=' . urlencode($lname) . '&umid=' . urlencode($umid) . '&project=' . urlencode($project) . '&email=' . urlencode($email) . '&phone=' . urlencode($phone) . '&timeslot=' . urlencode($timeslot) . '&update=' . urlencode('true'));
                                echo "
                                // Redirect to the confirmation page
                                window.location.href = 'views/confirmation.php?fname=' + encodeURIComponent('$fname') + '&lname=' + encodeURIComponent('$lname') + '&umid=' + encodeURIComponent('$umid') + '&project=' + encodeURIComponent('$project') + '&email=' + encodeURIComponent('$email') + '&phone=' + encodeURIComponent('$phone') + '&timeslot=' + encodeURIComponent('$timeslot') + '&update=true';
                            } else {
                                // If the user cancels the update, set an error message
                                ";
                                $errors['umid'] = 'UMID already exists. Update other fields or use a different UMID.';
                                echo "
                            }
                        </script>";
                    }else{

                    }
                    
                    // Check if the UMID contains only digits
                    if (!preg_match("/^[0-9]*$/", $umid)) {
                        $errors['umid'] = 'UMID should only contain numbers.';
                    }
                    // Check if umid is exactly 8 digits
                    if(!preg_match("/^[0-9]{8}$/", $umid)) {
                        $errors['umid'] = 'UMID must be exactly 8 digits.';
                    }
                    
                    // Check if project title is provided
                    if(empty($project)) {
                        $errors['project'] = 'Project title is required.';
                    }
                    if (empty($email)) {
                        $errors['email'] = 'Email is required';
                    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $errors['email'] = 'Invalid email format';
                    }
                    if (empty($phone)) {
                        $errors['phone'] = 'Phone number is required';
                    } elseif (!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $phone)) {
                        $errors['phone'] = 'Invalid phone number format';
                    }
                   
                    
                
                    if ($this->student->timeslotIsFull($timeslot)) {
                        $errors['timeslot'] = 'Timeslot is full.';
                    }
                
                    // If there are no errors, save the data and redirect to the confirmation page
                    if (empty($errors)) {
                        // Insert the data into the database
                      
                        $this->student->insert($fname, $lname, $umid, $project, $email, $phone, $timeslot);

                        // Redirect to the confirmation page
                        header('Location: views/confirmation.php?fname=' . urlencode($fname) . '&lname=' . urlencode($lname) . '&umid=' . urlencode($umid) . '&project=' . urlencode($project) . '&email=' . urlencode($email) . '&phone=' . urlencode($phone) . '&timeslot=' . urlencode($timeslot). '&update=' . urlencode('false'));
                        exit;
                    }
                }
                
                // Load the view
                require_once 'views/registration.php';
        }
}
?>