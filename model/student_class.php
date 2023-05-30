<?php

include 'connection.php';

function getAllStudents() {
    $conn = getConnection();

    $query = "SELECT * FROM students";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $students = mysqli_fetch_all($result, MYSQLI_ASSOC);

        mysqli_close($conn);

        return json_encode($students);
    } else {
        return json_encode(['message' => 'error'], 400);
    }
}

function getStudentById($id) {
    $conn = getConnection();

    $query = "SELECT * FROM students WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $student = mysqli_fetch_assoc($result);

        mysqli_close($conn);

        return json_encode($student);
    } else {
        return json_encode(['message' => 'error'], 400);
    }
}

function insertStudent($data) {
    $conn = getConnection();

    if ($conn) {
        $name = $data['name'] ?? '';
        $number = $data['number'] ?? '';
        $address = $data['address'] ?? '';
        $email = $data['email'] ?? '';
        $dob = $data['dob'] ?? '';

        $query = "INSERT INTO students (name, number, address, email, dob) VALUES ('$name', '$number', '$address', '$email', '$dob')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $studentId = mysqli_insert_id($conn);
            mysqli_close($conn);

            return $studentId;
        } else {
            return json_encode(['message' => 'error'], 500);
        }
    } else {
        return json_encode(['message' => 'Failed to connect to the database'], 500);
    }
}

function updateStudent($id, $data)
{
    $conn = getConnection();

    if ($conn) {
        $name = $data['name'] ?? '';
        $number = $data['number'] ?? '';
        $address = $data['address'] ?? '';
        $email = $data['email'] ?? '';
        $dob = $data['dob'] ?? '';

        $query = "UPDATE students SET name = '$name', number = '$number', address = '$address', email = '$email', dob = '$dob' WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            mysqli_close($conn);
            return ['success' => true, 'message' => 'تم تحديث الطالب بنجاح'];
        } else {
            return ['success' => false, 'message' => 'فشل في تحديث الطالب'];
        }
    } else {
        return ['success' => false, 'message' => 'فشل الاتصال بقاعدة البيانات'];
    }
}

function deleteStudent($id) {
    $conn = getConnection();

    $query = "DELETE FROM students WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        mysqli_close($conn);

        return true;
    } else {
        return json_encode(['message' => 'error'], 400);
    }
}

?>
