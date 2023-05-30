<?php
include 'model/connection.php';
include 'model/student_class.php';
include 'view/student_class_view.php';
include 'controller/student_class_controller.php';

$requestMethod = $_SERVER['REQUEST_METHOD'];

$studentController = new StudentController();

if ($requestMethod === 'GET' && empty($_GET['id'])) {
    $studentController->getAllStudentsController();
}

if ($requestMethod === 'GET' && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $studentController->getStudentByIdController($id);
}

if ($requestMethod === 'POST') {
    $jsonData = file_get_contents('php://input');

    // التأكد من أن البيانات المرسلة غير فارغة
    if (!empty($jsonData)) {
        $data = json_decode($jsonData, true);

        // التأكد من نجاح عملية التحويل إلى مصفوفة
        if ($data !== null) {
            $studentController->insertStudentController($data);
        } else {
            // إشعار بأن البيانات غير صحيحة
            echo json_encode(['message' => 'Invalid data'], 400);
        }
    } else {
        // إشعار بأن البيانات غير موجودة
        echo json_encode(['message' => 'No data provided'], 400);
    }
}

if ($requestMethod === 'PUT' && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);

    if (!empty($data) && is_array($data)) {
        $studentController->updateStudentController($id, $data);
    } else {
        // إشعار بأن البيانات غير صحيحة
    }
}

if ($requestMethod === 'DELETE' && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $studentController->deleteStudentController($id);
}
?>
