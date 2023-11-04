<?php
require_once 'models/Students.php';

class AdminController {
    private $student;

    public function __construct($conn) {
        $this->student = new Student($conn);
    }

    public function index() {
        $students = $this->student->getAll();
        require 'views/admin.php';
    }
}
?>