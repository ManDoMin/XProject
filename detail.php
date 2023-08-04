<!DOCTYPE html>
<html>
<head>
    <title>Thông tin chi tiết nhân viên</title>
</head>
<body>
<h1>Thông tin chi tiết nhân viên</h1>
<?php
// Kiểm tra có tham số ID trên URL hay không
if (isset($_GET["id"])) {
    // Lấy ID từ URL
    $id = $_GET["id"];

    // Kết nối đến CSDL
    $conn = new mysqli("localhost", "your_username", "your_password", "XProject");

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Truy vấn lấy thông tin chi tiết của nhân viên
    $sql = "SELECT * FROM employees WHERE ID = $id";
    $result = $conn->query($sql);

    // Hiển thị thông tin chi tiết
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<p>ID: " . $row["ID"] . "</p>";
        echo "<p>Name: " . $row["Name"] . "</p>";
        echo "<p>Address: " . $row["Address"] . "</p>";
        echo "<p>Salary: " . $row["Salary"] . "</p>";
    } else {
        echo "<p>Không tìm thấy nhân viên</p>";
    }

    // Đóng kết nối
    $conn->close();
} else {
    echo "<p>Không tìm thấy ID nhân viên</p>";
}
?>
<p><a href="index.php">Quay lại danh sách nhân viên</a></p>
</body>
</html>
