<?php

class StudentView {
    public function renderStudents($students) {
        $studentsArray = json_decode($students, true);
        foreach ($studentsArray as $student) {
            echo 'Name: ' . $student['name'] . '<br>';
            echo 'Number: ' . $student['number'] . '<br>';
            echo 'Address: ' . $student['address'] . '<br>';
            echo 'Email: ' . $student['email'] . '<br>';
            echo 'DOB: ' . $student['dob'] . '<br><br>';
        }
    }

    public function renderStudent($student) {
        $studentArray = json_decode($student, true);
        echo 'Name: ' . $studentArray['name'] . '<br>';
        echo 'Number: ' . $studentArray['number'] . '<br>';
        echo 'Address: ' . $studentArray['address'] . '<br>';
        echo 'Email: ' . $studentArray['email'] . '<br>';
        echo 'DOB: ' . $studentArray['dob'] . '<br><br>';
    }
}

?>
