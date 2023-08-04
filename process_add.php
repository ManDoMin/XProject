<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $name = $_POST["name"];
    $address = $_POST["address"];
    $salary = $_POST["salary"];

    // Kết nối đến CSDL
    $conn = new mysqli("localhost", "your_username", "your_password", "XProject");

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Truy vấn thêm nhân viên mới
    $sql = "INSERT INTO employees (Name, Address, Salary) VALUES ('$name', '$address', $salary)";
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
