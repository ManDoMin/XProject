<!DOCTYPE html>
<html>
<head>
    <title>Quản lý nhân viên</title>
</head>
<body>
<h1>Danh sách nhân viên</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Salary</th>
        <th>Action</th>
    </tr>
    <?php
    // Kết nối đến CSDL
    $conn = new mysqli("localhost", "quanlynhanvien", "123456", "XProject");

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Truy vấn lấy danh sách nhân viên
    $sql = "SELECT * FROM employees";
    $result = $conn->query($sql);

    // Hiển thị danh sách nhân viên
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ID"] . "</td>";
            echo "<td><a href='detail.php?id=" . $row["ID"] . "'>" . $row["Name"] . "</a></td>";
            echo "<td>" . $row["Address"] . "</td>";
            echo "<td>" . $row["Salary"] . "</td>";
            echo "<td><a href='edit.php?id=" . $row["ID"] . "'>Edit</a> | <a href='delete.php?id=" . $row["ID"] . "' onclick='return confirm(\"Bạn có chắc muốn xoá nhân viên này?\")'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Không có nhân viên</td></tr>";
    }

    // Đóng kết nối
    $conn->close();
    ?>
</table>
<p><a href="add.php">Thêm nhân viên mới</a></p>
</body>
</html>
