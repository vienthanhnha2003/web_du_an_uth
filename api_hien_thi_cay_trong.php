<?php
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "qlvt_uth");
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Lỗi kết nối CSDL"]);
    exit();
}

$result = $conn->query("SELECT * FROM caytrong ORDER BY MaCay ASC");

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
$conn->close();
?>
