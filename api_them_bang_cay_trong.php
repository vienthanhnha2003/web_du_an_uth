<?php
include 'connect.php';
header('Content-Type: application/json');


// Lấy dữ liệu từ request (POST)
$MaCay = $_POST['MaCay'] ?? '';
$TenCay = $_POST['TenCay'] ?? '';
$LoaiCay = $_POST['LoaiCay'] ?? '';

// Kiểm tra dữ liệu
if ($MaCay == '' || $TenCay == '' || $LoaiCay == '') {
    echo json_encode(["status" => "error", "message" => "Thiếu thông tin"]);
    exit;
}

// Chuẩn bị câu lệnh SQL
$sql = "INSERT INTO CayTrong (MaCay, TenCay, LoaiCay) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $MaCay, $TenCay, $LoaiCay);

// Thực thi câu lệnh
if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Thêm cây trồng thành công"]);
} else {
    echo json_encode(["status" => "error", "message" => "Lỗi: " . $stmt->error]);
}

$stmt->close();


?>
