<!DOCTYPE html>
<html>
<head>
    <title>Sửa thông tin nhân viên</title>
</head>
<body>
<h1>Sửa thông tin nhân viên</h1>
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

    // Hiển thị form sửa thông tin
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <form action="process_edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo $row["Name"]; ?>" required><br>

            <label for="address">Address:</label>
            <input type="text" name="address" id="address" value="<?php echo $row["Address"]; ?>"><br>

            <label for="salary">Salary:</label>
            <input type="number" name="salary" id="salary" step="0.01" value="<?php echo $row["Salary"]; ?>" required><br>

            <input type="submit" value="Lưu">
        </form>
        <?php
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
