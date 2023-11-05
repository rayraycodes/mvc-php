<?php
class Student {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function insert($fname, $lname, $umid, $project, $email, $phone, $timeslot) {
        $stmt = $this->conn->prepare("INSERT INTO students (fname, lname, umid, project, email, phone, timeslot) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $fname, $lname, $umid, $project, $email, $phone, $timeslot);
        $stmt->execute();
        $stmt->close();
    }

    public function getAll() {
        $result = $this->conn->query("SELECT * FROM students");
        $students = array();
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
        $result->close();
        return $students;
    }

    public function umidExists($umid) {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM students WHERE umid = ?");
        $stmt->bind_param("i", $umid);
        $stmt->execute();
        $count = $stmt->get_result()->fetch_array()[0];
        $stmt->close();
    
        return $count > 0;
    }
    
    public function timeslotIsFull($timeslot) {
        $count = $this->getCount($timeslot);
    
        return $count >= 6;
    }

    public function getCount($timeslot) {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM students WHERE timeslot = ?");
        $stmt->bind_param("s", $timeslot);
        $stmt->execute();
        $count = $stmt->get_result()->fetch_array()[0];
        $stmt->close();

        return $count;
    }

    public function updateStudent($umid, $fname, $lname, $project, $email, $phone, $timeslot) {
        $sql = "UPDATE students SET fname = :fname, lname = :lname, project = :project, email = :email, phone = :phone, timeslot = :timeslot WHERE umid = :umid";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':umid', $umid);
        $stmt->bindParam(':project', $project);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':timeslot', $timeslot);
        $stmt->execute();
    }
}
?>