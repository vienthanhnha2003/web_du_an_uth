<?php
include 'connect.php';
// Cấu hình CORS (cho phép truy cập từ frontend)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Truy vấn dữ liệu
$sql = "
    SELECT 
        nh.MaNongHo,
        nh.TenChuHo,
        nh.DiaChi,
        ct.TenCay,
        t.NgayTrong,
        t.SanLuongDuKien,
        t.VuMua
    FROM Trong t
    JOIN NongHo nh ON t.MaNongHo = nh.MaNongHo
    JOIN CayTrong ct ON t.MaCay = ct.MaCay
";

$result = $conn->query($sql);

// Xử lý kết quả
$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Trả về JSON
header('Content-Type: application/json');
echo json_encode($data, JSON_UNESCAPED_UNICODE);

// Đóng kết nối
$conn->close();
?>
