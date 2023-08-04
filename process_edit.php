<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $id = $_POST["id"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $salary = $_POST["salary"];

    // Kết nối đến CSDL
    $conn = new mysqli("localhost", "your_username", "your_password", "XProject");

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Truy vấn cập nhật thông tin nhân viên
    $sql = "UPDATE employees SET Name = '$name', Address = '$address', Salary = $salary WHERE ID = $id";
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
