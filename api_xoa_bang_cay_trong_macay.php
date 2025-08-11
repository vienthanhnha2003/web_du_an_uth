<?php
include 'connect.php';
header('Content-Type: application/json');

// Lấy tham số MaCay từ GET
if (isset($_GET['MaCay'])) {
    $maCay = $_GET['MaCay'];

    // Chuẩn bị truy vấn xóa
    $stmt = $conn->prepare("DELETE FROM CayTrong WHERE MaCay = ?");
    $stmt->bind_param("s", $maCay);

    // Thực hiện và trả kết quả
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo json_encode(["success" => true, "message" => "Đã xóa cây trồng có mã: $maCay"]);
        } else {
            echo json_encode(["success" => false, "message" => "Không tìm thấy cây trồng với mã: $maCay"]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Lỗi khi xóa: " . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "Thiếu tham số MaCay"]);
}

// Đóng kết nối
$conn->close();
?>
