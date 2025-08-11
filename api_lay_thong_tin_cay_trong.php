<?php
include 'connect.php';
// Cấu hình CORS (cho phép truy cập từ frontend)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// // Thông tin kết nối
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "ten_cua_csdl"; // thay bằng tên CSDL thực tế

// // Kết nối MySQL
// $conn = new mysqli($servername, $username, $password, $database);

// // Kiểm tra kết nối
// if ($conn->connect_error) {
//     http_response_code(500);
//     echo json_encode(["error" => "Kết nối thất bại: " . $conn->connect_error]);
//     exit();
// }

// Truy vấn dữ liệu
$sql = "SELECT MaCay, TenCay, LoaiCay FROM CayTrong";
$result = $conn->query($sql);

// Xử lý kết quả
$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data, JSON_UNESCAPED_UNICODE); // Trả về mảng JSON
} else {
    echo json_encode([]);
}

// Đóng kết nối
$conn->close();
?>

