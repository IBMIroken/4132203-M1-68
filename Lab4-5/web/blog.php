<?php

header('Content-type:application/json');

include("condb.php");

$method = $_SERVER['REQUEST_METHOD'];
$response = ['status' => 'error', 'message' => 'Invalid request method'];

switch ($method) {
    case 'GET':
        // get all data
        $sql = "SELECT * FROM blog ORDER BY id DESC";
        $stmt = $condb->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        while($row = $result->fetch_assoc()){
            $blog[] = $row;

        }

        $response = ['status' => 'success', 'data' => $blog];
        break;
    
    case 'POST':
        // insert data
        $comment = $_POST['blog'] ?? null;
        if ($comment) {
            $sql = "INSERT INTO blog (comment) VALUES (?)";
            $stmt = $condb->prepare($sql);
            $stmt->bind_param("s", $comment);
            if ($stmt->execute()) {
                $response = ['status' => 'success', 'message' => 'Blog Inserted'];
            } else {
                $response = ['status' => 'error', 'message' => $condb->error];
            }
        } else {
            $response = ['status' => 'error', 'message' => 'comment is null'];
        }
        break;

    case 'DELETE':
        $data = file_get_contents("php://input");

        // แยกข้อมูล query string ออกมา เช่น "id=10"
        parse_str($data, $request_data);

        // เข้าถึงค่า id จากข้อมูลที่ parse ได้
        $id = $request_data['id'] ?? null;

        if ($id) {
            $sql = "DELETE FROM blog WHERE id = ?";
            $stmt = $condb->prepare($sql);
            $stmt->bind_param("i", $id);
            if ($stmt->execute())
                $response = ['status' => 'success', 'message' => 'Blog deleted'];
            else
                $response = ['status' => 'error', 'message' => $condb->error];
        } else {

            $response = ['status' => 'error', 'message' => 'ID is missing for deletion'];
        }
        break;
}

echo json_encode($response);