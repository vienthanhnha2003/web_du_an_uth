<?php
// Thông tin kết nối
$servername = "localhost"; // hoặc IP server, ví dụ: 127.0.0.1
$username = "root";        // tài khoản MySQL
$password = "";            // mật khẩu MySQL
$database = "qlvt_uth"; // tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
} else {
    echo "Kết nối thành công!";
}

// Đóng kết nối (nếu cần)
// $conn->close();
?>

