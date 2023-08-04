<?php
if (isset($_GET["id"])) {
    // Lấy ID từ URL
    $id = $_GET["id"];

    // Kết nối đến CSDL
    $conn = new mysqli("localhost", "your_username", "your_password", "XProject");

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Truy vấn xoá nhân viên
    $sql = "DELETE FROM employees WHERE ID = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Lỗi: " . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
}
?>

