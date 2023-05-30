<?php
class StudentController {
    public function getAllStudentsController() {
        $students = getAllStudents();
        echo $students;
    }

    public function getStudentByIdController($id) {
        $student = getStudentById($id);
        echo $student;
    }

    public function insertStudentController($data) {
        $studentId = insertStudent($data);
        if ($studentId) {
            echo json_encode(['studentId' => $studentId]);
        } else {
            echo json_encode(['message' => 'error'], 500);
        }
    }

    public function updateStudentController($id, $data) {
        $isUpdated = updateStudent($id, $data);
        if ($isUpdated) {
            echo json_encode(['message' => 'Student updated successfully']);
        } else {
            echo json_encode(['message' => 'Failed to update student'], 500);
        }
    }

    public function deleteStudentController($id) {
        $isDeleted = deleteStudent($id);
        if ($isDeleted) {
            echo json_encode(['message' => 'Student deleted successfully']);
        } else {
            echo json_encode(['message' => 'Failed to delete student'], 500);
        }
    }
}

?>
